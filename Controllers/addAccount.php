<?php
session_start();
    include '../Modle/DB.php';

	
		$db = new DB();
		
		
		$value = "'".$_POST['AccountID']."','".$_POST['pwd']."','C','".$_POST['Firstname']."','".$_POST['Lastname']."','".$_POST['Gender']."','".$_POST['Username']."','".$_POST['Email']."','".$_POST['Tel']."'";
		echo $value;
		
		if($db->seachWhere_getRow('Account','AccountID',$_POST['AccountID'])<=0){
			if($_POST['pwd']==$_POST['pwdc']){
				$db->addRow('Account',$value);
				$db->addRow('Customer',"'".$db->getID('customer','CustomerID')."','".$_POST['AccountID']."'");
				$_SESSION['msg']="Sgin up";
			}else{
				$_SESSION['msg']="Password not mach";
			}
		}else{
			$_SESSION['msg']="AccountID exist";
		}
		
		
	
	header("Location: ../restaurantInfo.php?SID=".$_GET['SID']);
	
?>
