
    let ctx = document.getElementById("myChart").getContext('2d');
let myChart ;
function drawChart(){
        myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: currentDataInput.label,
            datasets: [{
                label: currentDataInupTitle, // Name the series
                data: currentDataInput.value, // Specify the data values array
                fill: false,
                borderColor: '#5C69AF', // Add custom color border (Line)
                backgroundColor: '#2196f3', // Add custom color background (Points and Fill)
                borderWidth: 3 // Specify bar border width
            }]},
        options: {
        responsive: true, // Instruct chart js to respond nicely.
        maintainAspectRatio: true, // Add to prevent default behaviour of full-width/height 
        }
    });
}
