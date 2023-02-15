<?php
include "../module/header.php";
include "../module/connect_database.php";
include "../module/function.php";

if (!isset($_REQUEST['edit']) && !isset($_REQUEST['info']) && !isset($_SESSION['id']))
  {
       $sql = "SELECT * from stocks where id = -1";
       $mode = "add";
       $readonly = "";
       $disabled = "";
       $clickable = "onclick='return false;'";
       $disabled2 = "disabled";
       $generate = "disabled";
     if($_SESSION['user']==""){
    header("Location: ../login/login.php");
    }
  }
  elseif(isset($_REQUEST['info'])){
    $mode = "view";
    $_SESSION['id']=$_REQUEST['info'];
    $id = $_SESSION['id'];
    $sql = "SELECT * from stocks where id = $id";
    $readonly = "readonly";
    $disabled = "disabled";
    $disabled2 = "disabled";
    $clickable = "";
  }

  elseif(isset($_REQUEST['edit'])){
    $mode = "edit";
    $_SESSION['id']=$_REQUEST['edit'];
    $id = $_SESSION['id'];
    $sql = "SELECT * from stocks where id = $id";
    $readonly = "";
    $disabled = "";
    $disabled2 = "";
    $clickable = "";
  }

  else{
    $mode = "edit";
    $id = $_SESSION['id'];
    $sql = "SELECT * from stocks where id = $id";
    $readonly = "";
    $disabled = "";
    $disabled2 = "";
    $clickable = "";
  }
$result = $conn->query($sql);
if ($result->num_rows > 0) {  
  $row = $result->fetch_assoc();
  $day = date("m-d-Y", strtotime($row['day']));
  $item = $row['item'];
  $boxes = $row['boxes'];
  $perbox = $row['perbox'];
  $tquantity = $row['tquantity'];
  $priceperbox = $row['priceperbox'];
  $priceperbottle = $row['priceperbottle'];
  $tamount = $row['tamount'];
  

}
else{
  $day = "";
  $item = "";
  $boxes = "";
  $perbox = "";
  $tquantity = "";
  $priceperbox = "";
  $priceperbottle = "";
  $tamount = "";
}
?>
<style>
  .modal-header, h4, .close {
      background-color: #5cb85c;
      color:white !important;
      text-align: center;
      font-size: 20px;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }
  </style>

  <script src="../plugins/datepicker/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#day" ).datepicker();
  } );


  </script>

  <script>


  function compute(){

    var b = document.getElementById('boxes').value;
    var c = document.getElementById('perbox').value;
    document.getElementById('tquantity').value = b*c;
    
    var x = document.getElementById('priceperbox').value;
    var y = document.getElementById('perbox').value;
    var z = document.getElementById('tquantity').value;
    var a = x/y;
    document.getElementById('priceperbottle').value = a;
    document.getElementById('tamount').value = z*a;

    
  }

  function submitForm(button) {
    if(button == 'add')
    {
        document.form.action ="save.php";
        
    }
    else if(button == 'edit'){
        document.form.action ="update.php";
  
    }   
  document.forms['form'].submit();
  }

  </script>

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

<div class="container">

      <div class="card">
      <div class="card-header bg-primary"><center><font size='5' color="white">Stocks</font></center></div>
      <div class="card-body">
        <form name="form" id="add"  method="post" enctype="multipart/form-data">

            <br/><br/></br>
            <div class= "row">
              <div class="col-lg-4">
              <label for="inputUserName">Date</label>
              <input <?php echo $readonly; ?> value="<?=$day?>"  id='day' class="form-control"  type="text" name='day'/>
              </div>
              <div class="col-lg-4">
              <label for="inputUserName">Item</label>
              <input <?php echo $readonly; ?> value="<?=$item?>"  class="form-control"  type="text" name='item'/>
              </div>
              <div class="col-lg-4">
              <label for="inputUserName">Boxes</label>
              <input id="boxes" oninput="compute()" <?php echo $readonly; ?> value="<?=$boxes?>"  class="form-control"  type="text" name='boxes'/>
              </div>
            </div>
            <br/>

            <div class= "row">
              <div class="col-lg-4">
              <label for="inputUserName">Quantity Per Box</label>
              <input id="perbox" oninput="compute()" <?php echo $readonly; ?> value="<?=$perbox?>"  class="form-control"  type="text" name='perbox'/>
              </div>
              <div class="col-lg-4">
                <label for="inputUserName">Price Per Box</label>
                <input id="priceperbox" oninput="compute()" <?php echo $readonly; ?> value="<?=$priceperbox?>"  class="form-control"  type="text" name='priceperbox'/>
              </div>
              <div class="col-lg-4">
              <label for="inputUserName">Total Quantity</label>
              <input id="tquantity" readonly value="<?=$tquantity?>"  class="form-control"  type="text" name='tquantity'/>
              </div>
            </div>

            <br/>
            <div class= "row">
              <div class="col-lg-4">
              <label for="inputUserName">Price Per Bottle</label>
              <input id="priceperbottle" readonly value="<?=$priceperbottle?>"  class="form-control"  type="text" name='priceperbottle'/>
              </div>
              <div class="col-lg-4 ">
                <label for="inputUserName">Total Amount</label>
                <input  id = "tamount" readonly value="<?=$tamount?>"  class="form-control"  type="text" name='tamount'/>
              </div>
            </div>

            <br/>

            

            <?php 
            if(isset($_SESSION['enroll'])){
            $_SESSION['enroll']=false;
            }

            echo showButtonSave($mode); ?>
            
            <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header bg-primary" style="padding:10px 20px;">
                    Asking
                    <button type="button" class="close" data-dismiss="modal">&times;</button>                    
                  </div>
                  <div class="modal-body" style="padding:40px 50px;">
                    
                    Are you sure you want to save?<br/><br/>
                    <div class='right'>
                    <button  onclick=submitForm('<?php echo $mode; ?>')  class='btn btn-primary' title='Save' src='../img/save_add.png' type = 'image' id='save' name=\"save\">Save</button>
                    <button class='btn btn-primary' title='Cancel' src='../img/cancel.png' type = 'image' id='cancel' name=\"cancel\" data-dismiss="modal">Cancel</button>
                    </div>
                
                  </div>
                </div>
              </div>
            </div>
        </form>
      </div> 
      <div class="card-footer"><center>Divergent Concepts Marketing</center></div>
      </div>
    </div>

    <script>
      $(document).ready(function(){
          $("#save").click(function(){
              $("#myModal").modal();
          });
      });
      </script>