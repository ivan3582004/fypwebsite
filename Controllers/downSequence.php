<?php
session_start();
include '../Modle/DB.php';
$db = new DB();

	if ($db->seachWhere("ticket","ticketID",$_GET['TID'])['sequence']!=$db->getMax(("ticket where ShopID = '".$_GET['SID']."'"),"sequence")){
	echo $db->getMax(("ticket where ShopID = '".$_GET['SID']."'"),"sequence");
	$db->editRow("ticket","sequence",$db->seachWhere("ticket","ticketID",$_GET['TID'])['sequence'],"sequence",($db->seachWhere("ticket","ticketID",$_GET['TID'])['sequence']+1)."' and ShopID = '".$_GET['SID']);
	$db->editRow("ticket","sequence",$db->seachWhere("ticket","ticketID",$_GET['TID'])['sequence']+1,"ticketID",$_GET['TID']."' and ShopID = '".$_GET['SID']);
	header("Location: ../managePage.php?SID=".$_GET['SID']."&CR=".$_GET['TID']);
	}
	//header("Location: ../managePage.php?SID=".$_GET['SID']);
	
?>
