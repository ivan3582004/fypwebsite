<html>
    <body>
    <?php require'base/header.php';?>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <div class="form-group">
				<label for="email">Account:</label>
				<input type="text" class="form-control" placeholder="Enter Account" id="ac" name="ac">
		  </div>

</form>

<?php require'base/footer.php';?>
</body>
</html>

<?php
$mailer=$_POST[""];
$subject="testing";
$bodycontent="hello motherfucker";
$recive="from:fyp project";
if(isset($_POST["submit"])) { 
mail($mailer,$subject,$bodycontent,$recive);
echo "<script type='text/javascript'>alert('sent!');</script>";
}
?>