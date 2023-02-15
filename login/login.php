<?php
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Divergent Concepts Marketing Inc.</title>
<link rel="shortcut icon" type="image/x-icon" href="../icons/logo.jpg" />
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<script src="../plugins/pro_dropdown_2/stuHover.js" type="text/javascript"></script>
<link rel="stylesheet" href="../bootstrap-4.1.1/dist/css/bootstrap.min.css">
<script src="../bootstrap-4.1.1/dist/js/bootstrap.min.js"></script>

</head> 


<body>
	<br/><br/><br/><br/><br/><br/>
	<div class="card" style="width:400px;margin:0 auto;float:none;margin-bottom:10px">
        <div class="card bg-primary text-white">
        <div class="card-header"><b>Log In</b></div>
        </div>  
            <div class="container">
                <div class="row">
                    <div class="col-lg-1">
                    </div>
                    <div class="col-lg-10">
                        <br/>

                        <form name="add" id="add" action="login_check.php" method="post">
                        	<?php
                        	if(isset($_SESSION['login_error']) && $_SESSION['login_error'] == 'updated'){
					            echo "<font color = 'red'>Updated Password. Try to Login again using your new password.</font> </br></br>";
					            $_SESSION['login_error'] = '';
					        }
                            else if(isset($_SESSION['login_error']) && $_SESSION['login_error'] == 'true2'){
                                echo "<font color = 'red'>Invalid Username or Password.</font> </br></br>";
                                $_SESSION['login_error'] == 'false';
                            }
					        ?>
                            <div class= "form-group">
                                <label for="inputUserName">Username</label>
                                <input  class="form-control" placeholder="Username" type="text" name='username'/>
                            </div>

                            <div class= "form-group">
                                <label for="inputPassword">Password</label>
                                <input class="form-control"  placeholder="Password" type="password" name='password'/>
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