<?php
require_once '../dbconfig.php';
require_once '../Models/SubCategory.cls.php';
require_once '../Tools.cls.php';

$refCat= $_GET["ref"];
$sCat = new SubCategory();
$sCat->setCategory($refCat);
$result = $sCat->getAllTitle($myCon);
?>
<select class="form-control" name="cboSubCategories">
	<option value="">Select Sub Category</option>
<?php 
    Tools::displayListOfOption($result);
?>
</select>