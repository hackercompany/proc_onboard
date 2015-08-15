<?php
$check = array(
    1 => [],
    0 => [],
    2 => ['vendor_code','seller_sku_name','model_no'],
    3 => ['seller_tp','seller_current_inventory','vendor_code']
);
function selColumn($data){
    if ($data == "")
        return "*";
    else{
        $data = explode(",", $data);
        $final = array_merge(array('sno'),$data);
    return "`" . implode("`,`",$final)."`";
}
}
?>