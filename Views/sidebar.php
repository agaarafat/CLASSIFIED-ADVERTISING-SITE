<h3 class="text-center">Languages</h3>
<input type='button' class='btn btn-warning btn-block' onclick = 'displayItem(this.value)' value='English'/>
<input type='button' class='btn btn-warning btn-block' onclick = 'displayItem(this.value)' value='French'/>
<h3 class="text-center">Categories</h3>
<hr/>

<?php 
require_once 'dbconfig.php';
require 'Models/MainCategory.cls.php';
require 'Tools.cls.php';
$cat = new MainCategory();
$result = $cat->getAllTitle($myCon);
Tools::displayBlockList($result);
?>
