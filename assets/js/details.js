var tempCtx;
var tempChart;
var tempCounter = 0;
var soundCtx;
var soundChart;
var soundCounter = 0;


function drawTemp(){
    tempCounter++;
    tempCtx = document.getElementById("temp-chart-long").getContext('2d');

	console.log(temperatureX);
    if((tempCounter = tempCounter % 2)==0){
        tempChart.destroy();
    }else{
        
        tempChart = new Chart(tempCtx, {
            type: 'line',
            data: {
                labels: temperatureX,
                datasets: [{
                    label: 'Temperature Readings',
                    data: temperatureData,
                    backgroundColor: [
                        'rgba(153, 102, 255, 0.2)',
                    ],
                    borderColor: [
                        'rgba(153, 102, 255, 1)'
		    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: false
            }
        });
    }
}


function drawSound(){
    soundCounter++;
    soundCtx = document.getElementById("sound-chart-long").getContext('2d');

    if((soundCounter = soundCounter % 2)==0){
        soundChart.destroy();
    }else{
        
        soundChart = new Chart(soundCtx, {
            type: 'line',
            data: {
                labels: soundX,
                datasets: [{
                    label: 'Sound Readings',
                    data: soundData,
                    backgroundColor: [
                        'rgba(153, 102, 255, 0.2)',
                    ],
                    borderColor: [
                        'rgba(153,102,255,1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {  
                responsive: false
            }
        });
    }
}
