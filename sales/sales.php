<?php
include "../module/header.php";
include "../module/connect_database.php";
include "../module/function.php";

if (!isset($_REQUEST['edit']) && !isset($_REQUEST['info']) && !isset($_SESSION['id']))
  {
       $sql = "SELECT * from sales where id = -1";
       $mode = "add";
       $readonly = "";
       $disabled = "";
       $clickable = "onclick='return false;'";
       $disabled2 = "";
       $generate = "disabled";
       $readonly2 = "";
     if($_SESSION['user']==""){
    header("Location: ../login/login.php");
    }
  }
  elseif(isset($_REQUEST['info'])){
    $mode = "view";
    $_SESSION['id']=$_REQUEST['info'];
    $id = $_SESSION['id'];
    $sql = "SELECT * from sales where id = $id";
    $readonly = "readonly";
    $disabled = "disabled";
    $disabled2 = "disabled";
    $clickable = "";
  }

  elseif(isset($_REQUEST['edit'])){
    $mode = "edit";
    $_SESSION['id']=$_REQUEST['edit'];
    $id = $_SESSION['id'];
    $sql = "SELECT * from sales where id = $id";
    $readonly = "readonly";
    $readonly2 = "";
    $disabled = "disabled";
    $disabled2 = "";
    $clickable = "";
  }

  else{
    $mode = "edit";
    $id = $_SESSION['id'];
    $sql = "SELECT * from sales where id = $id";
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
  $day = $row['day'];
  $bottle = $row['bottle'];
  $ppbottle = $row['ppbottle'];
  $tamount = $row['tamount'];
  $soldto = $row['soldto'];
  $platform = $row['platform'];
  $address = $row['address'];
  $area = $row['area'];
  $contact_no = $row['contact_no'];


}
else{
  $item = "";
  $day = "";
  $bottle = "";
  $ppbottle = "";
  $tamount = "";
  $soldto = "";
  $platform = "";
  $address = "";
  $area = "";
  $contact_no = "";
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
    var a = document.getElementById('bottle').value;
    var b = document.getElementById('ppbottle').value;
    document.getElementById('tamount').value = (a*b); 
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
      <div class="card-header bg-primary"><center><font size='5' color="white">Sales</font></center></div>
      <div class="card-body">
        <form name="form" id="add"  method="post" enctype="multipart/form-data">

            <br/><br/></br>
            <div class= "row">
              <div class="col-lg-4">
              <label for="inputUserName">Date</label>
              <input <?php echo $readonly; ?> value="<?=$day?>"  id='day' class="form-control"  type="text" name='day'/>
              </div>
              <div class="col-lg-4 ">
                <label for="inputUserName">Item</label>
                <select id="item"  <?php echo $disabled; ?> class="form-control" name='item'>
                  <option  value="<?=$item?>"><?=$item?></option>
                  <?php
                    $sql = "SELECT distinct item from stocks";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {

                    ?>
                    <option  value="<?=$row['item']?>"><?=$row['item']?></option>                        
                    <?php
                    }
                  ?>
                  </select>
              </div>
              <div class="col-lg-4">
              <label for="inputUserName">Bottles</label>
              <input id = "bottle" oninput="compute()" <?php echo $readonly; ?> value="<?=$bottle?>"  class="form-control"  type="text" name='bottle'/>
              </div>
            </div>
            <br/>

            <div class= "row">
              
              <div class="col-lg-4">
                <label for="inputUserName">Price per Bottle</label>
                <input id="ppbottle" oninput="compute()" <?php echo $readonly; ?> value="<?=$ppbottle?>"  class="form-control"  type="text" name='ppbottle'/>
              </div>
              <div class="col-lg-4 ">
                <label for="inputUserName">Sold To</label>
                <input <?php echo $readonly; ?> value="<?=$soldto?>"  class="form-control"  type="text" name='soldto'/>
              </div> 
              <div class="col-lg-4 ">
                <label for="inputUserName">Platform</label>
                <select id="platform"  <?php echo $disabled2; ?> class="form-control" name='platform'>
                  <option  value="<?=$platform?>"><?=$platform?></option>
                    <option  value="LAZADA">LAZADA</option>
                    <option  value="SHOPEE">SHOPEE</option>
                    <option  value="WALK-IN">WALK-IN</option>
                    <option  value="WHOLESALER">WHOLESALER</option>                           
                  </select>
              </div>
            </div>

            <br/>

            <div class= "row">
              <div class="col-lg-4">
              <label for="inputUserName">Address</label>
              <input  <?php echo $readonly2; ?> value="<?=$address?>"  class="form-control"  type="text" name='address'/>
              </div>
              <div class="col-lg-4 ">
                <label for="inputUserName">Area</label>
              <select id="area"  <?php echo $disabled2; ?> class="form-control" name='area'>
                  <option  value="<?=$area?>"><?=$area?></option>
                    <option  value="LUZON">LUZON</option>
                    <option  value="VISAYAS">VISAYAS</option>
                    <option  value="MINDANAO">MINDANAO</option>  
                    <option  value="NCR">NCR</option>                        
                  </select>
              </div>
              <div class="col-lg-4">
              <label for="inputUserName">Contact Number</label>
              <input id="contact_no" $readonly; value="<?=$contact_no?>"  class="form-control"  type="text" name='contact_no'/>
              </div>
            </div>

            <br/>

            <div class= "row">
              <div class="col-lg-4">
              <label for="inputUserName">Total Amount</label>
              <input id="tamount" readonly value="<?=$tamount?>"  class="form-control"  type="text" name='tamount'/>
              </div>
            </div>

            <br/>

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