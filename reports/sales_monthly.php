<?php
include "../module/header.php";
include "../module/connect_database.php";

$sql2 = "SELECT distinct item from sales";
$result2 = $conn2->query($sql2);


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
        text: "Sales"
    },
    axisY: {
        title: "Bottles"
    },
    data: [

    <?php
            while ($row2 = $result2->fetch_assoc()) {
                $item = $row2['item'];
                $sql = "SELECT * from sales where month = '01' and item='$item'";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    $january= $january + $row['bottle'];
                }

                $sql = "SELECT * from sales where month = '02' and item='$item'";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    $february= $february + $row['bottle'];
                }

                $sql = "SELECT * from sales where month = '03' and item='$item'";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    $march= $march + $row['bottle'];
                }

                $sql = "SELECT * from sales where month = '04' and item='$item'";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    $april= $april + $row['bottle'];
                }

                $sql = "SELECT * from sales where month = '05' and item='$item'";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    $may= $may + $row['bottle'];
                }

                $sql = "SELECT * from sales where month = '06' and item='$item'";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    $june= $june + $row['bottle'];
                }

                $sql = "SELECT * from sales where month = '07' and item='$item'";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    $july= $july + $row['bottle'];
                }

                $sql = "SELECT * from sales where month = '08' and item='$item'";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    $august= $august + $row['bottle'];
                }

                $sql = "SELECT * from sales where month = '09' and item='$item'";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    $september= $september + $row['bottle'];
                }

                $sql = "SELECT * from sales where month = '10' and item='$item'";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    $october= $october + $row['bottle'];
                }

                $sql = "SELECT * from sales where month = '11' and item='$item'";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    $november= $november + $row['bottle'];
                }

                $sql = "SELECT * from sales where month = '12' and item='$item'";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    $december= $december + $row['bottle'];
                }
    ?>
    {        
        type: "column",  
        showInLegend: true, 
        legendText: <?php echo "\"".$item."\"";?>,
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
    },

    <?php
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
    }
    ?>

]
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