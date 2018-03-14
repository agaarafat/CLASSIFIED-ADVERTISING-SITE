<table class="table table-bordered">
	<tr><th>Emp ID</th><th>First Name</th><th>Last Name</th><th>Phone</th><th>Email</th><th>Action</th></tr>
	<?php 
	$emp = new Employee();
	$emp->setEmpType("Admin");
	
	$result = $emp->getAllEmployees($myCon);
	foreach ($result as $oneEmp) {
	    echo "<tr><form action='Controllers/empcontrol.php' method='get'><td><input type='txt' name='txtRefMem' style='width: 30px;' hidden='hidden' value='" .$oneEmp->getRefMember()."'/>".$oneEmp->getRefMember()."</td>
        <td>".$oneEmp->getFirstName()."</td><td>".$oneEmp->getLastName()."</td>
	    <td>" .$oneEmp->getPhone(). "</td><td>" .$oneEmp->getEmail(). "</td>
        <td><input type='submit' class='btn btn-danger btn-block' name='btnDelete' value='Remove'/></td></form></tr>";
	}
	?>
</table> 
