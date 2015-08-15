<?php
session_start();
$con = mysqli_connect("localhost","root","","procu");
require_once("config.php");
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
    $columns = selColumn($data['selData']);
    unset($data['selData']);
    $q = "SELECT ".$columns." FROM `onboarding`";
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

$r = mysqli_query($con, $q);
if ($r)
$fields = mysqli_num_fields ( $r );
else
$fields = 0;
$header = "";
$data2 = "";
while($p = mysqli_fetch_field( $r )){
    $header .= $p->name . ",";
}

while( $row = mysqli_fetch_row( $r ) )
{
    $line = '';
    $cell = 0;
    foreach( $row as $value )
    {                                            
        if ( ( !isset( $value ) ) || ( $value == "" ) )
        {
            $value = ",";
        }
        else
        {
            if ($cell == 0){
                $hash = hash("md5", $value);
                $cell = 1;
            }
            $value = str_replace( '"' , '""' , $value );
            $value = '"' . $value . '"' . ",";
            if (isset($hash)){
                $value .= '"'.$hash.'",';
                unset($hash);
            }
        }
        $line .= $value;
    }
    $data2 .= trim( $line ) . "\n";
}
$data2 = str_replace( "\r" , "" , $data2 );

if ( $data2 == "" )
{
    $data2 = "\n(0) Records Found!\n";                        
}

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=querry.csv");
header("Pragma: no-cache");
header("Expires: 0");
print "$header\n$data2";