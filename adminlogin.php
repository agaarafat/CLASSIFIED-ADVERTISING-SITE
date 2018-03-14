<?php 
    session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <style>
        .mySlides {display:none;}
        </style>
    </head>
	<body>
		<div class="container">
			<?php include 'Views/header.php';?>
			<?php include 'Views/menu.php';?>
			<div class="row  jumbotron">
            	<div class="col-sm-6">
            		<h3 class="text-info">Employer Login</h3>
            		<form action="Controllers/logincontrol.php" method="post">
                        <div class="form-group">
                          <label for="usr">User ID:</label>
                          <input type="text" class="form-control" name="txtUser" id="usr"/>
                        </div>
                        <div class="form-group">
                          <label for="pwd">Password:</label>
                          <input type="password" class="form-control" name="txtPwd" id="pwd"/><br/>
                          <label style="color:red;">*** <?php if (isset($_SESSION["Error"])) { echo $_SESSION["Error"];}?></label>
                          <input type="submit" class="btn btn-success form-control" name="btnEmp" id="submit" value="Employer Login"/>
                        </div>
                    </form>
            	</div>
            	<div class="col-sm-6">
            		<h3 class="text-info">Admin Login</h3>
            		<form action="Controllers/logincontrol.php" method="post">
                        <div class="form-group">
                          <label for="usr">User ID:</label>
                          <input type="text" class="form-control" name="txtUser" id="usr"/>
                        </div>
                        <div class="form-group">
                          <label for="pwd">Password:</label>
                          <input type="password" class="form-control" name="txtPwd" id="pwd"/><br/>
                          <label style="color:red;">*** <?php if (isset($_SESSION["Error"])) { echo $_SESSION["Error"];}?></label>
                          <input type="submit" class="btn btn-success form-control" name="btnAdmin" id="submit" value="Admin Login"/>
                        </div>
                    </form>
            	</div>
            </div>
		</div>
	</body>
</html>