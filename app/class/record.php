<?php
    require_once "validation.php";
    require_once "category.php";
    require_once "../database/db.php";

    function get_records(){
        $conn = dbconnect();
        $sql = "SELECT * FROM records";
        $result = $conn->query($sql);

        return $result;
    }

    function get_months(){
        $conn = dbconnect();
        $sql = "SELECT * FROM months";
        $result = $conn->query($sql);

        return $result;
    }

    function get_month_by_id($id){
        $conn = dbconnect();

        $stmt = $conn->prepare("SELECT * FROM months WHERE id = ?");
		$stmt->bind_param('i',$id);

        $stmt->execute();

        $result = $stmt->get_result();

        return $result;
    }

    function save_record($amount, $description, $category, $date){
        $conn = dbconnect();

        $checkamount = validateDecimal($amount);
        
        if($checkamount == ""){
            $_SESSION['error'] = "Please enter amount correctly!".$checkamount;
            $conn->close(); 

            header('Location: /create-record');
            exit();
        }

        $vamount = doubleval($checkamount);

        $vdescription = validateData($description);
        $vcategoryid = validateData($category);
        $vdate = validateData($date);

        $fulldate = strtotime($vdate);
        $vmonthid = date('n',$fulldate);
        $vyear = date('Y',$fulldate);

        $category = get_category_by_id($vcategoryid);

        $vcategoryname = "none";
        $vtype = 0;

        if ($category->num_rows > 0) {
            while($item = $category->fetch_assoc()){
                $vcategoryname = $item['name'];
                $vtype = $item['type'];
            }
        }
     
        $month = get_month_by_id($vmonthid);
        $vmonthname = 0;

        if ($month->num_rows > 0) {
            while($item = $month->fetch_assoc()){
                $vmonthname = $item['description'];
            }
        }

        $stmt = $conn->prepare("INSERT INTO records(amount, description, type, category_id, category_name, date, month_id, month_name, year) VALUES (?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param('dsiississ',$vamount,$vdescription,$vtype,$vcategoryid,$vcategoryname,$vdate,$vmonthid,$vmonthname,$vyear);
        
        if ($stmt->execute()) {
            $_SESSION['success'] = 'Recorded Successfully'.$checkamount;
            
            $stmt->close();
            $conn->close(); 

            header('Location: /create-record');
            exit();
        }else{            
            $_SESSION['error'] = $stmt->error;
            
            $stmt->close();
            $conn->close(); 

            header('Location: /create-record');
            exit();
        } 

        $result = $stmt->get_result(); //might not be reached
    }

    function delete_record($id){
        $conn = dbconnect();

        $stmt = $conn->prepare("DELETE FROM records WHERE id = ?");
		$stmt->bind_param('i',$id);

        if ($stmt->execute()) {
            $_SESSION['success'] = 'Record Deleted Successfully';
            
            $stmt->close();
            $conn->close(); 

            header('Location: /view-records');
            exit();
        }else{            
            $_SESSION['error'] = $stmt->error;
            
            $stmt->close();
            $conn->close(); 

            header('Location: /view-records');
            exit();
        } 

        $result = $stmt->get_result(); //might not be reached
    }

?>