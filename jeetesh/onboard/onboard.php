<?php session_start();
require_once("config.php");
?>
<html>
<head>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
    <style type="text/css">
    .cont {
        overflow-x:scroll;
    }
    .hidden {
        display: none;
    }
    td {
  width: 50px;
}
body{
      margin: 0 auto;
}
input[type="text"] {
  width: 50px;
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
          float: left;
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
        float: left;
  width: 100%;

    }
    .boughtin{
        width:40px !important;
    }
    .first{
        border-top:0.2em solid #000 !important;
    }
    .add{
        margin-left: 10px;
    }
    </style>
    <script>
  $(function() {
    $( "#DOA" ).datepicker({ dateFormat: 'yy-mm-dd' });
    $( "#DOU1" ).datepicker({ dateFormat: 'yy-mm-dd' });
    $( "#DOU2" ).datepicker({ dateFormat: 'yy-mm-dd' });
  });

  </script>
</head>
<body>
<div class="cover" id="cover"><img src="loader.gif" class="loader"></div>
<div class="header">
<button id="reset" class="reset">Reset</button>
<?php if($_SESSION['type'] != 0){ ?>
<button id="add" class="reset add">Add New</button>
<button id="upload" class="reset add">Add Bulk</button>
<input type="file" id="upfile" class="hidden">
<?php } ?>
<button id="down" class="reset add">Download</button>
</div>
<div class="container">
    <form action="lol.php" id="mainform">
        <table class="cont"><thead><tr>
        <?php if($_SESSION['type'] != 0) { ?>
        <td>Edit</td>
        <?php } ?>
        <td><?php if (in_array('seller_name', $check[$_SESSION['type']])){ ?><input type="checkbox" name="data[]" value='seller_name'><br><?php } ?>Seller Name<br><input type="text" id="seller_name" ></td>
        <td><?php if (in_array('vendor_code', $check[$_SESSION['type']])){ ?><input type="checkbox" name="data[]" value='vendor_code'><br><?php } ?>Vendor Code<br><input type="text" id="vendor_code"></td>
        <td><?php if (in_array('seller_sku_name', $check[$_SESSION['type']])){ ?><input type="checkbox" name="data[]" value='seller_sku_name'><br><?php } ?>Sku Name<br><input type="text" id="seller_sku_name"></td>
        <td><?php if (in_array('model_no', $check[$_SESSION['type']])){ ?><input type="checkbox" name="data[]" value='model_no'><br><?php } ?>Model No<br><input type="text" id="model_no"></td>
        <td><?php if (in_array('size', $check[$_SESSION['type']])){ ?><input type="checkbox" name="data[]" value='size'><br><?php } ?>Size<br><input type="text" id="size"></td>
        <td><?php if (in_array('brand', $check[$_SESSION['type']])){ ?><input type="checkbox" name="data[]" value='brand'><br><?php } ?>Brand<br><input type="text" id="brand"></td>
        <td><?php if (in_array('color', $check[$_SESSION['type']])){ ?><input type="checkbox" name="data[]" value='color'><br><?php } ?>Color<br><input type="text" id="color"></td>
        <td><?php if (in_array('seller_tp', $check[$_SESSION['type']])){ ?><input type="checkbox" name="data[]" value='seller_tp'><br><?php } ?>Seller TP</td>
        <td><?php if (in_array('seller_current_inventory', $check[$_SESSION['type']])){ ?><input type="checkbox" name="data[]" value='seller_current_inventory'><br><?php } ?>Seller Inventory</td>
        <td><?php if (in_array('flag_ksa', $check[$_SESSION['type']])){ ?><input type="checkbox" name="data[]" value='flag_ksa'><br><?php } ?>KSA<br><input type="text" id="flag_ksa"></td>
        <td><?php if (in_array('flag_uae', $check[$_SESSION['type']])){ ?><input type="checkbox" name="data[]" value='flag_uae'><br><?php } ?>UAE<br><input type="text" id="flag_uae"></td>
        <td><?php if (in_array('wadi_sku', $check[$_SESSION['type']])){ ?><input type="checkbox" name="data[]" value='wadi_sku'><br><?php } ?>Wadi ID<br><input type="text" id="wadi_sku"></td>
        <td><?php if (in_array('wadi_sku_name', $check[$_SESSION['type']])){ ?><input type="checkbox" name="data[]" value='wadi_sku_name'><br><?php } ?>Wadi Name<br><input type="text" id="wadi_sku_name"></td>
        <td><?php if (in_array('priority', $check[$_SESSION['type']])){ ?><input type="checkbox" name="data[]" value='priority'><br><?php } ?>Priority<br><input type="text" id="priority"></td>
        <td><?php if (in_array('wadi_subcat', $check[$_SESSION['type']])){ ?><input type="checkbox" name="data[]" value='wadi_subcat'><br><?php } ?>Subcat<br><input type="text" id="wadi_subcat"></td>
        <td><?php if (in_array('vendor_location', $check[$_SESSION['type']])){ ?><input type="checkbox" name="data[]" value='vendor_location'><br><?php } ?>Location<br><input type="text" id="vendor_location"></td>
        <td><?php if (in_array('mop', $check[$_SESSION['type']])){ ?><input type="checkbox" name="data[]" value='mop'><br><?php } ?>MOP</td>
        <td><?php if (in_array('remarks', $check[$_SESSION['type']])){ ?><input type="checkbox" name="data[]" value='remarks'><br><?php } ?>Remarks</td>
        <td><?php if (in_array('DOU', $check[$_SESSION['type']])){ ?><input type="checkbox" name="data[]" value='DOU'><br><?php } ?>DOU<br><input type="text" id="DOU1"><input type="text" id="DOU2"></td>
        <td><?php if (in_array('ticket_no', $check[$_SESSION['type']])){ ?><input type="checkbox" name="data[]" value='ticket_no'><br><?php } ?>Ticket No(Updation)<br><input type="text" id="ticket_no"></td>
        <td><?php if (in_array('agent_name', $check[$_SESSION['type']])){ ?><input type="checkbox" name="data[]" value='agent_name'><br><?php } ?>Agent Name<br><input type="text" id="agent_name"></td>
        <td><?php if (in_array('DOA', $check[$_SESSION['type']])){ ?><input type="checkbox" name="data[]" value='DOA'><br><?php } ?>Date Of Addition<br><input type="text" id="DOA1"><input type="text" id="DOA2"></td>
        <td><?php if (in_array('ticket_no_product_addition', $check[$_SESSION['type']])){ ?><input type="checkbox" name="data[]" value='ticket_no_product_addition'><br><?php } ?>Ticket Number(Addition)<br><input type="text" id="ticket_no_product_addition"></td>
        <td><?php if (in_array('agent_name_addition', $check[$_SESSION['type']])){ ?><input type="checkbox" name="data[]" value='agent_name_addition'><br><?php } ?>Agent Name(Addition)<br><input type="text" id="agent_name_addition"></td>
        <td><?php if (in_array('original_tp', $check[$_SESSION['type']])){ ?><input type="checkbox" name="data[]" value='original_tp'><br><?php } ?>Original TP</td>
        </tr></thead>
        <tbody  id="divres">
        </tbody>
        </table>
        <input type="hidden" name="tocken" value="Q7Nj98HGBV" id = "tocken">
        <input type="submit" style="position: absolute; left: -9999px" name = "submit">
    </form>
    </div>
</body>
<script>
function makeURL(data)
{
   var ret = [];
   for (var d in data)
      ret.push(encodeURIComponent(d) + "=" + encodeURIComponent(data[d]));
   return ret.join("&");
}
$(document).ready(
    function(){
        $("#cover").css("display","block");
        $.ajax({url:"onload.php",async:true,
    success: function(result){
        $("#divres").html(result);
        $("#cover").css("display","none");
    }
});


});
$("#mainform").submit(
    function(event){
        $("#cover").css("display","block");
        event.preventDefault();
        $.ajax({url:"onload.php",async:true,data:{
            seller_name:$("#seller_name").val(),
            vendor_code:$("#vendor_code").val(),
            seller_sku_name:$("#seller_sku_name").val(),
            size:$("#size").val(),
            brand:$("#brand").val(),
            color:$("#color").val(),
            flag_ksa:$("#flag_ksa").val(),
            flag_uae:$("#flag_uae").val(),
            wadi_sku:$("#wadi_sku").val(),
            wadi_sku_name:$("#wadi_sku_name").val(),
            priority:$("#priority").val(),
            wadi_subcat:$("#wadi_subcat").val(),
            vendor_location:$("#vendor_location").val(),
            ticket_no:$("#ticket_no").val(),
            agent_name:$("#agent_name").val(),
            DOA1:$("#DOA1").val(),
            DOA2:$("#DOA2").val(),
            DOU1:$("#DOU1").val(),
            DOU2:$("#DOU2").val(),
            ticket_no_product_addition:$("#ticket_no_product_addition").val(),
            agent_name_addition:$("#agent_name_addition").val(),
            model_no:$("#model_no").val(),
            tocken:$('#tocken').val()
    },
    success: function(result){
        $("#divres").html(result);
        $("#cover").css("display","none");
    }
});
    }
    );
$("#reset").click(

        function(){
        $("#cover").css("display","block");
        $("#seller_name").val("");
        $("#vendor_code").val("");
        $("#seller_sku_name").val("");
        $("#size").val("");
        $("#brand").val("");
        $("#color").val(""),
        $("#flag_ksa").val("");
        $("#flag_uae").val("");
        $("#wadi_sku").val("");
        $("#wadi_sku_name").val("");
        $("#priority").val("");
        $("#wadi_subcat").val("");
        $("#vendor_location").val("");
        $("#ticket_no").val("");
        $("#agent_name").val("");
        $("#DOA1").val("");
        $("#DOA2").val("");
        $("#DOU1").val("");
        $("#DOU2").val("");
        $("#ticket_no_product_addition").val("");
        $("#agent_name_addition").val("");
        $("#model_no").val("");
        $('#tocken').val("");
        $("#upfile").removeProp( "files" );
        $.ajax({url:"onload.php",async:true,
    success: function(result){
        $("#divres").html(result);
        $("#cover").css("display","none");
    }
});
    }
    );
$("#add").click(function(){
    window.open("http://localhost/onboard/edit.php", "_blank", "toolbar=yes, scrollbars=yes, resizable=yes,top=0,left=300, width=400, height=600");

});
$("#down").click(function(){
    var selData = [];
    $("[name='data[]']:checked").each(
        function(){
        selData.push($(this).attr("value"));
    });
    console.log(selData);
    var data = {
        'seller_name':$("#seller_name").val(),
            'vendor_code':$("#vendor_code").val(),
            'seller_sku_name':$("#seller_sku_name").val(),
            'size':$("#size").val(),
            'brand':$("#brand").val(),
            'color':$("#color").val(),
            'flag_ksa':$("#flag_ksa").val(),
            'flag_uae':$("#flag_uae").val(),
            'wadi_sku':$("#wadi_sku").val(),
            'wadi_sku_name':$("#wadi_sku_name").val(),
            'priority':$("#priority").val(),
            'wadi_subcat':$("#wadi_subcat").val(),
            'vendor_location':$("#vendor_location").val(),
            'ticket_no':$("#ticket_no").val(),
            'agent_name':$("#agent_name").val(),
            'DOA1':$("#DOA1").val(),
            'DOA2':$("#DOA2").val(),
            'DOU1':$("#DOU1").val(),
            'DOU2':$("#DOU2").val(),
            'ticket_no_product_addition':$("#ticket_no_product_addition").val(),
            'agent_name_addition':$("#agent_name_addition").val(),
            'model_no':$("#model_no").val(),
            'tocken':$('#tocken').val(),
            'selData':selData
        }
        window.open("http://localhost/onboard/download.php?"+ makeURL(data), "_blank", "toolbar=yes, scrollbars=yes, resizable=yes,top=0,left=300, width=400, height=600");
        window.close();
});
$(document).on("click","a[name='edit']",function(event) {
    window.open("http://localhost/onboard/edit.php?sno="+$(this).attr("id"), "_blank", "toolbar=yes, scrollbars=yes, resizable=yes,top=0,left=300, width=400, height=600");
    window.refresh = function(){
        $("#mainform").submit();
}
});
$("#upfile").change(function(){
    var file_data = $('#upfile').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
    alert(form_data);                             
    $.ajax({
                url: 'upload.php', // point to server-side PHP script 
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                success: function(php_script_response){
                    alert(php_script_response); // display response from the PHP script, if any
                }
     });
    var input = $("#upfile");
    input.replaceWith(input.val('').clone(true));
})
$('#upload').on('click', function() {
    $("#upfile").trigger("click");
    
});
</script>
</html>