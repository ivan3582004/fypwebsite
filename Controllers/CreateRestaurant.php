<?php
session_start();
    include '../Modle/DB.php';
	 include '../Shop/Restaurant.php';

	
		$db = new DB();
		$result = $db->seachAll('restaurant');
		
		//$_SESSION['shop'] = new array;
		
		for($i = 0;$i < count($result['ShopID']);$i++){
			$result2 = $db->seachWhere('Shop','ShopID',$result['ShopID'][$i]);
			$restaurant = new Restaurant();
			$restaurant->setShopID($result['ShopID'][$i]);
			$restaurant->setName($result2['Name']);
			$restaurant->setAddress($result2['Address']);
			$restaurant->setStatis($result2['Statis']);
			$restaurant->setEmail($result2['Email']);
			$restaurant->setTel($result2['Tel']);
			$restaurant->setOpgID($result2['OperatorGroupID']);
			$restaurant->setRestaurantID($result['RestaurantID'][$i]);
			$restaurant->setFoodType($result['FoodType'][$i]);
			$_SESSION['restaurant'][$i] = $restaurant;
		}
		echo $_SESSION['restaurant'][0]->getShopID();
		echo $_SESSION['restaurant'][0]->getName();
		echo $_SESSION['restaurant'][0]->getAddress();
		echo $_SESSION['restaurant'][0]->getStatis();
		echo $_SESSION['restaurant'][0]->getEmail();
		echo $_SESSION['restaurant'][0]->getFoodType();
		echo count($_SESSION['restaurant']);
		
	
	header("Location: ../browseRestaurant.php");
	
?>
