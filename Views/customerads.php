<h3 class="text-center">All Adx</h3>
<hr/>
<div class="row">
<?php 
require_once 'dbconfig.php';
require 'Models/ClassifiedAd.cls.php';
require_once 'Tools.cls.php';
$ad = new ClassifiedAd();
$ad->setMember($refMember);
$result = $ad->getAllAdsOfMember($myCon);

Tools::displayBlockAdsForUpdate($result, $ad);
?>
</div>
