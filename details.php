<!DOCTYPE html>
<html>
<head>  
    <title>AmbiLamp</title>
    <link rel="stylesheet" type="text/css " href="assets/css/details.css">  
    
</head>

<body>

<?php
    include "header.php";
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
                <th>Deviation From Average</th>
              </tr>
              <tr>
                <td>Peter</td>
                <td>Griffin</td>
                <td>demonstration</td>
              </tr>
              <tr>
                <td>Lois</td>
                <td>Griffin</td>
                <td>a</td>
              </tr>
              <tr>
                <td>Joe</td>
                <td>Swanson</td>
                <td>demonstration</td>
              </tr>
              <tr>
                <td>Cleveland</td>
                <td>Brown</td>
                <td>$250</td>
            </tr>
        </table>
    </div>
    <div class="table">
        <table id="sound-table">
            <tr>
                <th>Time</th>
                <th>Amplitude</th>
                <th>Deviation From Average</th>
              </tr>
              <tr>
                <td>Peter</td>
                <td>Griffin</td>
                <td>demonstration</td>
              </tr>
              <tr>
                <td>Lois</td>
                <td>Griffin</td>
                <td>demonstration</td>
              </tr>
              <tr>
                <td>Joe</td>
                <td>Swanson</td>
                <td>$300</td>
              </tr>
              <tr>
                <td>Cleveland</td>
                <td>Brown</td>
                <td>demonstration</td>
            </tr>
        </table>
    </div>
</div>


<script type="text/javascript" src="assets/js/details.js"></script>
</body>
</html>

