<?php
require_once '../dbconfig.php';
require_once '../Models/MainCategory.cls.php';

if (isset($_GET["btnSubmit"])) {
    $cTitle = $_GET["txtTitle"];
    $cDesc = $_GET["txtDesc"];
    
    $cat = new MainCategory(null, $cTitle, $cDesc);
    
    $result = $cat->addCategory($myCon);
    
    
    if ($result) {
        echo "The category is added successfully <br/>";
        header( 'Location: ../adminpage.php' ) ;
    }
    else {
        $arr = $myCon->errorInfo();
        echo "Insertion Error :" .$arr[2]. "<br/>";
        echo "<a href='../adminpage.php'>Go Back</a>";
    }
    
}