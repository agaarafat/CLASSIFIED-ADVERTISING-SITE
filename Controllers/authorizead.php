<?php
require_once '../dbconfig.php';
require_once '../Models/ClassifiedAd.cls.php';

if (isset($_GET["btnActive"])) {
    $refAd = $_GET["txtRefAd"];
    $ad = new ClassifiedAd();
    $ad->setRefAd($refAd);
    
    
    $result = $ad->authorizeAd($myCon);
    
    
    if ($result) {
        echo "The Sd's status changed successfully <br/>";        
        header( 'Location: ../adminpage.php' ) ;
    }
    else {
        $arr = $myCon->errorInfo();
        echo "Insertion Error :" .$arr[2]. "<br/>";
        
        echo "<a href='../adminpage.php'>Go Back</a>";
    }
    
}