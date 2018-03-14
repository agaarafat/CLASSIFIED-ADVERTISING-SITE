<?php 
require_once 'dbconfig.php';
require_once 'Models/Customer.cls.php';
$cust = new Customer();
$cust->setRefMember($refMember);
$result = $cust->getACustomer($myCon);
?>
<h1>Welcome, <?php echo $fName;?> <?php echo $lName;?></h1>
<form action="Controllers/updatememcontrol.php" method="get" class="form-horizontal">
    	<div class="form-group">
    		<label class="col-sm-4 control-label">First Name</label>
    		<div class="col-sm-8">
    			<input class="form-control" type="text" value="<?php echo $result->getFirstName();?>" disabled="disabled">
    		</div>
    	</div>
    	<div class="form-group">
    		<label class="col-sm-4 control-label">Last Name</label>
    		<div class="col-sm-8">
    			<input class="form-control" type="text" value="<?php echo $result->getLastName();?>" disabled="disabled">
    		</div>
    	</div>
    	<div class="form-group">
    		<label class="col-sm-4 control-label">Address</label>
    		<div class="col-sm-8">
    			<input class="form-control" name="txtAddr" type="text" value="<?php echo $result->getAddress();?>">
    		</div>
    	</div>
    	<div class="form-group">
    		<label class="col-sm-4 control-label">Province</label>
    		<div class="col-sm-8">
    			<input class="form-control" type="text" value="<?php echo $result->getProvince();?>" disabled="disabled">
    		</div>
    	</div>
    	<div class="form-group">
    		<label class="col-sm-4 control-label">City</label>
    		<div class="col-sm-8">
    			<input class="form-control" type="text" value="<?php echo $result->getCity();?>" disabled="disabled">
    		</div>
    	</div>
    	<div class="form-group">
    		<label class="col-sm-4 control-label">Postal Code</label>
    		<div class="col-sm-8">
    			<input class="form-control" type="text" name="txtPCode" value="<?php echo $result->getPostCode();?>">
    		</div>
    	</div>
    	<div class="form-group">
    		<label class="col-sm-4 control-label">Phone</label>
    		<div class="col-sm-8">
    			<input class="form-control" name="txtPhone" type="text" value="<?php echo $result->getPhone();?>">
    		</div>
    	</div>
    	<div class="form-group">
    		<label class="col-sm-4 control-label">Email</label>
    		<div class="col-sm-8">
    			<input class="form-control" type="text" name="txtEmail" value="<?php echo $result->getEmail();?>">
    		</div>
    	</div>
    	<div class="form-group">    		
    		<div class="col-sm-12">
    			<input class="btn btn-success btn-block" name="btnUpInfo" type="submit" value="Update Information">
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
    			<input class="form-control" name="txtPwd1" type="Password" value="">
    		</div>
    	</div>
    	<div class="form-group">
    		<label class="col-sm-4 control-label">Confirm Password</label>
    		<div class="col-sm-8">
    			<input class="form-control" name="txtPwd2" type="Password" value="">
    		</div>
    	</div>
    	<div class="form-group">  
    		<label style="color:red;">*** <?php if (isset($_SESSION["Error"])) { echo $_SESSION["Error"];}?></label>  		
    		<div class="col-sm-12">
    			<input class="btn btn-success btn-block" name="btnUpPass" type="submit" value="Update Password">
    		</div>
    	</div>
</form> 