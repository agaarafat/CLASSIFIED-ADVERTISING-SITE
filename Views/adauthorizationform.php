<table class="table table-bordered">
	<tr><th>A. ID</th><th>Ad Title</th><th>Description</th><th>Price</th><th>Post Date</th><th>Language</th><th>Ref Package</th><th>Status</th><th>Action</th></tr>
	<?php 
	require_once 'Models/ClassifiedAd.cls.php';
	$ad = new ClassifiedAd();
	
	$result = $ad->getAllAds($myCon);
	foreach ($result as $oneAd) {
	    echo "<tr><form action='Controllers/authorizead.php' method='get'><td><input type='txt' name='txtRefAd' style='width: 30px;' hidden='hidden' value='" .$oneAd->getRefAd()."'/>" .$oneAd->getRefAd()."</td>
        <td>".$oneAd->getAdTitle()."</td><td>".$oneAd->getDesc()."</td>
	    <td>".$oneAd->getPrice()."</td><td>".$oneAd->getPostDate(). "</td>
        <td>" .$oneAd->getLanguage(). "</td><td>" .$oneAd->getPackage(). "</td><td>".$oneAd->getStatus()."</td>
        <td><input type='submit' class='btn btn-success btn-block' name='btnActive' value='Active'/><input type='submit' class='btn btn-danger btn-block' name='btnDisable' value='Disable'/></td></form></tr>";
	}
	?>
</table>