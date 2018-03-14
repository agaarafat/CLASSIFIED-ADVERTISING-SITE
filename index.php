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
        <script type="text/javascript">
        function displayItem(str) {
        	if (str == "") {
        		document.getElementById("displayInfo").innerHTML = "No Info";
        	} else {
        		if (window.XMLHttpRequest) {
        		// code for IE7+, Firefox, Chrome, Opera, Safari
        		xmlhttp = new XMLHttpRequest();
        		} else {
        		// code for IE6, IE5
        			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        		}
        		xmlhttp.onreadystatechange = function() {
        		if (this.readyState == 4 && this.status == 200) {
        			document.getElementById("displayInfo").innerHTML = this.responseText;
        		}
        	};
        		xmlhttp.open("GET","Controllers/getads.php?ref="+str,true);
        		xmlhttp.send();
        	}
        }
        </script>
        
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <style>
        .mySlides {display:none;}
        </style>
    </head>
	<body style="background-image: url('images/formbk.jpg');")>
		<div class="container">
			<?php include 'Views/header.php';?>
			<?php include 'Views/menu.php';?>
			<?php include 'Views/banner.php';?>
			<div class="row">
				<div class="col-sm-2 well" >
					<?php include 'Views/sidebar.php';?>
				</div>
				<div class="col-sm-10 well">
					<?php include 'Views/adscontainer.php';?>
				</div>
			</div>
		</div>
	</body>
</html>