<?php 
    require_once 'dbconfig.php';
    require 'Tools.cls.php';
    require_once 'Models/MainCategory.cls.php';
    require_once 'Models/SubCategory.cls.php';
    require_once 'Models/ClassifiedAd.cls.php';
    require_once 'Models/Customer.cls.php';
    require_once 'Models/Employee.cls.php';
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
				<div class="col-sm-12 well" >
					  <h2>Employer Control</h2>
                      <p>Click on the Tabs to display the active and previous tab.</p>
                      <ul class="nav nav-tabs">
                        <li class="active"><a href="#home">Display All</a></li>
                        <li><a href="#menu1">Add Admin</a></li>
                        <li><a href="#menu2">Remove Admin</a></li>
                      </ul>
                    
                      <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                          <h3>Display All</h3>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        	<div class="row">
                        	<div class="col-sm-2">
                              <ul class="nav nav-tabs nav-pills nav-stacked">
                                <li class="active"><a href="#subMenu0">Categories</a></li>
                                <li><a href="#subMenu1">Sub Categories</a></li>
                                <li><a href="#subMenu2">Customers</a></li>
                                <li><a href="#subMenu3">Ads</a></li>
                              </ul>
                            </div>
                              <div class="tab-content col-sm-10">
                                <div id="subMenu0" class="tab-pane fade in active">
                                  <h3>Categories</h3>
                                  <?php                                   
                                  $cat = new MainCategory();
                                  Tools::displayGridView($cat->getAllCategories($myCon), $cat);
                                  ?>
                                </div>
                                <div id="subMenu1" class="tab-pane fade">
                                  <h3>Sub Categories</h3>
                                  <?php                                   
                                  $sCat = new SubCategory();
                                  Tools::displayGridView($sCat->getAllCategories($myCon), $sCat);
                                  ?>
                                </div>
                                <div id="subMenu2" class="tab-pane fade">
                                  <h3>Customers</h3>
                                  <?php                                   
                                  $cust = new Customer();
                                  Tools::displayGridView($cust->getAllCustomers($myCon), $cust);
                                  ?>
                                </div>
                                <div id="subMenu3" class="tab-pane fade">
                                  <h3>Ads</h3>
                                  <?php                                   
                                  $ad = new ClassifiedAd();
                                  Tools::displayGridView($ad->getAllAds($myCon), $ad);
                                  ?>
                                </div>
                              </div>
                            </div>
                        
                        </div>
                        <div id="menu1" class="tab-pane fade">
                          <h3>Add Admin</h3>
                          <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                          <div>
                          	<form action="Controllers/admincontrol.php" method="get" class="form-horizontal" name="registration">
								<?php include 'Views/regform.php';?>
								<div class="col-sm-12">
                        			<input class="btn btn-success btn-block" name="btnSubmit" type="submit" value="Update Password">
                        		</div>
			   				</form>
                          </div>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                          <h3>Remove Admin</h3>
                          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                          <div>
                          	<?php require_once 'Views/adminedit.php';?>
                          </div>
                        </div>                        
                      </div>
                        <hr>
                        <p class="act"><b>Active Tab</b>: <span></span></p>
                        <p class="prev"><b>Previous Tab</b>: <span></span></p>
				</div>
			</div>
		</div>
	<script>
    $(document).ready(function(){
        $(".nav-tabs a").click(function(){
            $(this).tab('show');
        });
        $('.nav-tabs a').on('shown.bs.tab', function(event){
            var x = $(event.target).text();         // active tab
            var y = $(event.relatedTarget).text();  // previous tab
            $(".act span").text(x);
            $(".prev span").text(y);
        });
    });
    </script>
	</body>
</html>