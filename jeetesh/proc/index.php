<html>
<head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
        <meta charset="utf-8">
        <title>Bootply snippet - Bootstrap Complex form</title>
        <meta name="generator" content="Bootply">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Bootstrap ">
        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
        
        <!--[if lt IE 9]>
          <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link rel="apple-touch-icon" href="/bootstrap/img/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/bootstrap/img/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/bootstrap/img/apple-touch-icon-114x114.png">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>





        <!-- CSS code from Bootply.com editor -->
        
        <style type="text/css">
           input[type="text"]{
           	height:35px !important;
           } 
        </style>
    <script>
  $(function() {
    $( "#startdate" ).datepicker({ dateFormat: 'yy-mm-dd' });
    $( "#todate" ).datepicker({ dateFormat: 'yy-mm-dd' });
  });

  </script></head>
<body>
<div class="container">
<form>        
  <div class="row-fluid clearfix">	
    <h4 class="float-l"><i class="icon-asterisk icon-large"></i> Order Details</h4>
    <ul class="nav nav-tabs">
      <li class="active"><a href="#">General Information</a></li>

    </ul>
  </div><!--/.row-->

  
  <div class="row-fluid">
    <h4 class=""><i class="icon-plus-sign-alt"></i> Date</h4>
    <hr>
    <div class="clearfix">
      <fieldset >
        <label>From</label>
        
        <input type="text" class="input span4" placeholder="Add daterange picker" id="startdate">
        
      </fieldset>
      
      <fieldset >
        <label>To</label>
       
        <input class="input span4" type="text" placeholder="Pickup Date" id="todate">

      </fieldset>
      
     
    </div><!--/.clearfix-->
  </div><!--/.row-->
  
  
  
  <div class="row-fluid">
    <h4><i class="icon-plus-sign-alt"></i> Additional Information</h4>
    <hr>
    
    <div class="form-inline">
          <input type="text" class="span4" placeholder="Agent Code: AXXXXXX" id="agent">
      <input type="text" class="span4" placeholder="Vendor Code" id="vcode">
      
      <select class="span4">
        <option>Priority Upto</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
      </select>
      
     
    </div>

  </div><!--/.row-->
  
  
  </form>
</div>
<script>
var tags = [];
var vcode=[];
  $(document).ready(
  function(){
    $.ajax({url:"getdata.php?type=A",async:true,
  success: function(result){
    tags = result.split(",");
    console.log(tags);
  }
});
    $.ajax({url:"getdata.php?type=B",async:true,
  success: function(result){
    vcode = result.split(",");
    console.log(tags);
  }
});
  }
  );
$( "#agent" ).autocomplete({
  source: function( request, response ) {
          var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
          response( $.grep( tags, function( item ){
              return matcher.test( item );
          }) );
      }
});
$( "#vcode" ).autocomplete({
  source: function( request, response ) {
          var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
          response( $.grep( vcode, function( item ){
              return matcher.test( item );
          }) );
      }
});
</script>
</body>
</html>