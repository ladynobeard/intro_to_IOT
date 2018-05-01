
<!DOCTYPE html>
<html>
<head>
	<title>AmbiLamp</title>
	<link rel="stylesheet" type="text/css" href="assets/css/index.css"> 
	<script src="assets/js/jscolor.js"></script>
</head>
<body>

<?php

	include "GPIO.php";
	include "header.php";

	 //Begin Color 
	$default_color = "EFFFC9";
	$db = connectMongo();

	$color_data = $db->color;
	$sounds = $db->sound;
	$temperatures = $db->temp;

	$cursorColor = $color_data->find()->sort(array('entry' => -1))->limit(1);
	$soundCursor = $sounds->find()->sort(array('entry'=> -1))->limit(24);
	$temperatureCursor = $temperatures->find()->sort(array('entry'=> -1))->limit(24);

	if (isset($_POST['set_default'])){	
		$num_entries = $color_data->count();
		$color_dict = array('color' => $_POST['color'], 'entry' => $num_entries + 1);
		$color_data->insert($color_dict);
	}
       	
	foreach($cursorColor as $doc){
		$default_color = $doc['color'];	
	}

	if (isset($_POST['set_color'])){
		$default_color = $_POST['color'];
	}

	/* BEGIN LED CODE */
	$red = new GPIO(22, "out",4);
	$green = new GPIO(27, "out",3);
	$blue = new GPIO(17, "out",1);
	$colorArray = $default_color.str_split();

	$red->pwm_write(hexdec($colorArray[0].$colorArray[1]));
	$green->pwm_write(hexdec($colorArray[2].$colorArray[3]));
	$blue->pwm_write(hexdec($colorArray[4].$colorArray[5]));
	/* END LED CODE */

	/* BEGIN SOUND DATA PARSING*/

	// pre-fill arrays with 0
	$hourSums = array_fill(0,24,0);
	$hourCounts = array_fill(0,24,0);

	//Create sums for the readings from each hour, and
	//the number of readings for that hour
	foreach ($soundCursor as $doc){
		$time = (int)split('[- :]', $doc['time'])[3]; //get the hour of the date in 24-hour
		$hourCounts[$time] = $hourCounts[$time] + 1;
		$hourSums[$time] = $hourSums[$time] + $doc['audio'];
		echo $time.'<br>';
	}

	//parse these arrays to create arrays of averages by hour
	$soundMin = 1000;
	$soundMax = 0;
	$soundDataDay = '[';
	$soundDataNight = '[';

	for($i = 0; $i < 24; $i = $i + 1){
		$hourSums[$i] = $hourSums[$i]/$hourCounts[$i]; // calculates average

		if ((float)$hourSums[$i] > $soundMax){
			$soundMax = (float)$hourSums[$i]; // update max value
		}
		
		if ((float)$hourSums[$i] < $soundMin){
			$soundMin = (float)$hourSums[$i]; // update min value
		}

		//determine whether to add the value to daytime array
		//or nighttime array

		echo $hourSums[$i].'<br>';
		if ($i < 12){
			$soundDataDay = $soundDataDay . (float)$hourSums[$i] . ",";
		}
		else {
			$soundDataNight = $soundDataNight . (float)$hourSums[$i] . ",";
		}
	}

	echo $soundDataDay.'<br>';
	echo $soundDataNight.'<br>';

	$soundMax = trim($soundMax, ",");
	$soundMax = $soundMax;

	$soundMin = trim($soundMin, ",");
	$soundMin = $soundMin;
	
	echo "<script>";
	echo "var soundMax = " . $soundMax . ";";
	echo "var soundMin  = " . $soundMin . ";";
	echo "</script>";

	$soundDataDay = trim($soundDataDay, ",");
	$soundDataDay = $soundDataDay . "]";

	$soundDataNight = trim($soundDataNight, ",");
	$soundDataNight = $soundDataNight . "]";
	
	echo "<script>";
	echo "var soundDataDay = " . $soundDataDay . ";";
	echo "var soundDataNight  = " . $soundDataNight . ";";
	echo "</script>";


/* END SOUND DATA PARSING*/
?>

<!-- JSCOLOR PICKER -->
<input type="button" class="jscolor" id="picker" onchange="update(this.jscolor)" onfocusout="apply()" value=<?php echo "'".$default_color."'"; ?>>

<!-- FORM -->
<form method="POST">
	<input type="text" id="color" name="color">
	<input type="submit" id="smt" name="set_color" hidden>
	<input type="submit" value="Set as Default" id="set_default" name="set_default">
</form>

<!-- CHARTS -->
<div id="charts-container">
	<canvas id="temp-chart" class="chart" height="350" width="550"></canvas>
	<canvas id="sound-chart" class="chart" height="350" width="550"></canvas>
</div>

<!-- ABOUT -->
<div id="about">
<h1>About</h1>
<p>    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas finibus eros tristique egestas consectetur. Proin vitae sem porta, dignissim ex ac, gravida dui. Donec dignissim, arcu a porttitor pulvinar, ipsum ante laoreet nulla, mollis cursus nisl nisi vel mi. Proin sit amet magna mollis, consequat tellus at, suscipit nibh. Curabitur accumsan vehicula dui, sit amet tempor eros mollis at. Donec a faucibus sapien, eu scelerisque turpis. Duis non enim tortor. Quisque facilisis vehicula enim id lobortis. Integer sit amet est imperdiet, vestibulum magna id, porttitor orci. Maecenas efficitur consequat luctus.
</p>
<p>
Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris porttitor libero risus, at venenatis eros facilisis sed. Aenean luctus tempus ante quis lacinia. Pellentesque sollicitudin, lectus eget viverra mollis, dui metus lobortis felis, quis faucibus ligula leo id arcu. Maecenas blandit dolor sit amet mauris congue congue. Sed ligula purus, vestibulum eget gravida vitae, elementum et turpis. Cras a placerat urna, iaculis aliquam nulla. Quisque accumsan eleifend leo, consectetur venenatis turpis ultrices finibus. Donec eu justo vulputate ante scelerisque vehicula quis vel dui. Praesent dictum leo et est faucibus, quis eleifend felis tincidunt.
</p>
<p>
Nullam ut augue ut neque interdum hendrerit. In hac habitasse platea dictumst. Pellentesque velit erat, ultrices et facilisis vitae, molestie in sapien. Proin nec dolor eget orci commodo imperdiet. Nulla vitae dictum tellus. Vivamus massa ante, varius a porta sit amet, luctus vestibulum tellus. Nunc commodo est feugiat est consequat pulvinar ut et neque.
</p>
<p>
Aenean finibus, nulla sit amet tincidunt rutrum, orci enim aliquet tortor, at sollicitudin nisi augue in purus. Quisque tincidunt tellus tristique tortor porttitor laoreet. Etiam dignissim, quam id volutpat fermentum, est magna ultrices erat, in bibendum elit neque sed metus. Integer viverra, orci dignissim suscipit consequat, mi enim feugiat ipsum, quis porta mi tellus eu leo. Quisque tortor dolor, tincidunt id aliquam quis, vehicula ut libero. Etiam consectetur egestas nisi, ut porttitor nisi feugiat eu. Donec luctus nulla in augue placerat consectetur. Suspendisse quis pulvinar lorem, eu tincidunt tortor. Nullam nisi ipsum, mollis et iaculis sed, semper vel velit. Phasellus quis tincidunt velit. Sed vel elementum odio. Pellentesque vestibulum egestas odio, sit amet sagittis tellus fringilla vel. Mauris vitae faucibus odio.
</p>
<p>
Nam nec nibh id lorem ultricies luctus id ac elit. Nam euismod quam mauris, nec mattis lectus rutrum vitae. Fusce ut massa commodo, eleifend quam a, lobortis magna. Fusce at velit tempor, lacinia purus vitae, hendrerit ligula. Aenean suscipit odio vestibulum nunc pulvinar, et pretium dui rutrum. Vivamus quis sodales mi, a vestibulum eros. Duis nec arcu neque. Duis dictum mi ut nunc pretium maximus ac malesuada odio.
</p>
</div>

<script type="text/javascript" src="assets/js/index.js"></script>
</body></html>




