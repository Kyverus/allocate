<?php
    require_once "validation.php";
    require_once "../database/db.php";

    function get_categories(){
        $conn = dbconnect();
        $sql = "SELECT * FROM categories";
        $result = $conn->query($sql);

        return $result;
    }

    function get_category_by_type($type){
        $conn = dbconnect();
        $stmt = $conn->prepare("SELECT * FROM categories WHERE type = ?");
		$stmt->bind_param('i',$type);

        $stmt->execute();

        $result = $stmt->get_result();

        return $result;
    }

    function get_category_by_id($id){
        $conn = dbconnect();

        $stmt = $conn->prepare("SELECT * FROM categories WHERE id = ?");
		$stmt->bind_param('i',$id);

        $stmt->execute();

        $result = $stmt->get_result();

        return $result;
    }
?>