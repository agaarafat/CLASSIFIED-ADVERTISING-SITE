<form class="form-horizontal" action="Controllers/adpostcontrol.php" method="get" name="registration">
    <div class="col-sm-6">
    	<div class="form-group">
    		<label class="col-sm-4 control-label">Ad Title</label>
    		<div class="col-sm-8">
    			<input class="form-control" name="txtTitle" type="text" value="" >
    		</div>
    	</div>
    	<div class="form-group">
    		<label class="col-sm-4 control-label">Product Condition</label>
    		<div class="col-sm-8">
    			<input class="form-control" name="txtCondition" type="text" value="">
    		</div>
    	</div>
    	<div class="form-group">
    		<label class="col-sm-4 control-label">Description</label>
    		<div class="col-sm-8">
    			<textarea rows="3" cols="" name="txtDesc" class="form-control"></textarea>
    		</div>
    	</div>
    	<div class="form-group">
    		<label class="col-sm-4 control-label">Category</label>
    		<div class="col-sm-8">
    			<?php 
    			require_once 'Models/MainCategory.cls.php';
    			
    			$cat = new MainCategory();
    			$result = $cat->getAllTitle($myCon);
    			?>
    			<select class="form-control" name="cboCategories" onchange="displaySubCat(this.value)">
    				<option value="">Select a Category</option>
    			<?php 
    			Tools::displayListOfOption($result);
    			?>
    			</select>
    		</div>
    	</div>
    	<div class="form-group">
    		<label class="col-sm-4 control-label">Sub Category</label>
    		<div class="col-sm-8" id="displaySubCat">
    		</div>
    	</div>
    	<div class="form-group">
    		<label class="col-sm-4 control-label">Asking Price</label>
    		<div class="col-sm-8">
    			<input class="form-control" name="txtPrice" type="text" value="">
    		</div>
    	</div>
    	<div class="form-group">
    		<label class="col-sm-4 control-label">Language</label>
    		<div class="col-sm-8">
    			<input class="form-control" name="txtLanguage" type="text" value="">
    		</div>
    	</div>
    </div>
    <div class="col-sm-6">    	
    	<div class="form-group">
    		<label class="col-sm-4 control-label">Select Package</label>
    		<div class="col-sm-8">
    			<?php 
    			 require_once 'Models/Package.cls.php';  
    			 $pkg = new Package();
    			 $result = $pkg->getAllTitle($myCon);
    			 Tools::displayBlockList($result);
    			?>
    		</div>
    	</div>
    	<div id="displayInfo">    
    	<input type="text" name="txtRefPackage" value="1" hidden="hidden"/>	
    	</div>
    	<div class="form-group">    		
    		<div class="col-sm-12">
    			<input class="btn btn-success btn-block" type="submit" name="btnSubmit" value="Post Ad">
    		</div>
    	</div>
    </div>
</form> 