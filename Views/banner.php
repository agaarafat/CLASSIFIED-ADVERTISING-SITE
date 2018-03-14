<div class="row  jumbotron" style="background-image: url('images/background.jpg');">
	<div class="col-sm-6">
		<h3 class="text-primary">Registration</h3>
		<a href="registration.php" class="btn btn-primary btn-block">Cleck Here to Registration</a>
		<h3 class="text-primary">Admin Login</h3>
		<a href="adminlogin.php" class="btn btn-primary btn-block">Cleck Here to Get Admin Panel</a>
	</div>
	<div class="col-sm-6">
		<h3 class="text-info">Sign In</h3>
		<form action="Controllers/logincontrol.php" method="post">
            <div class="form-group">
              <label for="usr">Name:</label>
              <input type="text" class="form-control" name="txtUser" id="usr"/>
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" class="form-control" name="txtPwd" id="pwd"/><br/>
              <label style="color:red;">*** <?php if (isset($_SESSION["Error"])) { echo $_SESSION["Error"];}?></label>
              <input type="submit" class="btn btn-success form-control" name="btnMember" id="submit" value="Login"/>
            </div>
        </form>
	</div>
</div>