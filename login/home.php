<?php
include "../module/header.php";
include "../module/connect_database.php";
include "../module/function.php";


date_default_timezone_set("Asia/Taipei");

?>
<script type="text/javascript">
function submitForm(button) {
    if(button == 'delete')
    {
        document.form.action ="delete.php";
        document.getElementsByName(info).value;
    }
    else{
        document.form.action ="transaction.php";
        document.getElementsByName(info).value;
    }
  document.forms['form'].submit();
}

$(document).ready(function(abc){
    $('[data-toggle="popover"]').popover({
        placement : 'right',
        trigger : 'hover',
        html : true,
        content : abc
    });
});
</script>

<style>
table { 
  width: 100%; 
  border-collapse: collapse; 
}
/* Zebra striping */
tr:nth-of-type(odd) { 
  background: #eee; 
}
th { 
  background: #949494; 
  color: white; 
  font-weight: bold; 
}
td, th { 
  padding: 6px; 
  border: 1px solid #ccc; 
  text-align: left; 
}
</style>

<script src="../plugins/datatables/js/jquery.dataTables.js" type="text/javascript"></script>
        
        <style type="text/css">
            @import "../plugins/datatables/css/demo_table_jui.css";
            @import "../plugins/datatables/themes/smoothness/jquery-ui-1.8.4.custom.css";
        </style>
        
       
        <script type="text/javascript" charset="utf-8">
            $(document).ready(function(){
                $('#datatables').dataTable({
                    "sPaginationType":"full_numbers",
                    "aaSorting":[[2, "desc"]],
                    "bJQueryUI":true
                });
            })
            
        </script>
</head> 
<center>
  <font style='font-weight:bold' size='6'>
    Divergent Concepts Marketing Inc.
  </font>
  <br/>
  <font size='4'>
    Inventory System
  </font>
</center>
<br/><br/>


      
     
          



<body>
	
</body>
</html>