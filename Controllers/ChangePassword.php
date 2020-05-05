<?php
session_start();
    include '../Modle/DB.php';

	if (isset($_POST['cpwd'])){
		if($_POST['cpwd']==$_SESSION['Password']&&$_POST['npwd']==$_POST['npwdc']){
			$db = new DB();
			if($db->editRow('Account','Password',$_POST['npwd'],'AccountID',$_SESSION['AccountID'])){
				$_SESSION['msg'] = 'Password changed';
			}else{
				$_SESSION['msg'] = 'Fail to change Password ';
			}
		}else{
			$_SESSION['msg'] = 'Password Wrong';
		}
		
	}
	header("Location: ../Pofile.php");
	
?>
