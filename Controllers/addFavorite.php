<?php
session_start();
    include '../Modle/DB.php';

	
		$db = new DB();
		$cusID = $db->seachWhere("Customer","AccountID",$_SESSION['AccountID'])['CustomerID'];
		
		echo "'".$cusID."','".$_GET['SID']."'";
		if(isset($cusID)){
			$db->addRow('favoritelist',"'".$cusID."','".$_GET['SID']."'");
		}else{
			$_SESSION['msg']="Please login first!";
		}
		
		
		
	
	header("Location: ../restaurantInfo.php?SID=".$_GET['SID']);
	
?>
