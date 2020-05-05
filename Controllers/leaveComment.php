<?php
session_start();
    include '../Modle/DB.php';

	
		$db = new DB();
		
		
		$value = "'".$db->getID('Comment','CommentID')."','".$_POST['Comment']."','".$_SESSION['AccountID']."','".$_GET['SID']."','".date("Y-m-d")."', '".date("H:i:s")."'";
		echo $value;
		
		
			if(isset($_POST['Comment'])){
				if($db->addRow('Comment',$value)){
					$_SESSION['msg']="Sended";
				}else{
					$_SESSION['msg']="Fail to send Comment";
				}
			}else{
				$_SESSION['msg']="No any Comment here";
			}
		
	
	header("Location: ../restaurantInfo.php?SID=".$_GET['SID']);
	
?>
