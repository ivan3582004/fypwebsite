<?php
session_start();
    include '../Modle/DB.php';
		date_default_timezone_set("HongKong");
	
		$db = new DB();
		if ($_SESSION['Permission']== "C"){
			echo $_SESSION['Permission'];
			$TID = $db->getID('Ticket','TicketID');
			$sequence = $db->getID(("Ticket where ShopID = '".$_POST['SID']."'"),'sequence');
			$value = "'".$TID."','W', '".$_POST['SID']."', '".$db->seachWhere('Customer','AccountID',$_SESSION['AccountID'])['CustomerID']."', '".date("Y-m-d")."', '".date("H:i:s")."', '".$sequence."'";			
			$value2 = "'".$db->getID('ticketinforestaurant','TicketInfoRestaurantID')."','".$_POST['nos']."', '".$TID."'";
			echo $value;
			echo $value2;
			$db->addRow('Ticket',$value);
			$db->addRow('ticketinforestaurant',$value2);
			$_SESSION['msg']="Your sequence is ".$sequence;
		}else{
			$_SESSION['msg']="only customer account can get ticket";			
		}		
			
	header("Location: ../restaurantInfo.php?SID=".$_POST['SID']);
	
?>
