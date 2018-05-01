<!DOCTYPE html>
<html>
<head>  
    <title>AmbiLamp</title>
    <link rel="stylesheet" type="text/css " href="assets/css/details.css">  
    
</head>

<body>

<?php
	include "header.php";

	/*Connect to the DB*/
	$db = connectMongo();
	$sounds = $db->sound;
	$temperatures = $db->temp;
	$soundCursor = $sounds->find()->sort(array('entry'=> -1))->limit(24);
	$temperatureCursor = $temperatures->find()->sort(array('entry'=> -1))->limit(24);

	$temperatureX = "[";
	$temperatureData = "[";
	foreach ($temperatureCursor as $doc){
		$time = split('[ ]', $doc['time']);
		$temperatureX = $temperatureX . "'" . $time[1] . "',";
		$temperatureData = $temperatureData . $doc['val'] . ",";
	}
	
	$temperatureX = trim($temperatureX, ",");
	$temperatureX = $temperatureX . "]";

	$temperatureData = trim($temperatureData, ",");
	$temperatureData = $temperatureData . "]";

	echo "<script>";
	echo "var temperatureData = " . $temperatureData . ";";
	echo "var temperatureX = " . $temperatureX . ";";
	echo "</script>";

	$soundX = "[";
	$soundData = "[";
	foreach ($soundCursor as $doc){
		$sound = split('[ ]', $doc['time']);
		$soundX = $soundX . "'" . $sound[1] . "',";
		$soundData = $soundData . $doc['audio'] . ",";
	}
	
	$soundX = trim($soundX, ",");
	$soundX = $soundX . "]";

	$soundData = trim($soundData, ",");
	$soundData = $soundData . "]";

	echo "<script>";
	echo "var soundData = " . $soundData . ";";
	echo "var soundX  = " . $soundX . ";";
	echo "</script>";
?>

<!-- BUTTONS AND CANVASES -->
<input type="button" id="temp-btn" class="btn" value="View Temperature Chart" onclick="drawTemp()">
<canvas id="temp-chart-long" class="chart" width="900" height="350" hidden></canvas>
<input type="button" id="sound-btn" class="btn" value="View Sound Chart" onclick="drawSound()">
<canvas id="sound-chart-long" class="chart" width="900" height="350" hidden></canvas>

<!-- TABLES -->
<div id="tables-container">
    <div class="table">
        <table id="temp-table">
            <tr>
                <th>Time</th>
                <th>Temperature</th>
	    </tr>
		<?php 
		
			foreach ($temperatureCursor as $doc){
				$date = new DateTime($doc['time']);
				echo "<tr>";
					echo "<td>".($date->format('M d Y'))."<pre style='display: inline;'>&#9;</pre>".($date->format(' H:i:s'))."</td>";
					echo "<td>".floor($doc['val'])."&deg F </td>";
				echo "</tr>";
			}

		?>

        </table>
    </div>
    <div class="table">
        <table id="sound-table">
            <tr>
                <th>Time</th>
                <th>Sound</th>
	    </tr>
		<?php 
		
			foreach ($soundCursor as $doc){
				echo "<tr>";
					echo "<td>".$doc['time']."</td>";
					echo "<td>".floor($doc['audio']/1023*100)."%</td>";
				echo "</tr>";
			}

		?>

        </table>
    </div>
</div>


<script type="text/javascript" src="assets/js/details.js"></script>
</body>
</html>

