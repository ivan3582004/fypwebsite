<?php require'base/header.php';?>

<div class="container" id="effect">

    <div class="row">
        <div class="col col-sm-3">
            <!-- Nav pills -->
            <ul class="nav nav-pills flex-column" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="pill" href="#home">Info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#menu2">Change Password</a>
                </li>
            </ul>
        </div>

	    <div class="col">
            <!-- Tab panes -->
            <div class="tab-content">
                <div id="home" class="tab-pane active"><br>
                    <h3>Information</h3><hr />
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header">
                                <a class="card-link" data-toggle="collapse" href="#collapseOne">
                                    Uesr's Info
                                </a>
                            </div>
                            <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="card-body">
                                        <h4>Personal</h4>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-8">Name: <?=$_SESSION['FirstName']." ".$_SESSION['LastName']?></div>
                                            <div class="col">
	                                            <button data-toggle="collapse" data-target="#demo" class="btn btn-primary">Edit <img src="img\icon\3.jpg" class="icon" /></button>
                                            </div>
                                        </div>

                                        <div id="demo" class="collapse">
                                            <h5>Edit Name</h5>
                                            <hr />
											<form action="Controllers/editName.php" method="post">
                                            First Name:<input class="form-control" type="text" name="FirstName" required><br />
                                            Last Name:<input class="form-control" type="text" name="LastName" required>
												</br>
												<button type="submit" class="btn btn-primary">Change</button>
												</form>
                                            <hr />
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-8">Gender: <?=$_SESSION['Gender']?></div>
                                            <div class="col"><button data-toggle="collapse" data-target="#demo1"
                                                    class="btn btn-primary">Edit <img src="img\icon\3.jpg"
                                                        class="icon" /></button>

                                            </div>
                                        </div>

                                        <div id="demo1" class="collapse">
                                            <h5>Edit Gender</h5>
                                            <hr />
											<form action="Controllers/editProfile.php" method="post">
											<input type="hidden" name="COL" value="Gender">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="customRadio"
                                                    name="Gender" value="M" required>
                                                <label class="custom-control-label" for="customRadio">M</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="customRadio1"
                                                    name="Gender" value="F" required>
                                                <label class="custom-control-label" for="customRadio1">F</label>

                                            </div>
											</br>
											<button type="submit" class="btn btn-primary">Change</button>
											</form>
                                        </div>

                                        <h4>Contact</h4>
                                        <hr />

                                        <div class="row">
                                            <div class="col-sm-8">Tel: <?=$_SESSION['Tel']?></div>
                                            <div class="col"><button data-toggle="collapse" data-target="#demo2"
                                                    class="btn btn-primary">Edit <img src="img\icon\3.jpg"
                                                        class="icon" /></button>

                                            </div>
                                        </div>

                                        <div id="demo2" class="collapse">
                                            <h5>Edit Tel</h5>
                                            <hr />
											<form action="Controllers/editProfile.php" method="post">
											<input type="hidden" name="COL" value="Tel">
                                            Tel <input class="form-control" type="text" name="Tel" required>
											</br>
											<button type="submit" class="btn btn-primary">Change</button>
											</form>
                                            <hr />
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-8">Email: <?=$_SESSION['Email']?></div>
                                            <div class="col">
	                                            <button data-toggle="collapse" data-target="#demo3" class="btn btn-primary">Edit <img src="img\icon\3.jpg" class="icon" /></button>
                                            </div>
                                        </div>

                                        <div id="demo3" class="collapse">
                                            <h5>Edit Email</h5>
                                            <hr />
											<form action="Controllers/editProfile.php" method="post">
											<input type="hidden" name="COL" value="Email">
                                            Email <input class="form-control" type="email"  name="Email">
											</br>
											<button type="submit" class="btn btn-primary">Change</button>
											</form>
                                            <hr />
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                                        Account's Info
                                    </a>
                                </div>

                                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-sm-8">Username: <?=$_SESSION['Username']?></div>
                                            <div class="col">
	                                            <button data-toggle="collapse" data-target="#demo2" class="btn btn-primary">Edit <img src="img\icon\3.jpg" class="icon" /></button>
                                            </div>
                                        </div>

                                        <div id="demo2" class="collapse">
                                            <h5>Edit Username</h5>
                                            <hr />
											<form action="Controllers/editProfile.php" method="post">
											<input type="hidden" name="COL" value="Username">
                                            Username<input class="form-control " type="text" name="Username">
											</br>
												<button type="submit" class="btn btn-primary">Change</button>
											</form>
                                            <hr />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="menu2" class="tab-pane fade"><br>
                    <h3>Change Password</h3><hr />
                    Current user: <?=$_SESSION['Username']?><br/>
					<form action="Controllers/ChangePassWord.php" method="post">
                    Enter your Current password: *<input class="form-control" type="password" name="cpwd" required>
                    <hr/>
                    Enter your New password: *<input class="form-control" type="password" name="npwd" required>
                    Confirm your new password: *<input class="form-control" type="password" name="npwdc" required><br/>
                    <button type="submit" class="btn btn-primary">submit</button>
					</form>
                </div>
            </div>
        </div>

    </div>
	<br />

</div>

<?php require'base/footer.php';?>