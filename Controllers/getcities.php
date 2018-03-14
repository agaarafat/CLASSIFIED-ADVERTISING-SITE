<?php
require_once '../dbconfig.php';
require_once '../Models/City.cls.php';
require_once '../Tools.cls.php';

$refProv = $_GET["ref"];
$cty = new City();
$cty->setProvince($refProv);
$result = $cty->getAllCities($myCon);
?>
<select class="form-control" name="cboCities">
	<option value="">Select City</option>
<?php 
Tools::displayListOfOption2($result);
?>
</select>
