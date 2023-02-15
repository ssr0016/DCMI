<?php
session_start();
if(!isset($_SESSION['user'])){
	header("Location: ../login/login.php");
}
if($_SESSION['user']=='Administrator'){
	$user = 'Administrator';
}
else if($_SESSION['user']=='DCMI Staff'){
	$user = 'DCMI Staff';
}
else{
	$user = 'Guest';
}
?>
<html>
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Divergent Concepts Marketing Inc.</title>
<link rel="shortcut icon" type="image/x-icon" href="../icons/logo.jpg" />
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<link rel="stylesheet" href="../bootstrap-4.1.1/dist/css/bootstrap.min.css">
<script src="../bootstrap-4.1.1/dist/js/bootstrap.min.js"></script>
<script src="../bootstrap-4.1.1/assets/js/vendor/jquery.min.js"></script>
<script src="../bootstrap-4.1.1/assets/js/vendor/popper.min.js"></script>
<script src="../bootstrap-4.1.1/dist/js/bootstrap.js"></script>


<!--style for hover menu-->
<style>
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    border-radius:5px;
}
.dropdown-content {
    display: none;
    position: absolute;
    border-radius:5px;
    background-color: #ffffff;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}
.dropdown-content a:hover {background-color: #ddd}
.dropdown:hover .dropdown-content {
    display: block;
}

#navbardrop:hover {
    background-color: #4CAF50;/* or 3e8e41 */
    border-radius:8px;
}
</style>
</head> 

<body>


<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
	<!-- Brand -->
	<a class="navbar-brand" href="../login/home.php"><img style='height:50px;' src='../icons/logo.jpg'/></a>

	<!-- Links -->
	<ul class="navbar-nav navbar-collapse">
		<li class="nav-item dropdown" style='margin-right:15px'>
		<a class="nav-link text-white dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
		<img style='width:30px;height:30px' src="../icons/report.png"/>Sales
		</a>
		<div class="dropdown-content">
		<?php
		if(isset($_SESSION['user'])){
            if($_SESSION['user']!="guest"){
		echo "<a class=\"dropdown-item\" href=\"../sales/add_unset.php\"><img style='margin-right:5px;width:20px;height:20px' src=\"../icons/add.png\"/>Add New</a>";
		}}
		?>
		<a class="dropdown-item" href="../sales/list.php"><img style='margin-right:5px;width:20px;height:20px' src="../icons/list.png"/>View List</a>
		<a class="dropdown-item" href="../sales/daily_list.php"><img style='margin-right:5px;width:20px;height:20px' src="../icons/bottle.png"/>Daily Sales</a>
		</div>
		</li>

		<li class="nav-item dropdown" style='margin-right:15px'>
		<a class="nav-link text-white dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
		<img style='width:30px;height:30px' src="../icons/boxes.png"/>Stocks
		</a>
		<div class="dropdown-content">
		<?php
		if(isset($_SESSION['user'])){
            if($_SESSION['user']!="guest" && $_SESSION['user']!="DCMI Staff" ){
		echo "<a class=\"dropdown-item\" href=\"../stocks/add_unset.php\"><img style='margin-right:5px;width:20px;height:20px' src=\"../icons/add.png\"/>Add New</a>";
		
		}}
		echo "<a class=\"dropdown-item\" href=\"../stocks/list.php\"><img style='margin-right:5px;width:20px;height:20px' src=\"../icons/list.png\"/>View List</a>";
		?>
		</div>
		</li>

		<li class="nav-item dropdown" style='margin-right:15px'>
		<a class="nav-link text-white dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
		<img style='width:30px;height:30px' src="../icons/chart.png"/>Reports
		</a>
		<div class="dropdown-content">
		<?php
		if(isset($_SESSION['user'])){
            if($_SESSION['user']!="guest"){
            	?>
		<div class="btn-group dropright">
			<a class=" dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<img style='margin-right:5px;width:20px;height:20px' src="../icons/peso.png"/>Sales
			</a>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="../reports/sales_daily.php"><img style='margin-right:5px;width:20px;height:20px' src="../icons/daily.png"/>Daily</a>
				<a class="dropdown-item" href="../reports/sales_monthly.php"><img style='margin-right:5px;width:20px;height:20px' src="../icons/monthly.png"/>Monthly</a>
			</div>
		</div>
		<a class="dropdown-item" href="../reports/stocks.php"><img style='margin-right:5px;width:20px;height:20px' src="../icons/boxes.png"/>Stocks</a>
		<a class="dropdown-item" href="../reports/income.php"><img style='margin-right:5px;width:20px;height:20px' src="../icons/cash.png"/>Income</a>
		<a class="dropdown-item" href="../reports/compare.php"><img style='margin-right:5px;width:20px;height:20px' src="../icons/compare.png"/>Comparison</a>
		<?php
			}
		}
		?>
		</div>
		</li>

		

	<!-- Dropdown -->
		<?php
		if(isset($_SESSION['user'])){
            if($_SESSION['user']!="guest"){
		echo "<li class=\"nav-item dropdown\" style='margin-right:15px'>
		<a class=\"nav-link text-white dropdown-toggle\" href=\"#\" id=\"navbardrop\" data-toggle=\"dropdown\">
		<img style='width:30px;height:30px' src=\"../icons/setting.png\"/>Settings
		</a>
		<div class=\"dropdown-content\">
		<a class=\"dropdown-item\" href=\"../settings/password.php\"><img style='margin-right:5px;width:20px;height:20px' src=\"../icons/password.png\"/>Change Password</a>
		</div>
		</li>";
		}}?>

		<li id='navbardrop' class="nav-item">
          <a class="nav-link text-white" href="../login/logout.php"><img style='width:30px;height:30px;margin-right:2px' src="../icons/logout.png"/>Log Out</a>
        </li>
	</ul>
	<font color='white'><img src='../icons/user.png' style='width:30px;height:30px'>Welcome <?php echo $user; ?></font>
</nav>
<br>


</body>
</html>
