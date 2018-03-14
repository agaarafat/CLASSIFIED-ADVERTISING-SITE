<table class="table table-bordered">
	<tr><th>C. ID</th><th>First Name</th><th>Last Name</th><th>Address</th><th>Phone</th><th>Email</th><th>Status</th><th>Action</th></tr>
	<?php 
	require_once 'Models/Customer.cls.php';
	$cust = new Customer();
	
	$result = $cust->getAllCustomers($myCon);
	foreach ($result as $oneCust) {
	    echo "<tr><form action='Controllers/authorizecust.php' method='get'><td><input type='txt' name='txtRefMem' style='width: 30px;' hidden='hidden' value='" .$oneCust->getRefMember()."'/>".$oneCust->getRefMember()."</td>
        <td>".$oneCust->getFirstName()."</td><td>".$oneCust->getLastName()."</td>
	    <td>".$oneCust->getAddress().", <br/>".$oneCust->getCity().", " .$oneCust->getProvince(). " <br/>" .$oneCust->getPostCode() . "</td>
        <td>" .$oneCust->getPhone(). "</td><td>" .$oneCust->getEmail(). "<td>" .$oneCust->getStatus() . "</td></td>
        <td><input type='submit' class='btn btn-success btn-block' name='btnActive' value='Active'/><input type='submit' class='btn btn-danger btn-block' name='btnDisable' value='Disable'/></td></form></tr>";
	}
	?>
</table>