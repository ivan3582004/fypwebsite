<?php
session_start();
    include '../Modle/DB.php';

	if (isset($_POST['FirstName'])){		
			$db = new DB();
			if($db->editRow('Account','FirstName',$_POST['FirstName'],'AccountID',$_SESSION['AccountID'])&&
			$db->editRow('Account','LastName',$_POST['LastName'],'AccountID',$_SESSION['AccountID'])){
				$_SESSION['FirstName'] = $_POST['FirstName'];
				$_SESSION['LastName'] = $_POST['LastName'];
				$_SESSION['msg'] = 'Name Changed';
			}else{
				$_SESSION['msg'] = 'Fail to change Name ';
			}
		
		
	}
	header("Location: ../Pofile.php");
	
?>
