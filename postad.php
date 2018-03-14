<?php 
require_once 'dbconfig.php';
require_once 'Tools.cls.php';
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
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
        
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
        		xmlhttp.open("GET","Controllers/getPackageInfo.php?ref="+str,true);
        		xmlhttp.send();
        	}
        }
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
        		xmlhttp.open("GET","Controllers/getsubcat.php?ref="+str,true);
        		xmlhttp.send();
        	}
        }
        </script>
        <script type="text/javascript">
        //Wait for the DOM to be ready
        $(function() {
          // Initialize form validation on the registration form.
          // It has the name attribute "registration"
          $("form[name='registration']").validate({
            // Specify validation rules
            rules: {
              // The key name on the left side is the name attribute
              // of an input field. Validation rules are defined
              // on the right side
              txtTitle: "required",
              txtCondition: "required",
              txtDesc: "required",
              cboCategories: "required",
              cboSubCategories: "required",
              txtPrice: "required",              
              txtLanguage: "required",
              cboPmntType: "required",
              txtCardNumber: "required",
              txtCardName: "required",
              txtCaptAns: "required"
              
            },
            // Specify validation error messages
            messages: {
              firstname: "Please enter your firstname",
              lastname: "Please enter your lastname",
              
              password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
              },
              email: "Please enter a valid email address"
            },
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function(form) {
              form.submit();
            }
          });
        });
        </script>
        <style type="text/css">

        img {
            border: solid 1px #ccc;
            margin: 0 2em;
        }
        form .error {
            color: #ff0000;
        }
    </style>
    
    </head>
	<body style="background-image: url('images/formbk.jpg');">
		<div class="container">
			<?php include 'Views/header.php';?>
			<?php include 'Views/menu.php';?>
			<div class="row">
				<?php include 'Views/adform.php';?>
			</div>
		</div>
		
	</body>
</html>