<?php session_start();
?>
<?php 
$con = mysqli_connect("localhost","root","","procu");
if ($_REQUEST['tocken'] == "1"){
$q = "UPDATE `onboarding` SET `seller_name`='".$_REQUEST['seller_name']."',`vendor_code`='".$_REQUEST['vendor_code']."',`seller_sku_name`='".$_REQUEST['seller_sku_name']."',`model_no`='".$_REQUEST['model_no']."',`size`='".$_REQUEST['size']."',`brand`='".$_REQUEST['brand']."',`color`='".$_REQUEST['color']."',`seller_tp`=".$_REQUEST['seller_tp'].",`seller_current_inventory`='".$_REQUEST['seller_current_inventory']."',`flag_ksa`='".$_REQUEST['flag_ksa']."',`flag_uae`='".$_REQUEST['flag_uae']."',`wadi_sku`='".$_REQUEST['wadi_sku']."',`wadi_sku_name`='".$_REQUEST['wadi_sku_name']."',`priority`='".$_REQUEST['priority']."',`wadi_subcat`='".$_REQUEST['wadi_subcat']."',`vendor_location`='".$_REQUEST['vendor_location']."',`mop`=".$_REQUEST['mop'].",`remarks`='".$_REQUEST['remarks']."',`DOU`='".date("Y-m-d H:i:s")."',`ticket_no`='".$_REQUEST['ticket_no']."',`agent_name`='".$_REQUEST['agent_name']."',`ticket_no_product_addition`='".$_REQUEST['ticket_no_product_addition']."',`agent_name_addition`='".$_REQUEST['agent_name_addition']."',`original_tp`=".$_REQUEST['original_tp']." WHERE `sno` = ".$_GET['sno'];
}
elseif($_REQUEST['tocken'] == "0")
    $q = "INSERT INTO `onboarding`(`seller_name`, `vendor_code`, `seller_sku_name`, `model_no`, `size`, `brand`, `color`, `seller_tp`, `seller_current_inventory`, `flag_ksa`, `flag_uae`, `wadi_sku`, `wadi_sku_name`, `priority`, `wadi_subcat`, `vendor_location`, `mop`, `remarks`,  `ticket_no`, `agent_name`, `ticket_no_product_addition`, `agent_name_addition`, `original_tp`) VALUES ('".$_REQUEST['seller_name']."','".$_REQUEST['vendor_code']."','".$_REQUEST['seller_sku_name']."','".$_REQUEST['model_no']."','".$_REQUEST['size']."','".$_REQUEST['brand']."','".$_REQUEST['color']."',".$_REQUEST['seller_tp'].",'".$_REQUEST['seller_current_inventory']."','".$_REQUEST['flag_ksa']."','".$_REQUEST['flag_uae']."','".$_REQUEST['wadi_sku']."','".$_REQUEST['wadi_sku_name']."','".$_REQUEST['priority']."','".$_REQUEST['wadi_subcat']."','".$_REQUEST['vendor_location']."',".$_REQUEST['mop'].",'".$_REQUEST['remarks']."','".$_REQUEST['ticket_no']."','".$_REQUEST['agent_name']."','".$_REQUEST['ticket_no_product_addition']."','".$_REQUEST['agent_name_addition']."','".$_REQUEST['original_tp']."')";
if(!mysqli_query($con, $q)){
    echo 0;
        print_r($_REQUEST);
    print_r($q);
}
else{
    echo 1;

}
?>
