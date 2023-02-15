<?php
include "../module/header.php";
include "../module/connect_database.php";
include "../module/function.php";


date_default_timezone_set("Asia/Taipei");

$tincome = 0;


if(isset($_REQUEST['datepicker'])){
    $date = date("Y-m-d", strtotime($_REQUEST['datepicker']));
    $sql = "SELECT * from sales where day = '$date'";
    $result = $conn->query($sql);
}
else{
    $date = date("Y/m/d");
    $sql = "SELECT * from sales where day = '$date'";
    $result = $conn->query($sql);
}
$displayDate = date("F d\, Y", strtotime($date))
?>

<script src="../plugins/datepicker/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );


  </script>

<script type="text/javascript">
function submitForm(button) {
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
    

<!DOCTYPE html>
<html>
    <head>

        
        <!--<script src="../plugins/datatables/js/jquery.js" type="text/javascript"></script>-->
        <script src="../plugins/datatables/js/jquery.dataTables.js" type="text/javascript"></script>
        
        <style type="text/css">
            @import "../plugins/datatables/css/demo_table_jui.css";
            @import "../plugins/datatables/themes/smoothness/jquery-ui-1.8.4.custom.css";
        </style>
        
       
        <script type="text/javascript" charset="utf-8">
            $(document).ready(function(){
                $('#datatables').dataTable({
                    "sPaginationType":"full_numbers",
                    "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                    "iDisplayLength": [[100]],
                    "aaSorting":[[0, "asc"]],
                    "bJQueryUI":true
                });
            })
            
        </script>
        
    </head>
    
    
    <body>
        <br/>
        
        <form name="form"  method="post" enctype="multipart/form-data" autocomplete="off">
        <center>
            <p>Date: <input type="text" name="datepicker" id="datepicker" min="1997-01-01" max="2030-12-31"><input type='submit' id='go' value='Go'><br/>
            <p><?php echo $displayDate; ?>
        </center>
        <?php
        if(isset($_SESSION['user'])){
            if($_SESSION['user']=='Media'){
            echo "<center><button title='Save Picture' name='save' type='submit'  onclick='submitForm(\"save\")'>
            <img src='../img/save_add.png'/>
            </button></center>";
            }
        }
        ?>

        <div style="font-size:medium;width:1000px;margin: 0 auto;">
            <table style="font-size:18px" id="datatables" class="display">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Item</th>
                        <th>Bottles</th>
                        <th>Income</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        $tincome=$tincome+$row['income'];
                        $day = date("m-d-Y", strtotime($row['day']));
                        ?>
                        <tr>                             
                            <td><?=$day?></td>
                            <td><?=$row['item']?></td>
                            <td><?=number_format($row['bottle'],0,'.',',')?></td> 
                            <td align="right"><?=number_format($row['income'],2,'.',',')?></td>                
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            <center>
          <font style='font-weight:bold;color:green' size='6'>
            Total Income: <?=number_format($tincome,2,'.',',');?>
          </font>
          <br/>
        </center>
        </div>

            
        
            
           
    </body>
</html>

<?php
$conn->close();
$conn2->close();
?>