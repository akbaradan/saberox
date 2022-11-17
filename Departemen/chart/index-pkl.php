<!doctype html public "-//w3c//dtd html 3.2//en">
<html>
<head>
</head>
<body >
<?Php
require "config-pdo.php";// Database connection
$query="SELECT mahasiswa.angkatan,
SUM(CASE WHEN pkl.status_pkl = 'Lulus' THEN 1 ELSE 0 END) AS total_lulus,
SUM(CASE WHEN pkl.status_pkl = 'Belum Lulus' THEN 1 ELSE 0 END) AS total_belum_lulus,
SUM(CASE WHEN pkl.status_pkl = 'Belum PKL' THEN 1 ELSE 0 END) AS total_belum_pkl
FROM mahasiswa INNER JOIN pkl ON mahasiswa.NIM = pkl.nim_mhs GROUP BY mahasiswa.angkatan";
$step=$dbo->prepare($query);
if($step->execute()){
$php_data_array=$step->fetchAll();
//print_r($php_data_array);
echo "<script>
var my_2d=".json_encode($php_data_array)."
</script>";
}
?>
<div id='chart_div'></div>
<script type="text/javascript"
  src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current',{packages:['corechart','bar']});
google.charts.setOnLoadCallback(draw_my_chart)
function draw_my_chart(){
var data=new google.visualization.DataTable();
data.addColumn('string','Angkatan');
data.addColumn('number','Lulus');
data.addColumn('number','Belum Lulus');
data.addColumn('number','Belum PKL');
for(i=0;i<my_2d.length;i++)
data.addRow([my_2d[i][0],parseInt(my_2d[i][1]),parseInt(my_2d[i][2]),parseInt(my_2d[i][3])]);
var options = {
   hAxis: {title: 'Angkatan',  titleTextStyle: {color: '#333'}},
   vAxis: {title: 'Jumlah Mahaiswa', minValue: 0},
height:400,
width:880,
isStacked:false,
legend:{position:'top'},
  animation:{
	   'startup':true,
        duration: 1000,
        easing: 'out',
      },
};
var chart= new  google.visualization.ColumnChart(document.getElementById('chart_div'));
chart.draw(data,options)
}
</script>
</body></html>
