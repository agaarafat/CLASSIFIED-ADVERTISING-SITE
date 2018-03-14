<?php
require_once 'dbconfig.php';
require_once 'Tools.cls.php';
$refAd = $_GET["ref"];
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
        .mySlides {display:none}
        .demo {cursor:pointer}
        </style>
        
        <script type="text/javascript">
        function displaySubCat(str) {
        	if (str == "") {
        		document.getElementById("displaySubCat").innerHTML = "No Info";
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
        			document.getElementById("displaySubCat").innerHTML = this.responseText;
        		}
        	};
        		xmlhttp.open("GET","getsubcat.php?ref="+str,true);
        		xmlhttp.send();
        	}
        }
        function displayContact() {
            var str = document.getElementById("txtMember").value;
        	if (str == "") {
        		document.getElementById("txtInfo").innerHTML = "No Info";
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
        			document.getElementById("txtInfo").innerHTML = this.responseText;
        		}
        	};
        		xmlhttp.open("GET","Controllers/getmembercontact.php?ref="+str,true);
        		xmlhttp.send();
        	}
        }
        </script>
    </head>
	<body style="background-image: url('images/formbk.jpg');">
		<div class="container">
			<?php include 'Views/header.php';?>
			<?php include 'Views/menu.php';?>
			<div class="row">
			<?php 			
			require_once 'Views/addetails.php';
			require_once 'Views/addpicture.php';
			?>
			</div>
		</div>
		
	</body>
</html>