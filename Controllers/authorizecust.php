<?php
require_once '../dbconfig.php';
require_once '../Models/Customer.cls.php';

if (isset($_GET["btnActive"])) {
    $refCust = $_GET["txtRefMem"];
    $cust = new Customer();
    $cust->setRefMember($refCust);
    
    $result = $cust->authorizeCustomer($myCon);
    
    
    if ($result) {
        echo "The person status changed successfully <br/>";        
        header( 'Location: ../adminpage.php' ) ;
    }
    else {
        $arr = $myCon->errorInfo();
        echo "Insertion Error :" .$arr[2]. "<br/>";
        echo "<a href='../adminpage.php'>Go Back</a>";
    }
    
}