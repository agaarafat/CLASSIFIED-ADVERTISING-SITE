<h3 class="text-center">All Adx</h3>
<hr/>
<div class="row" id="displayInfo" style="height:600px; overflow:scroll">
<?php 
require_once 'dbconfig.php';
require 'Models/ClassifiedAd.cls.php';
$ad = new ClassifiedAd();
$result = $ad->getAllAds($myCon);

Tools::displayBlockAds($result, $ad);
?>
</div>