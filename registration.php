<?php 
if (isset($_SESSION["RefUser"])) {
    header( 'Location: profile.php' ) ;
}
require_once 'dbconfig.php';
require_once 'Tools.cls.php';
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
        		xmlhttp.open("GET","Controllers/getcities.php?ref="+str,true);
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
              txtFName: "required",
              txtLName: "required",
              txtAddress: "required",
              cboProvinces: "required",
              cboCities: "required",
              txtPCode: "required",
              txtPhone: {
                  required: true,
                  matches:"[0-9]+",minlength:10, maxlength:10
              },              
              txtEmail: {
                required: true,
                // Specify that email should be validated
                // by the built-in "email" rule
                email: true
              },
              txtUId: "required",
              txtPwd1: {
            	  required: true,
                  minlength: 6,
                  maxlength: 10,
              },
              txtPwd2: {
            	  //equalTo: "#txtPwd1",
                  minlength: 6,
                  maxlength: 10
              }
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
			   <form action="Controllers/regcontrol.php" method="get" class="form-horizontal" name="registration">
				<?php include 'Views/regform.php';?>
				<div class="row"><div class="col-sm-6"></div><div class="col-sm-6">
    				<div class="form-group">
                		<label class="col-sm-4 control-label">Security Captcha</label>
                		<div class="col-sm-8">
                			<?php 
                			$_SESSION = array();
                			include("captcha.php");
                			$_SESSION['captcha'] = simple_php_captcha();
                			echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code">';
                			$str = $_SESSION['captcha']['code'];
                			$_SESSION['myCapt'] = $str;
                			?>
                		</div>
                	</div>
                	<div class="form-group">
                		<label class="col-sm-4 control-label">Your Answer</label>
                		<div class="col-sm-8">
                			<input class="form-control" name="txtCaptAns" type="text" name="capt" />
                		</div>
                		<label style="color:red;">*** <?php if (isset($_SESSION["Error"])) { echo $_SESSION["Error"];}?></label> 
                	</div>
                	<div class="form-group">    		
                		<div class="col-sm-12">
                			<input class="btn btn-success btn-block" name="btnSubmit" type="submit" value="Submit Information">
                		</div>
                	</div>
				</div></div>
			   </form>
			</div>
		</div>
		
	</body>
</html>