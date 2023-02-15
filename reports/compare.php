<?php
include "../module/header.php";
include "../module/connect_database.php";

$sql = "SELECT distinct item from sales";
$result = $conn->query($sql);


?>

<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    title: {
        text: "Product Sales Comparison"
    },
    data: [{
        type: "pie",
        startAngle: 240,
        indexLabel: "{label} {y}",
        indexLabelFontSize: 26,
        dataPoints: [

            <?php
            while ($row = $result->fetch_assoc()) {
                $item = $row['item'];
                $sql2 = "SELECT sum(bottle) as sum from sales where item='$item'";

                $result2 = $conn2->query($sql2);
                $row2 =$result2->fetch_assoc();
                
                ?>
                {y: <?=$row2['sum'];?>, label: <?php echo "\"".$item."\"";?>},
            <?php

            }
            ?>
            
        ]
    }]
});
chart.render();

}
</script>
</head>
<body>
<br/><br/>
<center><div id="chartContainer" style="height: 370px; width: 50%;"></div></center>
<script src="../plugins/canvasjs.min.js"></script>
</body>
</html>
