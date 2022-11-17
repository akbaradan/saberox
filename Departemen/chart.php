<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		fontFamily: "arial black",
		fontColor: "#695A42"
	},
	axisX: {
		interval: 1,
		intervalType: "year"
	},
	axisY:{
		gridColor: "#B6B1A8",
		tickColor: "#B6B1A8"
	},
	toolTip: {
		shared: true,
		content: toolTipContent
	},
	data: [{
		type: "stackedColumn",
		showInLegend: true,
		color: "#FFFF00",
		name: "Mahasiswa Cuti",
		dataPoints: [
			{ y: 17, x: new Date(2016,0) },
			{ y: 19, x: new Date(2017,0) },
			{ y: 11, x: new Date(2018,0) },
			{ y: 10, x: new Date(2019,0) },
			{ y: 7, x: new Date(2020,0) },
			{ y: 2, x: new Date(2021,0) },
			{ y: 3, x: new Date(2022,0) }
		]
		},
		{        
			type: "stackedColumn",
			showInLegend: true,
			name: "Mahasiswa Aktif",
			color: "#FF0000",
			dataPoints: [
				{ y: 64, x: new Date(2016,0) },
				{ y: 105, x: new Date(2017,0) },
				{ y: 158, x: new Date(2018,0) },
				{ y: 225, x: new Date(2019,0) },
				{ y: 311, x: new Date(2020,0) },
				{ y: 301, x: new Date(2021,0) },
				{ y: 277, x: new Date(2022,0) }
			]
		}]
});
chart.render();

function toolTipContent(e) {
	var str = "";
	var total = 0;
	var str2, str3;
	for (var i = 0; i < e.entries.length; i++){
		var  str1 = "<span style= \"color:"+e.entries[i].dataSeries.color + "\"> "+e.entries[i].dataSeries.name+"</span>: <strong>"+e.entries[i].dataPoint.y+"</strong><br/>";
		total = e.entries[i].dataPoint.y + total;
		str = str.concat(str1);
	}
	str2 = "<span style = \"color:DodgerBlue;\"><strong>"+(e.entries[0].dataPoint.x).getFullYear()+"</strong></span><br/>";
	total = Math.round(total * 100) / 100;
	str3 = "<span style = \"color:Tomato\">Total:</span><strong> "+total+"</strong><br/>";
	return (str2.concat(str)).concat(str3);
}

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>