<?php
session_start();
    include '../Modle/DB.php';
echo$_POST[$_POST['COL']];
	if (isset($_POST[$_POST['COL']])){	
		
			$db = new DB();
			if($db->editRow('Account',$_POST['COL'],$_POST[$_POST['COL']],'AccountID',$_SESSION['AccountID'])){
				$_SESSION[$_POST['COL']] = $_POST[$_POST['COL']];
				$_SESSION['msg'] = $_POST['COL'].' Changed';
			}else{
				$_SESSION['msg'] = 'Fail to change'. $_POST['COL'] ;
			}
		
		
	}
	header("Location: ../Pofile.php");
	
?>
