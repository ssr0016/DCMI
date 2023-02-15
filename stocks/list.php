<?php
include "../module/header.php";
include "../module/connect_database.php";
include "../module/function.php";

$sql = "SELECT * from stocks";
$result = $conn->query($sql);
date_default_timezone_set("Asia/Taipei");

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
        document.form.action ="stocks.php";
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
            Inventory
          </font>
          <br/>
        </center>

        <div style="font-size:medium;width:1000px;margin: 0 auto;">
            <table style="font-size:18px" id="datatables" class="display">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Item</th>
                        <th>Boxes</th>
                        <th>Total Quantity</th>
                        <th>Price/Box</th>            
                        <th>Price/Bottle</th>
                        <th>Total Amount</th>
                       <th><?php echo space(20);?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        $date = date("m-d-Y", strtotime($row['day']));
                        ?>
                        <tr>                            
                            <td><?=$date?></td>
                            <td><?=$row['item']?></td>
                            <td><?=number_format($row['boxes'],0,'.',',')?></td>                           
                            <td><?=number_format($row['tquantity'],0,'.',',')?></td>
                            <td><?=number_format($row['priceperbox'],2,'.',',')?></td>
                            <td><?=number_format($row['priceperbottle'],2,'.',',')?></td>
                            <td><?=number_format($row['tamount'],2,'.',',')?></td>                  
                            <td><?php
                            if(isset($_SESSION['user'])){
                                if($_SESSION['user']=="Administrator"){
                                    echo "
                                    <button title=\"View Info\" name=\"info\" type=\"submit\" value=\"".$row['id']."\"  onclick=\"submitForm('info')\">
                                    <img height=\"24px\" width=\"25px\" src=\"../icons/info.png\"/>
                                    </button>
                                    <button title=\"Delete\" name=\"delete\" type=\"submit\" value=\"".$row['id']."\"  onclick=\"submitForm('delete')\">
                                    <img height=\"24px\" width=\"25px\" src=\"../icons/delete.png\"/>
                                    </button>
                                    ";
                                }
                                else if($_SESSION['user']=="user"){
                                    echo "
                                    <button title=\"View Info\" name=\"info\" type=\"submit\" value=\"".$row['id']."\"  onclick=\"submitForm('info')\">
                                    <img height=\"24px\" width=\"25px\" src=\"../icons/info.png\"/>
                                    </button>
                                    <button title=\"Insurance\" name=\"insurance\" type=\"submit\" value=\"".$row['id']."\"  onclick=\"submitForm('insurance')\">
                                    <img height=\"24px\" width=\"25px\" src=\"../icons/add.png\"/>
                                    </button>
                                    ";
                                }
                                else if($_SESSION['user']=="guest"){
                                    echo "
                                    <button title=\"View Info\" name=\"info\" type=\"submit\" value=\"".$row['id']."\"  onclick=\"submitForm('info')\">
                                    <img height=\"24px\" width=\"25px\" src=\"../icons/info.png\"/>
                                    </button>
                                    <button title=\"Insurance\" name=\"insurance\" type=\"submit\" value=\"".$row['id']."\"  onclick=\"submitForm('insurance')\">
                                    <img height=\"24px\" width=\"25px\" src=\"../icons/add.png\"/>
                                    </button>
                                    ";
                                }
                                
                            }
                          
                            ?>
                  
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            <font  size='5' >Kings Premium:
            <?php
                $sql = "SELECT * from remaining where item = 'Kings Premium'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                echo $row['quantity'];

            ?>
            </font>
             <font  size='5' >
            <br/>Kings 500 ml:
            <?php
                $sql = "SELECT * from remaining where item = 'Kings 500 ml'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                echo $row['quantity'];

            ?>
            </font>
        </div>
            
        
            
           
    </body>
</html>
