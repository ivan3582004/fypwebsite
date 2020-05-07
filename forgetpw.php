<html>
	<body>
    <?php require'base/header.php';
		  require 'Modle/conn.php';?>
	<h1>So, you have come here to recover your password...</h1>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <div class="form-group">
				<label for="email">Email:</label>
				<input type="email" class="form-control" placeholder="Enter your email of the registered account" id="ac" name="ac">
			</div>
		  <input type="submit" value="Send email to me!"/>		  
</form>
<?php require'base/footer.php';?>
</body>
</html>
<?php
date_default_timezone_set('Asia/Hong_Kong');
$recive="from:Let's eat ticking system";
$subject="[Let's eat] Your request of reset password";
$bodycontent="We heard that you lost your password.";
$bodycontent.="Sorry about that!\n";
$bodycontent.="But don’t worry! You can use the following link to reset your password:";
if(isset($_POST["submit"])) { 
	$mailer=$_POST["ac"];
	if($mailer==null||$mailer==""){?>
		<script type='text/javascript'>
			alert('you cant enter nothing to recover your password!');
		</script>
<?php
	}else{
		$sql="select * from account where email = '".$mailer."'";
		$rs=mysqli_query($conn,$sql);
		if(mysqli_num_rows($rs)==0){?>
			<script>
				alert('There are no record of your email registered!');
			</script>
<?php
		}else{
			mysqli_free_result($rs);
			$expFormat = mktime(
			date("H"), 
			date("i"), 
			date("s"), 
			date("m") ,
			date("d")+1, 
			date("Y")
			);
			$expDate = date("Y-m-d H:i:s",$expFormat);
			$key = md5(2418*2+$mailer);
			$addKey = substr(md5(uniqid(rand(),1)),3,10);
			$key = $key . $addKey;
			$sql1="INSERT INTO `forgetpw` (`key`,`expdate`,`email`)VALUES ('".$key."', '".$expDate."', '".$mailer."');";
			mysqli_query($conn,$sql1);
			$bodycontent.="\n http://seantalk.asuscomm.com/resetpw.php?key=".$key."&email=".$email;
			$bodycontent.="\nIf you don’t use this link within 3 hours, it will expire. To get a new password reset link, visit http://seantalk.asuscomm.com/forgetpw.php";
			mail($mailer,$subject,$bodycontent,$recive);
		}
		
	}
}
?>
