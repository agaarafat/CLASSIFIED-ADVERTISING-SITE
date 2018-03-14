<?php
require_once '../dbconfig.php';
require_once '../Models/ClassifiedAd.cls.php';



if (isset($_GET["btnSubmit"])) {
    $refAd = $_GET["txtRefAd"];
    $desc = $_GET["txtDesc"];
    $price = $_GET["txtPrice"];
    $lang = $_GET["txtLang"];
    
    
    $ad = new ClassifiedAd();
    $ad->setDesc($desc);
    $ad->setPrice($price);
    $ad->setLanguage($lang);
    $ad->setRefAd($refAd);
    
    $result = $ad->updateAd($myCon);
    header( "Location: ../adupdate.php?ref=$refAd" ) ;
}

?>