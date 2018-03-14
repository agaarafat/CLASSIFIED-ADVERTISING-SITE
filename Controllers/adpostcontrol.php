<?php
require_once '../dbconfig.php';
require_once '../Models/ClassifiedAd.cls.php';
require_once '../Models/Payment.cls.php';
if (isset($_GET["btnSubmit"])) {
    $refMember = 1;
    
    $adTitle = $_GET["txtTitle"];
    $cond = $_GET["txtCondition"];
    $desc = $_GET["txtDesc"];
    $cat = $_GET["cboCategories"];
    $subCat = $_GET["cboSubCategories"];
    $price = $_GET["txtPrice"];
    $postDate = Date('y-m-d');
    $expDate = Date('y-m-d');
    $lan = $_GET["txtLanguage"];
    $pkg = $_GET["txtRefPackage"];
    
    if ($pkg > 1) {
        $amount = $_GET["txtPacPrice"];
        $pmntType = $_GET["cboPmntType"];
        $cardNo = $_GET["txtCardNumber"];
        $accHolder = $_GET["txtCardName"];
        $date = Date('y-m-d');
        $pmntDesc = "$cardNo, $accHolder";
        
        
        $pmnt = new Payment(null, $pmntType, $amount, $pmntDesc, $date, $refMember);
        $result = $pmnt->addPayment($myCon);
        if ($result) {
            echo "The Payment is added successfully <br/>";
        }
        else {
            $arr = $myCon->errorInfo();
            echo "Insertion Error :" .$arr[2]. "<br/>";
            return;
        }
    }
    $ad = new ClassifiedAd(null, $adTitle, $cond, $desc, $cat, $subCat, $price, $postDate, $expDate, $lan, $pkg, $refMember);
    $result = $ad->addAd($myCon);
    if ($result) {
        echo "The Ad is added successfully <br/>";
    }
    else {
        $arr = $myCon->errorInfo();
        echo "Insertion Error :" .$arr[2]. "<br/>";
        return;
    }
    
    echo $myCon->lastInsertId();
}
?>

    
