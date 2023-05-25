<?php
require '../app/class/record.php';

$records = get_records();

session_start();
$errors = array();
$success = null;
$emptyinfo = null;


//SUCCESS
if(isset($_SESSION['success']) && $_SESSION['success'] != ''){
    $success = $_SESSION['success'];
    unset($_SESSION['success']);
}

//ERRORS
if(isset($_SESSION['error']) && $_SESSION['error'] != ''){
    array_push($errors,$_SESSION['error']);
    unset($_SESSION['error']);
}

//MESSAGES
if($records->num_rows == 0){
    $emptyinfo = "You dont have any records - try to create one!";
}

if (isset($_POST['record_delete'])) {
    $id = $_POST["record_id"];
    delete_record($id);
} 

include "../views/show_record_view.php";
?>