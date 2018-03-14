<?php
require_once '../dbconfig.php';
require_once '../Models/Customer.cls.php';
$refMember = $_GET["ref"];
$cust = new Customer();
$cust->setRefMember($refMember);
$result = $cust->getACustomer($myCon);
?>

<div class="form-group">
<label class="col-sm-4 control-label">Contact Name</label>
<div class="col-sm-8">
<input class="form-control" type="text" value="<?php echo $result->getFirstName() . " " . $result->getLastName();?>" disabled="disabled">
</div>
</div> 
<div class="form-group">
<label class="col-sm-4 control-label">Phone</label>
<div class="col-sm-8">
<input class="form-control" type="text" value="<?php echo $result->getPhone();?>" disabled="disabled">
</div>
</div> 
<div class="form-group">
<label class="col-sm-4 control-label">Email</label>
<div class="col-sm-8">
<input class="form-control" type="text" value="<?php echo $result->getEmail();?>" disabled="disabled">
</div>
</div> 