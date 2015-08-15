<?php
session_start();
require_once("config.php");
$con = mysqli_connect("localhost","root","","procu");
$flag = 0;
$data = $_REQUEST;
unset($_REQUEST['tocken']);
if ( isset($data['seller_name'])){
    if ( $data['seller_name'] !="")
    $data['seller_name'] = "%" . $data['seller_name'] . "%";
}
if (isset($data['seller_sku_name'])){
    if ($data['seller_sku_name'] !="")
    $data['seller_sku_name'] = "%" . $data['seller_sku_name'] . "%";
}
if (isset($data['wadi_sku_name'])){
    if ($data['wadi_sku_name'] !="")
    $data['wadi_sku_name'] = "%" . $data['wadi_sku_name'] . "%";
}
if (isset($data['DOU1']) || isset($data['DOU1'])){
    $d1 = $data['DOU1'];
    $d2 = $data['DOU2'];
    if ($d1 == "")
        $d1 = $d2;
    elseif ($d2 == "") {
        $d2 = $d1;
    }
    unset($data['DOU1']);
    unset($data['DOU2']);
}
if (isset($data['DOA1']) || isset($data['DOA1'])){
    $da1 = $data['DOA1'];
    $da2 = $data['DOA1'];
    if ($da1 == "")
        $da1 = $da2;
    elseif ($da2 == "") {
        $da2 = $da1;
    }
    unset($data['DOA1']);
    unset($data['DOA2']);
}
$empty = 0;
foreach($_REQUEST as $key=>$value){
    if ($value != ""){
        $empty = 1;
    }
}
if (isset($data['tocken']) && $empty == 1){
    unset($data['tocken']);
    $q = "SELECT * FROM `onboarding`";
    foreach($data as $key=>$value){
        if ($value != ""){
            if ($flag == 0){
                $q .= " WHERE `" . $key . "` LIKE '" . $value . "'";
                $flag = 1;
            }
            else{
                $q .= "AND `" . $key . "` LIKE '"  . $value . "'";
            }
        }
    }
    if ($d1!="" && $d2!=""){
        if ($flag == 0){
            $q .= " WHERE ";
            $flag = 1;
        }
        else {
            $q .= " AND ";
        }
        $q .= "`DOU` BETWEEN '$d1' AND '$d2'";
    }
    if ($da1!="" && $da2!=""){
        if ($flag == 0){
            $q .= " WHERE ";
            $flag = 1;
        }
        else {
            $q .= " AND ";
        }
        $q .= "`DOA` BETWEEN '$da1' AND '$da2'";
    }
}
else {
    $q = "SELECT * FROM `onboarding` LIMIT 50";
}

$type = $_SESSION['type'];
$r = mysqli_query($con, $q);
while($row = mysqli_fetch_assoc($r)){
    if ($type != 0)
    echo "<tr class='first'><td><a href=# id='".$row['sno']."' name='edit'>Edit</a></td><td>" . $row['seller_name'] . "</td>" . "<td>" . $row['vendor_code'] . "</td>" . "<td>" . $row['seller_sku_name'] . "</td>" . "<td>" . $row['model_no'] . "</td>" . "<td>" . $row['size'] . "</td>" . "<td>" . $row['brand'] . "</td>" . "<td>" . $row['color'] . "</td>" . "<td>" . $row['seller_tp'] . "</td>" . "<td>" . $row['seller_current_inventory'] . "</td>" . "<td>" . $row['flag_ksa'] . "</td>" . "<td>" . $row['flag_uae'] . "</td>" . "<td>" . $row['wadi_sku'] . "</td>" . "<td>" . $row['wadi_sku_name'] . "</td>" . "<td>" . $row['priority'] . "</td>" . "<td>" . $row['wadi_subcat'] . "</td>" . "<td>" . $row['vendor_location'] . "</td>" . "<td>" . $row['mop'] . "</td>" . "<td>" . $row['remarks'] . "</td>" . "<td>" . $row['DOU'] . "</td>" . "<td>" . $row['ticket_no'] . "</td>". "<td>" . $row['agent_name'] . "</td>" . "<td>" . $row['DOA'] . "</td>" . "<td>" . $row['ticket_no_product_addition'] . "</td>" . "<td>" . $row['agent_name_addition'] . "</td>"  . "<td>" . $row['original_tp'] . "</td></tr>";
    else
        echo "<tr class='first'><td>" . $row['seller_name'] . "</td>" . "<td>" . $row['vendor_code'] . "</td>" . "<td>" . $row['seller_sku_name'] . "</td>" . "<td>" . $row['model_no'] . "</td>" . "<td>" . $row['size'] . "</td>" . "<td>" . $row['brand'] . "</td>" . "<td>" . $row['color'] . "</td>" . "<td>" . $row['seller_tp'] . "</td>" . "<td>" . $row['seller_current_inventory'] . "</td>" . "<td>" . $row['flag_ksa'] . "</td>" . "<td>" . $row['flag_uae'] . "</td>" . "<td>" . $row['wadi_sku'] . "</td>" . "<td>" . $row['wadi_sku_name'] . "</td>" . "<td>" . $row['priority'] . "</td>" . "<td>" . $row['wadi_subcat'] . "</td>" . "<td>" . $row['vendor_location'] . "</td>" . "<td>" . $row['mop'] . "</td>" . "<td>" . $row['remarks'] . "</td>" . "<td>" . $row['DOU'] . "</td>" . "<td>" . $row['ticket_no'] . "</td>". "<td>" . $row['agent_name'] . "</td>" . "<td>" . $row['DOA'] . "</td>" . "<td>" . $row['ticket_no_product_addition'] . "</td>" . "<td>" . $row['agent_name_addition'] . "</td>"  . "<td>" . $row['original_tp'] . "</td></tr>";
}
?>
