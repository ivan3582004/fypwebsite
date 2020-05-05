<?php
session_start();
include '../Modle/DB.php';

$db = new DB();
$opID = $db->seachWhere("OperatorGroupMemberList","OpertorID",$_GET['OPID'])['OpertorID'];

echo "'".$opID."','".$_GET['OGID']."'";
if(isset($opID)){
    $db->removeOGMember($opID,$_GET['OGID']);
}else{
    $_SESSION['msg']="Could not find opertor!";
}




header("Location: ../manageOGML.php?OGID=".$_GET['OGID']);

?>
