<?php
require_once 'Models/Customer.cls.php';
require_once 'Models/ClassifiedAd.cls.php';
require_once 'Models/Payment.cls.php';
require_once 'Models/MainCategory.cls.php';
require_once 'Models/SubCategory.cls.php';
require_once 'Models/Package.cls.php';
require_once 'dbconfig.php';
require_once 'Models/Picture.cls.php';
require_once 'Tools.cls.php';




$c1 = new Customer(1, "Mark",
    "wah", "6400 boul rose", "Laval", "qc",
    "h1m2y5", "514333222", "adfd@gmgl.com", "1234",
    "123456", "active");
$c2 = new Customer(null,'yaseen','ahmed','140 breton ave','Montreal','QC','h7n2j6','4506295851','yaseen@gmail.com','10','1234','Pending');
echo $c2->header();
echo $c2;
echo $c2->footer();

$result = $c2->addCustomer($myCon);
echo $myCon->lastInsertId();
//$c2->setRefMember(1);

// $c3 = new Customer();
// $c3->setRefMember(2);
// echo $c3->getACustomer($myCon)->displayAMember();

//echo $c2->displayAMember();

//$result = $c2->getCustomers($myCon);
//echo $c2->displayAllCustomers($result);
// echo $c1->header();
// echo $c1;
// echo $c1->footer();

echo Date('Y-m-d');

//$a1 = new ClassifiedAd(14, 'Wooden Dinner Table','Very Good','Wooden dinner table with 6 chairs',2,1,200,'2015-09-17','2015-09-20','French',2,3);

//$result = $a1->DeleteAd($myCon);
// $result = $a1->getAllAds($myCon);
// echo $a1->displayAllAds($result);

// $a2 = new ClassifiedAd();
// $a2->setRefAd(7);
// echo $a2->getAAd($myCon)->displayAdToUser();

// $p1 = new Payment(null,'Credit Card',50,'Payment for package 1','2017-11-17',1);
// $result = $p1->getAllPayments($myCon);
// echo $p1->displayAllPayments($result);
// $result = $p1->addPayment($myCon);
// $result = $p1->getAllPayments($myCon);
// echo $p1->displayAllPayments($result);


// $cat1 = new SubCategory(8, 'Part Time','Weekly 15 to 20 hrs',7);
// $result = $cat1->getAllCategories($myCon);
// echo $cat1->displayAllCategories($result);
// $result = $cat1->deleteSubCategory($myCon);
// $result = $cat1->getAllCategories($myCon);
// echo $cat1->displayAllCategories($result);

// $pkg1 = new Package(3, 'Super Premium','Exclusive for full members',12,8);
// $result = $pkg1->getAllPackages($myCon);
// echo $pkg1->displayAllCategories($result);
// $result = $pkg1->updatePackage($myCon);
// $result = $pkg1->getAllPackages($myCon);
// echo $pkg1->displayAllCategories($result);

// $cat2 = new MainCategory(6, 'Kitchen','Kitchen Accessories');
// $result = $cat2->getAllCategories($myCon);
// echo $cat2->displayAllCategories($result);
// $result = $cat2->updateCategory($myCon);
// $result = $cat2->getAllCategories($myCon);
// echo $cat2->displayAllCategories($result);

// $pic1 = new Picture(5, 'Dinner Table', '/images/table.jpg', 10);
// $result = $pic1->getAllPictures($myCon);
// echo $pic1->displayAllPictures($result);
// $result = $pic1->deletePicture($myCon);
// $result = $pic1->getAllPictures($myCon);
// echo $pic1->displayAllPictures($result);

// $pk = new SubCategory();
// $pk->setCategory(1);
// $result = $pk->getAllTitle($myCon);
// $t1 = new Tools();
// $t1->displayListOfOption($result, $pk);

?>

<?php

// session_start();
// if (isset($_GET["sub"])) {
//     $str = $_SESSION['myCapt'];
//     echo $str;
//     echo $str;
//     if ($_GET["capt"] == $str) {
//         echo "successfull";
//         //header("location: testfile.php");
//     }
//     else {
//         echo "wrong";
//     }
// }

?>


<?php 
    			require_once 'Models/Package.cls.php'; 
    			$pkg = new Package();
    			$pkg->setRefPackage(1);
    			$result = $pkg->getAPackage($myCon);
    	?>
    	<div class="form-group">
    		<label class="col-sm-4 control-label">Package Title : </label>
    		<div class="col-sm-8">
    			<?php echo $result->getTitle();?>
    		</div>
    	</div>
    	<div class="form-group">
    		<label class="col-sm-4 control-label">Package Description : </label>
    		<div class="col-sm-8">
    			<?php echo  "Duration: "  .$result->getDuration() . " days,Number of Pictures : " . $result->getNbPicture() ;?>
    		</div>
    	</div>
    	<div class="form-group">    		
    		<div class="col-sm-12">
    			<input class="btn btn-success btn-block" type="submit" value="Post Ad">
    		</div>
    	</div>