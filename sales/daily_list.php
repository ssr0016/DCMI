<?php
include "../module/header.php";
include "../module/connect_database.php";
include "../module/function.php";

$sql = "SELECT distinct day from sales";
$result = $conn->query($sql);
date_default_timezone_set("Asia/Taipei");

$bottle = 0;
?>

<script type="text/javascript">
function submitForm(button) {
    if(button == 'delete')
    {
        document.form.action ="delete_confirm.php";
        document.getElementsByName(info).value;
    }
    if(button == 'attach'){
        document.form.action ="attachment.php";
        document.getElementsByName(info).value;
    }
    else{
        document.form.action ="sales.php";
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
        
        <form name="form"  method="post" enctype="multipart/form-data">
        <?php
        if(isset($_SESSION['user'])){
            if($_SESSION['user']=='Media'){
            echo "<center><button title='Save Picture' name='save' type='submit'  onclick='submitForm(\"save\")'>
            <img src='../img/save_add.png'/>
            </button></center>";
            }
        }
        ?>

        <center>
          <font style='font-weight:bold' size='6'>
            Daily Sales
          </font>
          <br/>
        </center>
        
        <div style="font-size:medium;width:800px;margin: 0 auto;">
            <table style="font-size:18px" id="datatables" class="display">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Item</th>
                        <th>Bottles</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        $date = date("m-d-Y", strtotime($row['day']));
                        $date2 = $row['day'];
                        $sql2 = "SELECT sum(bottle) as sum from sales where item='Kings Premium' and day = '$date2'";

                        $result2 = $conn2->query($sql2);
                        $row2 =$result2->fetch_assoc();
                        $bottle = $bottle + $row2['sum'];
                        ?>
                        <tr>                            
                            <td><?=$date?></td>
                            <td>Kings Premium</td>
                            <td align='center'><?=number_format($row2['sum'],0,'.',',')?></td>                                              
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            <font  size='5' >Total Bottles:
            <?php
                echo $bottle;
            ?>
        </div>
            
        
            
           
    </body>
</html>
