<?php 
require_once 'Models/ClassifiedAd.cls.php';
require_once 'Models/MainCategory.cls.php';
require_once 'Models/SubCategory.cls.php';

$ad = new ClassifiedAd();
$ad->setRefAd($refAd);
$result = $ad->getAAd($myCon);

?>

	<div class="col-sm-6">
		<form class="form-horizontal" action="Controllers/updateadcontrol.php" method="get">
            <div class="form-group">
            	<input class="form-control" type="text" name="txtRefAd" value="<?php echo $result->getRefAd();?>" hidden="hidden" >
            		<label class="col-sm-4 control-label">Ad Title</label>
            		<div class="col-sm-8">
            			<input class="form-control" type="text" value="<?php echo $result->getAdTitle();?>" disabled="disabled">
            		</div>
            	</div>
            	<div class="form-group">
            		<label class="col-sm-4 control-label">Product Condition</label>
            		<div class="col-sm-8">
            			<input class="form-control" type="text" value="<?php echo $result->getProCondition();?>" disabled="disabled">
            		</div>
            	</div>
            	<div class="form-group">
            		<label class="col-sm-4 control-label">Description</label>
            		<div class="col-sm-8">
            			<textarea rows="3" cols="" class="form-control" name="txtDesc"><?php echo $result->getDesc();?></textarea>
            		</div>
            	</div>
            	<div class="form-group">
            		<label class="col-sm-4 control-label">Category</label>
            		<div class="col-sm-8">
            			<input class="form-control" type="text" value="<?php echo $result->getCategory();?>" disabled="disabled">
            		</div>
            	</div>
            	<div class="form-group">
            		<label class="col-sm-4 control-label">Sub Category</label>
            		<div class="col-sm-8">
            			<input class="form-control" type="text" value="<?php echo $result->getSubCategory();?>" disabled="disabled">
            		</div>
            	</div>
            	<div class="form-group">
            		<label class="col-sm-4 control-label">Asking Price</label>
            		<div class="col-sm-8">
            			<input class="form-control" type="text" name="txtPrice" value="<?php echo $result->getPrice();?>">
            		</div>
            	</div>
            	<div class="form-group">
            		<label class="col-sm-4 control-label">Language</label>
            		<div class="col-sm-8">
            			<input class="form-control" type="text" name="txtLang" value="<?php echo $result->getLanguage();?>">
            		</div>
            	</div>
            	<div class="form-group">    		
            		<div class="col-sm-12">
            			<input class="btn btn-success btn-block" name="btnSubmit" type="submit" value="Update Information">
            		</div>
            	</div>          
        </form> 
	</div>