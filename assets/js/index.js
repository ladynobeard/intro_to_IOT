
document.getElementById('color').value = document.getElementById('picker').value;

var tempCtx = document.getElementById("temp-chart").getContext('2d');
var tempChart = new Chart(tempCtx, {
    type: 'radar',
	data: {
        	labels: ["1200", "0100", "0200", "0300", "0400", "0500",
		 	 "0600", "0700", "0800", "0900", "1000", "1100"],
        	datasets: 
		[{
	            	label: 'Average Temperature by Hour - Morning',
        	    	data: tempDataDay,
            		borderColor:
                		'rgba(255, 230, 64, 1)',
           	 	backgroundColor:
                		'rgba(255, 230, 64, .5)',
		},
		{
            		label: 'Average Temperature by Hour - Afternoon',
            		data: tempDataNight,
            		borderColor:
                		'rgba(12, 12, 56, 1)',
            		backgroundColor:
                		'rgba(12, 12, 56, .5)',
		}]
    	},
	options: {
        	scale: {
			ticks: {			
				min: tempMin,
				max: tempMax
			}
                },
		responsive: false
	}
});

var soundCtx = document.getElementById("sound-chart").getContext('2d');
var soundChart = new Chart(soundCtx, {
    type: 'radar',
	data: {
        	labels: ["1200", "0100", "0200", "0300", "0400", "0500",
		 	 "0600", "0700", "0800", "0900", "1000", "1100"],
        	datasets: 
		[{
	            	label: 'Average Sound Level by Hour - Morning',
        	    	data: soundDataDay,
            		borderColor:
                		'rgba(255, 230, 64, 1)',
           	 	backgroundColor:
                		'rgba(255, 230, 64, .5)',
		},
		{
            		label: 'Average Sound Level by Hour - Afternoon',
            		data: soundDataNight,
            		borderColor:
                		'rgba(12, 12, 56, 1)',
            		backgroundColor:
                		'rgba(12, 12, 56, .5)',
		}]
    	},
	options: {
        	scale: {
			ticks: {
				min: soundMin,
				max: soundMax
			}
                },
		responsive: false
	}
});

function update(jscolor){
    document.getElementById("color").value = jscolor;
}

function apply(){
    document.getElementById("smt").click();
}
