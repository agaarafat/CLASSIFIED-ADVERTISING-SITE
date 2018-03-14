<?php
require_once '../dbconfig.php';
require_once '../Models/ClassifiedAd.cls.php';
require_once '../Tools.cls.php';

$hints = $_GET["ref"];

if (strlen($hints) < 4) {
    $ad = new ClassifiedAd();
    $ad->setCategory($hints);
    $result = $ad->getAdsByCategory($myCon);
}
else {
    $ad = new ClassifiedAd();
    $ad->setLanguage($hints);
    $result = $ad->getAdsByLanguage($myCon);
}

if ($result != null) {
    Tools::displayBlockAds($result, $ad);
}
else {
    echo "<h1>No ads available in this category!</h1>";
}
?>