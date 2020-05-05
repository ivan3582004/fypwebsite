<?php
session_start();
include '../Modle/DB.php';


$db = new DB();

$value = "'".$_POST['OGId']."','".$_POST['OperatorID']."'";
echo $value;


if($db->addRow('operatorgroup',$value)){
        $_SESSION['msg']="Added";
}else{
    $_SESSION['msg']="Fail";
}




header("Location: ../index.php");

?>
