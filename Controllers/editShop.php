<?php
session_start();
    include '../Modle/DB.php';
	echo $_POST[$_POST['COL']];
	if (isset($_POST[$_POST['COL']])){	
		
			$db = new DB();
			if($db->editRow($_POST['Table'],$_POST['COL'],$_POST[$_POST['COL']],'ShopID',$_GET['SID'])){
				//$_SESSION[$_POST['COL']] = $_POST[$_POST['COL']];
				$_SESSION['msg'] = $_POST['COL'].' Changed';
			}else{
				$_SESSION['msg'] = 'Fail to change'. $_POST['COL'] ;
			}
		
		
	}
	header("Location: ../managePage.php?SID=".$_GET['SID']);
	
?>
