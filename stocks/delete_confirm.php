<?php

include "../module/header.php";
include "../module/connect_database.php";
include "../module/function.php";
$delete=$_REQUEST['delete'];
$_SESSION['delete']=$delete;

?>

  <script>
  function submitForm(button) {
    if(button == 'yes')
    {
         window.location.href='delete.php';
        
    }
    else if(button == 'cancel'){
         window.location.href='list.php';
  
    }   
  document.forms['form'].submit();
  }



  </script>


            
            
            <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header bg-primary" style="padding:10px 20px;">
                    Asking
                    <button type="button" class="close" data-dismiss="modal">&times;</button>                    
                  </div>
                  <div class="modal-body" style="padding:40px 50px;">
                    
                    Are you sure you want to delete?<br/><br/>
                    <div class='right'>
                    <button  onclick=submitForm('yes')  class='btn btn-primary' title='Save' src='../img/save_add.png' type = 'image' id='save' name=\"save\">Delete</button>
                    <button onclick=submitForm('cancel') class='btn btn-primary' title='Cancel' src='../img/cancel.png' type = 'image' id='cancel' name=\"cancel\" >Cancel</button>
                    </div>
                
                  </div>
                </div>
              </div>
            </div>
       
      <script>
      $(document).ready(function(){
              $("#myModal").modal();
      });

      </script>


       



