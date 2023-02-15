<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<?php
include "../module/header.php";
?>
<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Hino</title>

<link rel="stylesheet" type="text/css" href="../css/style.css" />
<script src="../plugins/pro_dropdown_2/stuHover.js" type="text/javascript"></script>
<link rel="stylesheet" href="../bootstrap-4.1.1/dist/css/bootstrap.min.css">
<script src="../bootstrap-4.1.1/dist/js/bootstrap.min.js"></script>

</head> 

<body>
	<br/>
	<div class="card" style="width:400px;margin:0 auto;float:none;">
        <div class="card bg-primary text-white">
        <div class="card-header"><b>Change Password</b></div>
        </div>  
            <div class="container">
                <div class="row">
                    <div class="col-lg-1">
                    </div>
                    <div class="col-lg-10">
                        <br/>

                        <form name="add" id="add" action="update.php" method="post">
                        	<?php
                        	if(isset($_SESSION['login_error']) && $_SESSION['login_error'] == "user"){
                                echo "<font color = 'red'>Invalid Username or Password</font> </br></br>";
                                $_SESSION['login_error'] = "";
                            }
                            if(isset($_SESSION['login_error']) && $_SESSION['login_error'] == "confirmation"){
                                echo "<font color = 'red'>Confirmation Password Problem!</font> </br></br>";
                                $_SESSION['login_error'] = "";
                            }
					        ?>
                            <div class= "form-group">
                                <label for="inputUserName">Username</label>
                                <input  class="form-control"  type="text" name='username'/>
                            </div>

                            <div class= "form-group">
                                <label for="inputPassword">Current Password</label>
                                <input class="form-control"   type="password" name='password'/>
                            </div>

                            <div class= "form-group">
                                <label for="inputPassword">New Password</label>
                                <input class="form-control"   type="password" name='newpassword'/>
                            </div>

                            <div class= "form-group">
                                <label for="inputPassword">Confirm Password</label>
                                <input class="form-control"   type="password" name='confirmpassword'/>
                            </div>
                            <center>
                            <button style="margin-bottom:20px" type="submit" class="btn btn-primary">Login</button>
                            </center>
                        </form>
                    </div>
                    <div class="col-lg-1">
                    </div>
                </div>
            </div>
       
    </div>
</body>
</html>