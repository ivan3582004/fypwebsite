<?php
session_start();
    include '../Modle/DB.php';

	
		$db = new DB();
		
		$shopID = $db->getID('Shop','ShopID');
		$value = "'".$shopID."','".$_POST['Name']."','".$_POST['Address']."','C','".$_POST['Email']."','".$_POST['Tel']."','".$_POST['OperatorGroup']."','".$_POST['Type']."'";
		echo $value;
		
			
			if($db->addRow('Shop',$value)){
			
				if($_POST['Type']=='restaurant'){
					
					$value2 = "'".$db->getID('restaurant','RestaurantID')."','".$shopID."','".$_POST['FoodType']."'";
					echo $value2;
					if($db->addRow('restaurant',$value2)){
						$_SESSION['msg']="Added";
					}
				}else{
					$_SESSION['msg']="Fail";
				}
			}else{
				$_SESSION['msg']="Fail";
			}
		
		
		
	
	header("Location: ../index.php");
	
?>
