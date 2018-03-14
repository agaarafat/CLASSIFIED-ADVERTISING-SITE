<?php 
    session_start();
    $refMember = $_SESSION["RefUser"];
    $fName = $_SESSION["FirstName"];
    $lName = $_SESSION["LastName"];
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
    </head>
	<body style="background-image: url('images/formbk.jpg');">
		<div class="container">
			<?php include 'Views/header.php';?>
			<?php include 'Views/menu.php';?>
			<div class="row">
				<div class="col-sm-6">
					<?php include 'Views/customerpage.php';?>
				</div>
				<div class="col-sm-6 well" style="height:700px; overflow:scroll">
					<?php include 'Views/customerads.php';?>
				</div>
			</div>
		</div>
		
	</body>
</html>