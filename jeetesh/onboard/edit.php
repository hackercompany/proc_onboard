<?php session_start();
require_once("config.php");
$type = $_SESSION['type'];
?>
<html>
<head>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
    </script>
    <style type="text/css">
    .cont {
        overflow-x:scroll;
    }
    .hidden {
        display: none;
    }
    td {
  width: 100px;
}
body{
      margin: 0 auto;
}
input[type="text"] {
  width: 150px;
}
.center{
    text-align: center;
}
    thead td{
        text-align: center;
        background:#b5cfd2 url('cell-blue.jpg');
    border-width: 1px;
    padding: 8px;
    border-style: solid;
    border-color: #999999;
    }
    tbody td{
        background: #eee;
        background:#dcddc0 url('cell-grey.jpg');
    border-width: 1px;
    padding: 8px;
    border-style: solid;
    border-color: #999999;
    }
    
    table{
        font-family: verdana,arial,sans-serif;
    font-size:11px;
    color:#333333;
    border-width: 1px;
    border-color: #999999;
    border-collapse: collapse;
    }
    .cover {
        position: fixed;
        width:100%;
        height:100%;
        top:0;
        z-index: 10000;
        background: #000;
        opacity: 0.3;
        display: none;
    }
    .container{
        z-index: -1;
        padding: 1%;
        text-align: -webkit-center;
    }
    .loader{
        position: relative;
        top: 50%;
        left: 50%;
    }
    .reset {
        float:left;
    }
    .header{
        padding: 1%;

    }
    .boughtin{
        width:40px !important;
    }
    .first{
        border-top:0.2em solid #000 !important;
    }
    </style>
    <script>
  $(function() {
    $( "#DOA" ).datepicker({ dateFormat: 'yy-mm-dd' });
    $( "#DOU" ).datepicker({ dateFormat: 'yy-mm-dd' });
  });

  </script>
</head>
<body>
<div class="container">
<div class = "wrapper">
<form id="mainform" name="mainform">
        <?php 
        if(isset($_GET['sno'])) { 
            $con = mysqli_connect("localhost","root","","procu");
            $q = "SELECT * FROM `onboarding` WHERE `sno` = " . $_GET['sno'];
            $r = mysqli_query($con, $q);
            $row = mysqli_fetch_assoc($r)
            ?>
        <table>
        <tr><td><label for="seller_name">Seller Name</label></td><td><input type="text" id="seller_name" value=<?php echo "\"".$row['seller_name']."\"" ?> <?php if (array_search('seller_name', $check[$type])) echo " disabled" ?>></td></tr>
        <tr><td><label for="vendor_code">Vendor Code</label></td><td><input type="text" id="vendor_code" value=<?php echo "\"".$row['vendor_code']."\"" ?> <?php if (array_search('vendor_code', $check[$type])) echo " disabled" ?>></td></tr>
        <tr><td><label for="seller_sku_name">Sku Name</label></td><td><input type="text" id="seller_sku_name" value=<?php echo "\"".$row['seller_sku_name']."\"" ?> <?php if (array_search('seller_sku_name', $check[$type])) echo " disabled" ?>></td></tr>
        <tr><td><label for="model_no">Model No</label></td><td><input type="text" id="model_no" value=<?php echo "\"".$row['model_no']."\"" ?> <?php if (array_search('model_no', $check[$type])) echo " disabled" ?>></td></tr>
        <tr><td><label for="size">Size</label></td><td><input type="text" id="size" value=<?php echo "\"".$row['size']."\"" ?> <?php if (array_search('size', $check[$type])) echo " disabled" ?>></td></tr>
        <tr><td><label for="brand">Brand</label></td><td><input type="text" id="brand" value=<?php echo "\"".$row['brand']."\"" ?> <?php if (array_search('brand', $check[$type])) echo " disabled" ?>></td></tr>
        <tr><td><label for="color">Color</label></td><td><input type="text" id="color" value=<?php echo "\"".$row['color']."\"" ?> <?php if (array_search('color', $check[$type])) echo " disabled" ?>></td></tr>
        <tr><td><label for="seller_tp">Seller TP</label></td><td><input type="text" id="seller_tp" value=<?php echo "\"".$row['seller_tp']."\"" ?> <?php if (array_search('seller_tp', $check[$type])) echo " disabled" ?>></td></tr>
        <tr><td><label for="seller_current_inventory">Seller Inventory</label></td><td><input type="text" id="seller_current_inventory" value=<?php echo "\"".$row['seller_current_inventory']."\"" ?> <?php if (array_search('seller_current_inventory', $check[$type])) echo " disabled" ?>></td></tr>
        <tr><td><label for="flag_ksa">KSA</label></td><td><input type="text" id="flag_ksa" value=<?php echo "\"".$row['flag_ksa']."\"" ?> <?php if (array_search('flag_ksa', $check[$type])) echo " disabled" ?>></td></tr>
        <tr><td><label for="flag_uae">UAE</label></td><td><input type="text" id="flag_uae" value=<?php echo "\"".$row['flag_uae']."\"" ?> <?php if (array_search('flag_uae', $check[$type])) echo " disabled" ?>></td></tr>
        <tr><td><label for="wadi_sku">Wadi ID</label></td><td><input type="text" id="wadi_sku" value=<?php echo "\"".$row['wadi_sku']."\"" ?> <?php if (array_search('wadi_sku', $check[$type])) echo " disabled" ?>></td></tr>
        <tr><td><label for="wadi_sku_name">Wadi Name</label></td><td><input type="text" id="wadi_sku_name" value=<?php echo "\"".$row['wadi_sku_name']."\"" ?> <?php if (array_search('', $check[$type])) echo " disabled" ?>></td></tr>
        <tr><td><label for="priority">Priority</label></td><td><input type="text" id="priority" value=<?php echo "\"".$row['priority']."\"" ?> <?php if (array_search('wadi_sku_name', $check[$type])) echo " disabled" ?>></td></tr>
        <tr><td><label for="wadi_subcat">Subcat</label></td><td><input type="text" id="wadi_subcat" value=<?php echo "\"".$row['wadi_subcat']."\"" ?> <?php if (array_search('wadi_subcat', $check[$type])) echo " disabled" ?>></td></tr>
        <tr><td><label for="vendor_location">Location</label></td><td><input type="text" id="vendor_location" value=<?php echo "\"".$row['vendor_location']."\"" ?> <?php if (array_search('vendor_location', $check[$type])) echo " disabled" ?>></td></tr>
        <tr><td><label for="mop">MOP</label></td><td><input type="text" id="mop" value=<?php echo "\"".$row['mop']."\"" ?>  <?php if (array_search('mop', $check[$type])) echo " disabled" ?>></td></tr>
        <tr><td><label for="remarks">Remarks</label></td><td><input type="text" id="remarks" value=<?php echo "\"".$row['remarks']."\"" ?> <?php if (array_search('remarks', $check[$type])) echo " disabled" ?>></td></tr>
        <tr><td><label for="ticket_no">Ticket No(Updation)</label></td><td><input type="text" id="ticket_no" value=<?php echo "\"".$row['ticket_no']."\"" ?> <?php if (array_search('ticket_no', $check[$type])) echo " disabled" ?>></td></tr>
        <tr><td><label for="agent_name">Agent Name</label></td><td><input type="text" id="agent_name" value=<?php echo "\"".$row['agent_name']."\"" ?> <?php if (array_search('agent_name', $check[$type])) echo " disabled" ?>></td></tr>
        <tr><td><label for="DOA">Date Of Addition</label></td><td><input type="text" id="DOA" value=<?php echo "\"".$row['DOA']."\"" ?> disabled></td></tr>
        <tr><td><label for="ticket_no_product_addition">Ticket Number(Addition)</label></td><td><input type="text" id="ticket_no_product_addition" value=<?php echo "\"".$row['ticket_no_product_addition']."\"" ?> <?php if (array_search('ticket_no_product_addition', $check[$type])) echo " disabled" ?>></td></tr>
        <tr><td><label for="agent_name_addition">Agent Name(Addition)</label></td><td><input type="text" id="agent_name_addition" value=<?php echo "\"".$row['agent_name_addition']."\"" ?> <?php if (array_search('agent_name_addition', $check[$type])) echo " disabled" ?>></td></tr>
        <tr><td><label for="original_tp">Original TP</label></td><td><input type="text" id="original_tp" value=<?php echo "\"".$row['original_tp']."\"" ?> <?php if (array_search('original_tp', $check[$type])) echo " disabled" ?>></td></tr>
        <tr ><td colspan="2" style="text-align: -webkit-center;"><input type="submit" name = "submit"></td></tr>
        </table>
        <input type="hidden" id="sno" value=<?php echo "\"".$_GET['sno']."\"" ?>>
        <input type="hidden" value="1" id="tocken">
        <?php } ?>
    <?php if(!isset($_GET['sno'])) {
     ?>
        <table>
        <tr><td><label for="seller_name">Seller Name</label></td><td><input type="text" id="seller_name"></td></tr>
        <tr><td><label for="vendor_code">Vendor Code</label></td><td><input type="text" id="vendor_code"></td></tr>
        <tr><td><label for="seller_sku_name">Sku Name</label></td><td><input type="text" id="seller_sku_name"></td></tr>
        <tr><td><label for="model_no">Model No</label></td><td><input type="text" id="model_no"></td></tr>
        <tr><td><label for="size">Size</label></td><td><input type="text" id="size"></td></tr>
        <tr><td><label for="brand">Brand</label></td><td><input type="text" id="brand"></td></tr>
        <tr><td><label for="color">Color</label></td><td><input type="text" id="color"></td></tr>
        <tr><td><label for="seller_tp">Seller TP</label></td><td><input type="text" id="seller_tp"></td></tr>
        <tr><td><label for="seller_current_inventory">Seller Inventory</label></td><td><input type="text" id="seller_current_inventory"></td></tr>
        <tr><td><label for="flag_ksa">KSA</label></td><td><input type="text" id="flag_ksa"></td></tr>
        <tr><td><label for="flag_uae">UAE</label></td><td><input type="text" id="flag_uae"></td></tr>
        <tr><td><label for="wadi_sku">Wadi ID</label></td><td><input type="text" id="wadi_sku"></td></tr>
        <tr><td><label for="wadi_sku_name">Wadi Name</label></td><td><input type="text" id="wadi_sku_name"></td></tr>
        <tr><td><label for="priority">Priority</label></td><td><input type="text" id="priority"></td></tr>
        <tr><td><label for="wadi_subcat">Subcat</label></td><td><input type="text" id="wadi_subcat"></td></tr>
        <tr><td><label for="vendor_location">Location</label></td><td><input type="text" id="vendor_location"></td></tr>
        <tr><td><label for="mop">MOP</label></td><td><input type="text" id="mop"></td></tr>
        <tr><td><label for="remarks">Remarks</label></td><td><input type="text" id="remarks"></td></tr>
        <tr><td><label for="DOU">DOU</label></td><td><input type="text" id="DOU"></td></tr>
        <tr><td><label for="ticket_no">Ticket No(Updation)</label></td><td><input type="text" id="ticket_no"></td></tr>
        <tr><td><label for="agent_name">Agent Name</label></td><td><input type="text" id="agent_name"></td></tr>
        <tr><td><label for="DOA">Date Of Addition</label></td><td><input type="text" id="DOA"></td></tr>
        <tr><td><label for="ticket_no_product_addition">Ticket Number(Addition)</label></td><td><input type="text" id="ticket_no_product_addition"></td></tr>
        <tr><td><label for="agent_name_addition">Agent Name(Addition)</label></td><td><input type="text" id="agent_name_addition"></td></tr>
        <tr><td><label for="original_tp">Original TP</label></td><td><input type="text" id="original_tp"></td></tr>
        <tr ><td colspan="2" style="text-align: -webkit-center;"><input type="submit" name = "submit"></td></tr>
        </table>
        <input type="hidden" id="sno" value=>
        <input type="hidden" value="0" id="tocken">
        <?php } ?>
</form>
</div>
</div>
</body>
<script type="text/javascript">
    $("#mainform").submit(
    function(event){
        event.preventDefault();
        $.ajax({url:"exec.php",async:true,data:{
            seller_name:$("#seller_name").val(),
            vendor_code:$("#vendor_code").val(),
            seller_sku_name:$("#seller_sku_name").val(),
            size:$("#size").val(),
            brand:$("#brand").val(),
            vendor:$("#vendor").val(),
            color:$("#color").val(),
            seller_tp:$("#seller_tp").val(),
            seller_current_inventory:$("#seller_current_inventory").val(),
            flag_ksa:$("#flag_ksa").val(),
            flag_uae:$("#flag_uae").val(),
            wadi_sku:$("#wadi_sku").val(),
            wadi_sku_name:$("#wadi_sku_name").val(),
            priority:$("#priority").val(),
            wadi_subcat:$("#wadi_subcat").val(),
            vendor_location:$("#vendor_location").val(),
            mop:$("#mop").val(),
            remarks:$("#remarks").val(),
            ticket_no:$("#ticket_no").val(),
            agent_name:$("#agent_name").val(),
            ticket_no_product_addition:$("#ticket_no_product_addition").val(),
            agent_name_addition:$("#agent_name_addition").val(),
            model_no:$("#model_no").val(),
            original_tp:$("#original_tp").val(),
            tocken:$('#tocken').val(),
            sno:$('#sno').val()
    },
    success: function(result){
        console.log(result);
        if(result == 1){
            window.onunload = function (e) {
    opener.refresh(); //or
};
            window.close();
        }
    }
});
    }
    );
</script>