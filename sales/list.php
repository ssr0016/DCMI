<?php
include "../module/header.php";
include "../module/connect_database.php";
include "../module/function.php";

$sql = "SELECT * from sales";
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
                    "aaSorting":[[0, "desc"]],
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
            Sales History
          </font>
          <br/>
        </center>
        
        <div style="font-size:medium;width:1300px;margin: 0 auto;">
            <table style="font-size:18px" id="datatables" class="display">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Item</th>
                        <th>Bottles</th>
                        <th>Price/Bottle</th>
                        <th>Total Amount</th>            
                        <th>Sold To</th>
                        <th>Platform</th>
                        <th>Area</th>
                        <th>Contact Number</th>
                       <th><?php echo space(20);?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        $date = date("m-d-Y", strtotime($row['day']));
                        $bottle = $bottle + $row['bottle'];
                        ?>
                        <tr>                            
                            <td><?=$date?></td>
                            <td><?=$row['item']?></td>
                            <td><?=number_format($row['bottle'],0,'.',',')?></td>                           
                            <td><?=number_format($row['ppbottle'],2,'.',',')?></td>
                            <td><?=number_format($row['tamount'],2,'.',',')?></td>
                            <td><?=$row['soldto']?></td>
                            <td><?=$row['platform']?></td>
                            <td><?=$row['area']?></td>
                           <td><?=$row['contact_no']?></td>                        
                            <td><?php
                            if(isset($_SESSION['user'])){
                                if($_SESSION['user']=="Administrator"){
                                    echo "
                                    <button title=\"Edit\" name=\"edit\" type=\"submit\" value=\"".$row['id']."\"  onclick=\"submitForm('edit')\">
                                    <img height=\"24px\" width=\"25px\" src=\"../icons/edit.png\"/>
                                    </button>
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
                                    <button title=\"ORCR\" name=\"attach\" type=\"submit\" value=\"".$row['id']."\"  onclick=\"submitForm('orcr')\">
                                    <img height=\"24px\" width=\"25px\" src=\"../icons/attach.png\"/>
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
            <font  size='5' >Total Bottles:
            <?php
                echo $bottle;
            ?>
        </div>
            
        
            
           
    </body>
</html>
