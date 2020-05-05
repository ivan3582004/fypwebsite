<?php
session_start();
include '../Modle/DB.php';


$db = new DB();
$opID = $db->seachWhere("Opertor","OpertorID",$_POST['OpertorID'])['OpertorID'];

echo "'".$opID."','".$_POST['OGID']."'";
if(isset($opID)){
    $db->addRow('operatorgroupmemberlist',"'".$_POST['OGID']."','".$opID."'");
}else{
    $_SESSION['msg']="Something went wrong!";
}




header("Location: ../manageOGML.php?OGID=".$_POST['OGID']);

?>
