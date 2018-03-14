
    <div class="col-sm-6">
    	<div class="form-group">
    		<label class="col-sm-4 control-label" for="txtFName">First Name</label>
    		<div class="col-sm-8">
    			<input class="form-control" type="text" name="txtFName" value="">
    		</div>
    	</div>
    	<div class="form-group">
    		<label class="col-sm-4 control-label">Last Name</label>
    		<div class="col-sm-8">
    			<input class="form-control" type="text" name="txtLName" value="">
    		</div>
    	</div>
    	<div class="form-group">
    		<label class="col-sm-4 control-label">Address</label>
    		<div class="col-sm-8">
    			<input class="form-control" type="text" name="txtAddress" value="">
    		</div>
    	</div>
    	<div class="form-group">
    		<label class="col-sm-4 control-label">Province</label>
    		<div class="col-sm-8">
    			<?php 
    			require_once 'Models/Province.cls.php';
    			
    			$prov = new Province();
    			$result = $prov->getAllProvinces($myCon);
    			?>
    			<select class="form-control" name="cboProvinces" onchange="displayItem(this.value)">
    				<option value="">Select Province</option>
    			<?php 
    			Tools::displayListOfOption2($result);
    			?>
    			</select>
    		</div>
    	</div>
    	<div class="form-group">
    		<label class="col-sm-4 control-label">City</label>
    		<div class="col-sm-8" id="displayInfo">
    		</div>
    	</div>
    	<div class="form-group">
    		<label class="col-sm-4 control-label">Postal Code</label>
    		<div class="col-sm-8">
    			<input class="form-control" name="txtPCode" type="text" value="">
    		</div>
    	</div>
    </div>
    <div class="col-sm-6">
    	<div class="form-group">
    		<label class="col-sm-4 control-label">Phone</label>
    		<div class="col-sm-8">
    			<input class="form-control" name="txtPhone" type="text" value="">
    		</div>
    	</div>
    	<div class="form-group">
    		<label class="col-sm-4 control-label">Email</label>
    		<div class="col-sm-8">
    			<input class="form-control" name="txtEmail" type="text" value="">
    		</div>
    	</div>
    	<div class="form-group">
    		<label class="col-sm-4 control-label">User ID</label>
    		<div class="col-sm-8">
    			<input class="form-control" name="txtUId" type="text" value="">
    		</div>
    	</div>
    	<div class="form-group">
    		<label class="col-sm-4 control-label">Password</label>
    		<div class="col-sm-8">
    			<input class="form-control" name="txtPwd1" type="text" value="">
    		</div>
    	</div>
    	<div class="form-group">
    		<label class="col-sm-4 control-label">Confirm Password</label>
    		<div class="col-sm-8">
    			<input class="form-control" name="txtPwd2" type="text" value="">
    		</div>
    		<label style="color:red;">*** <?php if (isset($_SESSION["Error"])) { echo $_SESSION["Error"];}?></label> 
    	</div>    	
    </div>
