$(document).ready(function($) {

  initPie();
  initLine(); 
});


function initPie(){
  var ctx1 = $("#pieChart");

  var myChart = new Chart(ctx1, {
    type: 'doughnut',
    data: dataPie, //traida desde el controller
    options: {
        responsive: true,
    }
  });
}
function initLine(){
  console.log(dataLine);
  var labels = dataLine.labels;
  var fechas=[];
  labels.forEach(function(v,i,a){
    var date = new Date(v);
    fechas.push(date);
  });
  console.log();
  var ctx2 = $("#lineChart");
  var myChart2 = new Chart(ctx2, {
    type: 'line',
    data: {    
        labels: fechas,
        datasets: dataLine.datasets,
      }, //traida desde el controller
    options: {
        responsive: true,
        title: {
          text: 'Reclamos por fecha'
        },
        scales: {
          xAxes: [{
            type: 'time',
            time: {
             // format: timeFormat,
              // round: 'day'
              tooltipFormat: 'll HH:mm'
            },
            scaleLabel: {
              display: true,
              labelString: 'Fecha'
            }
          }],
          yAxes: [{
            scaleLabel: {
              display: true,
              labelString: 'Reclamos'
            }
          }]
        },
      }
  });
}
   


    // {
    //     labels: [ // Date Objects
    //       newDate(0),
    //       newDate(1),
    //       newDate(2),
    //       newDate(3),
    //       newDate(4),
    //       newDate(5),
    //       newDate(6)
    //     ],
    //     datasets: [{
    //       label: 'My First dataset',
    //       backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
    //       borderColor: window.chartColors.red,
    //       fill: false,
    //       data: [ 2,2,5,9,8,5
    //       ],
    //     }, {
    //       label: 'My Second dataset',
    //       backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
    //       borderColor: window.chartColors.blue,
    //       fill: false,
    //       data: [
    //         randomScalingFactor(),
    //         randomScalingFactor(),
    //         randomScalingFactor(),
    //         randomScalingFactor(),
    //         randomScalingFactor(),
    //         randomScalingFactor(),
    //         randomScalingFactor()
    //       ],
    //     }, {
    //       label: 'Dataset with point data',
    //       backgroundColor: color(window.chartColors.green).alpha(0.5).rgbString(),
    //       borderColor: window.chartColors.green,
    //       fill: false,
    //       data: [{
    //         x: newDateString(0),
    //         y: randomScalingFactor()
    //       }, {
    //         x: newDateString(5),
    //         y: randomScalingFactor()
    //       }, {
    //         x: newDateString(7),
    //         y: randomScalingFactor()
    //       }, {
    //         x: newDateString(15),
    //         y: randomScalingFactor()
    //       }],
    //     }]
    //   }