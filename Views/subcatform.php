<form action="Controllers/subcatcontrol.php" method="get" class="form-horizontal" name="registration">
    <div class="col-sm-12">
    	<div class="form-group">
    		<label class="col-sm-4 control-label" for="txtFName">Category Title</label>
    		<div class="col-sm-8">
    			<input class="form-control" type="text" name="txtTitle" value="">
    		</div>
    	</div>
    	<div class="form-group">
    		<label class="col-sm-4 control-label">Category Description</label>
    		<div class="col-sm-8">
    			<input class="form-control" type="text" name="txtDesc" value="">
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
    		<div class="col-sm-12">
    			<input class="btn btn-success btn-block" name="btnSubmit" type="submit" value="Submit Information">
    		</div>
    	</div>
    </div>
</form> 