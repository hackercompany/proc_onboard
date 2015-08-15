<?php
$con = mysqli_connect("localhost","root","","procu");
if ($_REQUEST['type']=='A'){
	$q = "SELECT DISTINCT `acode` as acode from `vendor2agent`";
}
else{
	$q = "SELECT DISTINCT `code` as acode from `sku2seller`";
}
$r = mysqli_query($con, $q);
$data = [];
while($row = mysqli_fetch_assoc($r))
{
	array_push($data,$row['acode']);
}
print_r(implode(",",$data));
?>