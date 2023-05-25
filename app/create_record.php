<?php 	
require '../app/class/record.php';

	$categories = get_categories();

	session_start();
	$errors = array();
	$success = null;

	//SUCCESS
	if(isset($_SESSION['success']) && $_SESSION['success'] != ''){
		$success = $_SESSION['success'];
		unset($_SESSION['success']);
	}

	if(isset($_SESSION['error']) && $_SESSION['error'] != ''){
		array_push($errors,$_SESSION['error']);
		unset($_SESSION['error']);
	}

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(empty($_POST["record_amount"])|| empty($_POST["record_description"])){
			if(empty($_POST["record_amount"])){
				array_push($errors,"Amount Required");
			}
			if(empty($_POST["record_description"])){
				array_push($errors,"Description Required");
			}
		}else{
			$amount = $_POST["record_amount"];
			$description = $_POST["record_description"];
			$category = $_POST["record_category"];
			$date = $_POST["record_date"];

			save_record($amount, $description, $category, $date);
		}	
	}

	require "../views/create_record_view.php";
?>