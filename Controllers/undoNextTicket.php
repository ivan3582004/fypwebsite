<?php
session_start();
    include '../Modle/DB.php';
	$db = new DB();
	
	
		
	$db->editRow("ticket","Statis","W","ShopID",$_GET['SID']."' and sequence = '1");
		
	header("Location: ../managePage.php?SID=".$_GET['SID']);
	
?>
