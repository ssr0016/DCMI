<?php
include "../module/header.php";
include "../module/connect_database.php";
$january = 0;
$february = 0;
$march = 0;
$april = 0;
$may = 0;
$june = 0;
$july = 0;
$august = 0;
$september = 0;
$october = 0;
$november = 0;
$december = 0;

$sql = "SELECT * from sales where month = '01'";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $january= $january + $row['income'];
}

$sql = "SELECT * from sales where month = '02'";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $february= $february + $row['income'];
}

$sql = "SELECT * from sales where month = '03'";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $march= $march + $row['income'];
}

$sql = "SELECT * from sales where month = '04'";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $april= $april + $row['income'];
}

$sql = "SELECT * from sales where month = '05'";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $may= $may + $row['income'];
}

$sql = "SELECT * from sales where month = '06'";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $june= $june + $row['income'];
}

$sql = "SELECT * from sales where month = '07'";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $july= $july + $row['income'];
}

$sql = "SELECT * from sales where month = '08'";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $august= $august + $row['income'];
}

$sql = "SELECT * from sales where month = '09'";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $september= $september + $row['income'];
}

$sql = "SELECT * from sales where month = '10'";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $october= $october + $row['income'];
}

$sql = "SELECT * from sales where month = '11'";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $november= $november + $row['income'];
}

$sql = "SELECT * from sales where month = '12'";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $december= $december + $row['income'];
}

?>




<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    theme: "light2", // "light1", "light2", "dark1", "dark2"
    title:{
        text: "Net Income"
    },
    axisY: {
        title: "Bottles"
    },
    data: [{        
        type: "column",  
        showInLegend: true, 
        legendMarkerColor: "grey",
        legendText: "Monthly",
        dataPoints: [      
            { y: <?=$january?>, label: "January" },
            { y: <?=$february?>,  label: "February" },
            { y: <?=$march?>,  label: "March" },
            { y: <?=$april?>,  label: "April" },
            { y: <?=$may?>,  label: "May" },
            { y: <?=$june?>, label: "June" },
            { y: <?=$july?>,  label: "July" },
            { y: <?=$august?>,  label: "August" },
            { y: <?=$september?>,  label: "September" },
            { y: <?=$october?>,  label: "October" },
            { y: <?=$november?>,  label: "November" },
            { y: <?=$december?>,  label: "December" }
        ]
    }]
});
chart.render();

}
</script>
</head>
<body>
    <br/><br/><br/>
<center><div id="chartContainer" style="height: 370px; width: 60%;"></div></center>
<script src="../plugins/canvasjs.min.js"></script>
</body>
</html>