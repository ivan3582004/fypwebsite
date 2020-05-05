<?php
session_start();
    include '../Modle/DB.php';
	$db = new DB();		
	$db->editRow("ticket","Statis","O","ShopID",$_GET['SID']."' and sequence = '1");	
	$db->editRow("ticket","Sequence",0,"ShopID",$_GET['SID']."' and sequence = '1");
	$rs = $db->seachWhere_getRc("ticket","ShopID",$_GET['SID']."' and statis = 'W");
	for($i=0;$i<count($rs['TicketID']);$i++){		
	echo $rs['sequence'][$i]-1;
	echo $rs['TicketID'][$i];
		$db->editRow("ticket","Sequence",$rs['sequence'][$i]-1,"ShopID",$_GET['SID']."' and statis = 'W' and ticketID = '".$rs['TicketID'][$i]);	
	}
	header("Location: ../managePage.php?SID=".$_GET['SID']);
	
?>
