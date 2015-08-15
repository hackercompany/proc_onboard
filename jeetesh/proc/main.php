<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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
  width: 100px;
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
		position: absolute;
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
	}
	.loader{
		position: relative;
		top: 50%;
		left: 50%;
	}
	.reset {
		float:right;
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
</head>
<body>
<div class="cover" id="cover"><img src="loader.gif" class="loader"></div>
<div class="header">
<button id="reset" class="reset">Reset</button>
</div>
<div class="container">
	<form action="lol.php" id="mainform">
		<table class="cont"><thead><tr>
		<td>Order No<br><input type="text" id="order_nr" name="order_nr"></td>
		<td>Date</td>
		<td>SKU<br><input type="text" id="sku" name="sku"></td>
		<td>Name</td>
		<td>Original Price</td>
		<td>Unit Price</td>
		<td>Paid Price</td>
		<td>Item Status<br><input type="text" id="item_status" name="item_status"></td>
		<td>Vendor</td>
		<td> VCode<br><input type="text" id="vendor" name="vendor" value=<?php if (isset($_REQUEST['vendor'])) echo "\"" .  $_REQUEST['vendor'] . "\""; ?> ></td>
		<td>TP</td>
		<td>Agent</td>
		<td>Acode<br><input type="text" id="agent" name="agent" value=<?php if (isset($_REQUEST['agent'])) echo "\"" .  $_REQUEST['agent'] . "\""; ?>></td>
		<td>Bought</td>
		<td>Bought Price</td>
		<td>Remarks</td>
		</tr></thead>
		<tbody  id="divres">
		</tbody>
		</table>
		<input type="hidden" name="tocken" value="Q7Nj98HGBV" id = "tocken">
		<input type="hidden" name="to" id="to" value=<?php echo "\"" .  $_REQUEST['to'] . "\""; ?>>
		<input type="hidden" id="from" value=<?php echo "\"" .  $_REQUEST['from'] . "\""; ?>>
		<input type="submit" style="position: absolute; left: -9999px" name = "submit">
	</form>
	</div>
</body>
<script>
$(document).ready(
	function(){
		$("#cover").css("display","block");
		$.ajax({url:"load.php",async:true,data:{
			to:$("#to").val(),
			from:$("#from").val(),
			vendor:$("#vendor").val(),
			agent:$("#agent").val()
			},
	success: function(result){
		$("#divres").html(result);
		$("#cover").css("display","none");
	}
});
	$("input:radio").on("click",function() {

    alert("clicked");
    
   });
	}
	);
$(document).on("click","button",function(){
	if ($(this).attr('value') == "add"){
	var sku = $(this).attr('sku');
	var selector = "[sku^='" + sku + "']";
	$(selector).css("display","block");
	var allno_text = "[name^='"+sku+"'][value='no']"
	var allno = $(allno_text)
	allno.forEach(function(item){
		
	});
}
else{
	alert("Done Pressed");
}

});
$(document).on("click","input:radio",function(event) {


   var spl = $(this).attr('name').split("_");
   if (spl[spl.length-1] == "main"){
   spl.pop();
   var bb = spl.join("_");}
   else{
   	var bb = spl.join("_");
   }
   var boughtin = "#" + bb;
   var remark = boughtin + "_remark";
   if ($(this).attr('value') == "yes"){
   		$(boughtin).prop("disabled",false);
   		$(remark).prop("disabled",true);
   	}
   else{
   	$(boughtin).prop("disabled",true);
   	var loc_array = $(this).attr('name').split("_")
   	if (loc_array[loc_array.length-1] == "main")
   	$(remark).prop("disabled",false);
   }
    
   });
$("#reset").click(

		function(){
		$("#cover").css("display","block");
		$("#order_nr").val("");
		$("#item_status").val("");
		$("#sku").val("");
		$("#vendor").val("");
		$("#agent").val("");
		$.ajax({url:"load.php",async:true,data:{
			to:$("#to").val(),
			from:$("#from").val()},
	success: function(result){
		$("#divres").html(result);
		$("#cover").css("display","none");
	}
});
	}
	);
$("#mainform").submit(
	function(event){
		$("#cover").css("display","block");
		event.preventDefault();
		console.log({
			order_nr:$("#order_nr").val(),
			item_status:$("#item_status").val(),
			sku:$("#sku").val(),
			to:("#to").val(),
			from:("#from").val(),
			vendor:$("#vendor").val(),
			agent:$("#agent").val(),
			tocken:$('#tocken').val()
	});
		$.ajax({url:"load.php",async:true,data:{
			order_nr:$("#order_nr").val(),
			to:("#to").val(),
			from:("#from").val(),
			item_status:$("#item_status").val(),
			sku:$("#sku").val(),
			vendor:$("#vendor").val(),
			agent:$("#agent").val(),
			tocken:$('#tocken').val()
	},
	success: function(result){
		$("#divres").html(result);
		$("#cover").css("display","none");
	}
});
	}
	);
</script>
</html>