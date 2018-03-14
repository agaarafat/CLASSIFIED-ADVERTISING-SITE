<?php
require_once '../dbconfig.php';
require_once '../Models/Package.cls.php';
require_once '../Models/Picture.cls.php';
require_once '../Models/ClassifiedAd.cls.php';

$refAd = $_POST["txtRefAd"];
$pTitle = $_POST["txtTitle"];
$aPic = $_FILES['imgAd']['name'];
echo $aPic;

$pak = new Package();
$pak->setTitle($pTitle);
$pResult = $pak->getAPackageByTitle($myCon);

$pic = new Picture();
$pic->setRefAd($refAd);
$piResult = $pic->countPictureByAd($myCon);
$ser = $piResult+1;
$rest = $pResult->getNbPicture() - $piResult;


if (isset($_POST["btnSubmit"]) && $rest > 0) {
    $pic->setPicPath($aPic['name']);
    $pic->setRefAd($refAd);
    $result = $pic->addPicture($myCon);
    if ($result) {
        move_uploaded_file($aPic,"product_images/".$refAd."_".$aPic['name']);
        echo "The picture is added successfully <br/>";
    }
    else {
        $arr = $myCon->errorInfo();
        echo "Insertion Error :" .$arr[2]. "<br/>";
    }
    
}