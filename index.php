<!DOCTYPE html>
<html>
<head>
    <title>AbiLamp</title>
    <link rel="stylesheet" type="text/css" href="assets/css/index.css"> 
    <script src="jscolor.js"></script>
</head>
<body>

<?php
    include "GPIO.php:;
    include "header.php";
?>

<!-- JSCOLOR PICKER -->
<input type="button" class="jscolor" id="picker" onchange="update(this.jscolor)" value="EFFFC9">

<!-- FORM -->
<form>
    <input type="text" id="color">
    <input type="submit" value="Set as Defualt" id="set_default">
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


