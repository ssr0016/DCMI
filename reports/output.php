<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    theme: "light2", // "light1", "light2", "dark1", "dark2"
    title:{
        text: "Top Oil Reserves"
    },
    axisY: {
        title: "Reserves(MMbbl)"
    },
    data: [{        
        type: "column",  
        showInLegend: true, 
        legendMarkerColor: "grey",
        legendText: "MMbbl = one million barrels",
        dataPoints: [      
            { y: 10, label: "Venezuela" },
            { y: 20,  label: "Saudi" },
            { y: 0,  label: "Canada" },
            { y: 0,  label: "Iran" },
            { y: 0,  label: "Iraq" },
            { y: 0, label: "Kuwait" },
            { y: 0,  label: "UAE" },
            { y: 0,  label: "Russia" }
        ]
    }]
});
chart.render();

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="../plugins/canvasjs.min.js"></script>
</body>
</html>