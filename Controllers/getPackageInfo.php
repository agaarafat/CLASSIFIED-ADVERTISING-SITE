<?php
require_once '../Models/Package.cls.php';
require_once '../dbconfig.php';
$ref = $_GET["ref"];

$pkg = new Package();
$pkg->setRefPackage($ref);
$result = $pkg->getAPackage($myCon);

switch ($_GET["ref"]) {
    case 1:
?>
		<input type="text" name="txtRefPackage" value="<?php echo $ref;?>" hidden="hidden"/>
		<div class="form-group">
    		<label class="col-sm-4 control-label">Package Title : </label>
    		<div class="col-sm-8">
    			<?php echo $result->getTitle();?>
    		</div>
    	</div>
    	<div class="form-group">
    		<label class="col-sm-4 control-label">Package Description : </label>
    		<div class="col-sm-8">
    			<?php echo  "Duration: "  .$result->getDuration() . " days,Number of Pictures : " . $result->getNbPicture() ;?>
    		</div>
    	</div>
<?php 
        break;
    default:
        ?>
        <input type="text" name="txtRefPackage" value="<?php echo $ref;?>" hidden="hidden"/>
        <div class="form-group">
    		<label class="col-sm-4 control-label">Package Title : </label>
    		<div class="col-sm-8">
    			<?php echo $result->getTitle();?>
    		</div>
    	</div>
    	<div class="form-group">
    		<label class="col-sm-4 control-label">Package Description : </label>
    		<div class="col-sm-8">
    			<?php echo  "Duration: "  .$result->getDuration() . " days,Number of Pictures : " . $result->getNbPicture() ;?>
    		</div>
    	</div>
    	<div class="form-group">
    		<label class="col-sm-4 control-label">Price (Including TAX)</label>
    		<label class="col-sm-2 control-label">CAD </label>
    		<div class="col-sm-6">
    			<label><?php echo $result->getPrice();?></label>
    			<input name="txtPacPrice" type="text" value="<?php echo $result->getPrice();?>" hidden="hidden"/>
    		</div>
    	</div>
    	<div class="form-group">
    		<label class="col-sm-4 control-label">Card Type</label>
    		<div class="col-sm-8">
    			<select  class="form-control" name="cboPmntType">
    				<option value="">Select Type</option>
    				<option value="Visa">Visa</option>
    				<option value="Master Card">Master Card</option>
    				<option value="Paypal">Paypal</option>
    			</select>
    		</div>
    	</div>
    	<div class="form-group">
    		<label class="col-sm-4 control-label">Card Number </label>
    		<div class="col-sm-8">
    			<input class="form-control" name="txtCardNumber" type="text" value="">
    		</div>
    	</div>
    	<div class="form-group">
    		<label class="col-sm-4 control-label">Name on Card</label>
    		<div class="col-sm-8">
    			<input class="form-control" name="txtCardName" type="text" value="">
    		</div>
    	</div>
        <?php 
        break;
}

?>