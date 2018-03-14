<?php 
    require_once 'dbconfig.php';
    require 'Tools.cls.php';
    require_once 'Models/MainCategory.cls.php';
    require_once 'Models/SubCategory.cls.php';
    require_once 'Models/ClassifiedAd.cls.php';
    require_once 'Models/Customer.cls.php';
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
				<div class="col-sm-12 well" >
					  <h2>Administration Control</h2>
                      <p>Click on the Tabs to display the active and previous tab.</p>
                      <ul class="nav nav-tabs">
                        <li class="active"><a href="#home">Display All</a></li>
                        <li><a href="#menu1">Add Category</a></li>
                        <li><a href="#menu2">Add Sub Category</a></li>
                        <li><a href="#menu3">Authorize Customers</a></li>
                        <li><a href="#menu4">Authorize Ads</a></li>
                        <li><a href="#menu5">Add Package</a></li>
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
                                  $emp = new Customer();
                                  Tools::displayGridView($emp->getAllCustomers($myCon), $emp);
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
                          <h3>Add Category</h3>
                          <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                          <div>
                          	<?php require_once 'Views/catform.php';?>
                          </div>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                          <h3>Sub Category</h3>
                          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                          <div>
                          	<?php require_once 'Views/subcatform.php';?>
                          </div>
                        </div>
                        <div id="menu3" class="tab-pane fade">
                          <h3>Authorize Customers</h3>
                          <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                          <div>
                          	<?php require_once 'Views/custAuthorizationform.php';?>
                          </div>
                        </div>
                        <div id="menu4" class="tab-pane fade">
                          <h3>Authorize Ads</h3>
                          <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                          <div>
                          	<?php require_once 'Views/adauthorizationform.php';?>
                          </div>
                        </div>
                        <div id="menu5" class="tab-pane fade">
                          <h3>Add Package</h3>
                          <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                          <div>
                          	<?php require_once 'Views/pakform.php';?>
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