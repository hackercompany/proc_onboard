<?php
$con = mysqli_connect("localhost","root","wadi@123","nitish_vendors");
$data = $_REQUEST;
$q = "INSERT INTO `log`(`order_nr`, `sku`, `item_id`, `vendor_id`, `tp`, `remark`, `agent_id`) VALUES ('".$data['order_nr']."','".$data['sku']."',".$data['item_id'].",'".$data['vendor_id']."',".$data['tp'].",'".$data['remark']."','".$data['agent_id']."')";
echo $q;
?>
