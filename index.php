
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

    $color = "EFFFC9";
    if (isset($_POST['set_color'])){
        $color = $_POST['color'];
   }
   if (isset($_POST['set_default'])) {
 $color_data->insert($_POST['color']);
}
/* BEGIN LED CODE */
/********************************************************
 * * Use the LED schematic in Challenge 2, LED Circuit
 * * to complete these constructor lines.
 * ********************************************************/
$red = new GPIO(22, "out",4);
$green = new GPIO(27, "out",3);
$blue = new GPIO(17, "out",1);
$colorArray = $color.str_split();
/*********************************************************
 * * Our colors are in hexadecimal - that is, come in the
 * * form #------ where each dash is a character in the set
 * * {0 1 2 3 4 5 6 7 8 9 a b c d e f}, which is the number
 * * system in base 16. The RGB LED accepts values 0-255 for
 * * each of the three colors. Conveniently, 255 is the
 * * largest decimal value of two hexademical digits. That
 * * is, #FF = (15 * 16^1) + (15 * 16^0) = 255. Thus, in a
 * * hex color such as #BAD94D, the red PWM value is
 * * respresented by #BA, green by #D9, and blue by #4D.
 * * The str_split() function above turns our color string
 * * into an array of characters (e.g. [B, A, D, 9, 4, D])
 * * and we pwm_write() red with the decimal value of #BA in
 * * the line below. Follow this reasoning to complete the
 * * pwm_write()inputs for green and blue.
 * ********************************************************/
$red->pwm_write(hexdec($colorArray[0].$colorArray[1]));
$green->pwm_write(hexdec($colorArray[2].$colorArray[3]));
$blue->pwm_write(hexdec($colorArray[4].$colorArray[5]));
/* END LED CODE */
?>

<!-- JSCOLOR PICKER -->
<input type="button" class="jscolor" id="picker" onchange="update(this.jscolor)" onfocusout="apply()" value=<?php echo "'".$color."'"; ?>>

<!-- FORM -->
<form method="POST">
    <input type="submit" id="smt" name="set_color" hidden>
    <input type="text" id="color" name="color">
    <input type="submit" value="Set as Default" id="set_default">
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




