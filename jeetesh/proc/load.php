<?php
$lookup = array(
	"order_nr" => "orderdata`.`order_nr",
	"date" =>"orderdata`.`date",
	"item_id" => "orderdata`.`item_id",
	"bids" => "orderdata`.`bids",
	"item_name" => "orderdata`.`item_name",
	"original_price" => "orderdata`.`original_price",
	"unit_price" => "orderdata`.`unit_price",
	"paid_price" => "orderdata`.`paid_price",
	"item_status" => "orderdata`.`item_status"
);
$va=[];
$con = mysqli_connect("localhost","root","","procu");
$to = $_REQUEST['to'];
unset($_REQUEST['to']);
$from = $_REQUEST['from'];
unset($_REQUEST['from']);
		
try{
	$va['code'] = $_REQUEST['vendor'];
	unset($_REQUEST['vendor']);

}
catch(Exception $e){
	continue;
}
try{
	$va['acode'] = $_REQUEST['agent'];
	unset($_REQUEST['agent']);
}
catch(Exception $e){
	continue;
}
if (isset($_REQUEST['tocken']))
{	

	unset($_REQUEST['tocken']);
	$qu = "SELECT * FROM `orderdata` WHERE `date` BETWEEN '" . $from . "' AND '" . $to . "' ";
	foreach($_REQUEST as $key=>$value){
		if ($value != ""){
			$qu .= "AND `" . $key . "` LIKE '"  . $value . "'";
		}
	}

}
else{
	$qu = "SELECT * FROM `orderdata` WHERE `date` BETWEEN '" . $from . "' AND '" . $to . "' ORDER BY `item_id` LIMIT 30";
}
$r = mysqli_query($con, $qu);
while($row = mysqli_fetch_assoc($r))
{	$vendorq = "SELECT * FROM `sku2agent` WHERE `bid` LIKE '" . $row['bids']. "'";
	if (isset($va)){
		foreach($va as $key=>$value){
		if ($value != ""){	
		$vendorq .= "AND `" . $key . "` LIKE '" . $value . "'";
	}
	}
	}
	$ven = mysqli_query($con,$vendorq);
	$rw = 0;
	$num = mysqli_num_rows($ven) +2;
	while($m = mysqli_fetch_assoc($ven))
	{	$inname = $row['order_nr'] . $row['item_id'] ."_". $m['code'];
		$remark = $inname . "_remark";
		if ($rw == 0){
			$first = $inname . "_main";
			echo "<tr class='first'><td rowspan=$num>".$row['order_nr']."</td>" . "<td rowspan=$num>".$row['date']."</td>"   . "<td rowspan=$num>".$row['sku']."</td>" . "<td rowspan=$num>".$row['item_name']."</td>" . "<td rowspan=$num>".$row['original_price']."</td>" . "<td rowspan=$num>".$row['unit_price']."</td>" . "<td rowspan=$num>".$row['paid_price']."</td>" . "<td rowspan=$num>".$row['item_status']."</td>" . "<td>".$m['name']."</td><td>".$m['code']."</td><td>".$m['tp']."</td><td>".$m['aname']."</td><td>".$m['acode']."</td><td><input type='radio' name='$first' value='yes'>Yes<br><input type='radio' name='$first' value='no'>No</td>"."<td><input type='text' class='boughtin' id='$inname' disabled></td>"."<td><input type='text' class='remark' id='$remark' disabled></td>"."</tr>";
			$rw = 1;
		}
		else{
			echo "<tr><td>" . $m['name'] . "</td><td>".$m['code']."</td><td>".$m['tp']."</td><td>".$m['aname']."</td><td>".$m['acode']."</td><td><input type='radio' name=$inname value='yes'>Yes<br><input type='radio' value='no' name=$inname>No</td>"."<td><input type='text' class='boughtin' id=$inname disabled></td>"."<td><input type='text' class='remark' id='$remark' disabled></td>"."</tr>";
		}

	}
	if ($rw == 1){
	echo "<tr class='center'><td colspan=4><input type='text' placeholder='Vendor Name' class='hidden' sku='".$row['order_nr']."'></td><td colspan=4><input type='text' placeholder='TP' class='hidden' sku='".$row['order_nr']."'></td></tr>";
	echo "<tr class='center'><td colspan=8><button type='button'>Done</button><button type='button' sku='".$row['order_nr']."' value='add'>Add New</button></tr>";

}
}
?>