<?php
session_start();
include("../../php/functions.php");
	$fn = isset( $_POST["fn"] ) ? $_POST["fn"] : "";
	switch ($fn) {
		case 'login'		: login(); 		break;
		case 'logout'		: logout(); 	break;
		default: break;
	}

	function login() {
		global $DATABASE;
		$user_email = @$_POST["user_email"];
		$user_password = @$_POST["user_password"];
		$sql = "SELECT * FROM tb_user WHERE user_email = '".$user_email."' AND user_password = '".$user_password."'";
	    $obj = $DATABASE->QueryObj($sql);
	    $count = sizeof($obj); 
	    if($count == 1){
	    	foreach ($obj as $row) {
	    		$_SESSION["user_id"] = $row["user_id"];
	        	$_SESSION["user_name"] = $row["user_name"];
	        	$_SESSION["user_lname"] = $row["user_lname"];
	        	$_SESSION["user_email"] = $row["user_email"];
	        	$_SESSION["user_password"] = $row["user_password"];
	        	$_SESSION["user_status"] = $row["user_status"];
	    	}
	        echo "true";
	    }else{
	    	echo "false";
	    }
	}

	function logout(){
		session_destroy();
		echo "true";
	}
?>