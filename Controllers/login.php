<?php
session_start();
    include '../Modle/DB.php';

	if (isset($_POST['ac'])){
		echo $_POST['ac'];
	
		$db = new DB();
		$result = $db->seachWhere('Account','AccountID',$_POST['ac']);
		$_SESSION['msg'] = "Login Faill";
		if($result!=null){
			if($result['Password']==$_POST['pwd']){
				foreach($result as $key => $value){
					$_SESSION[$key] = $result[$key];
				}				
				$_SESSION['msg'] = "Logined";
			}else{
				$_SESSION['msg'] = "Wrrong Password";
			}
		}else{
			$_SESSION['msg'] =  "Account not exist";
		}
		
	}
	header("Location: ../index.php");
	
?>
