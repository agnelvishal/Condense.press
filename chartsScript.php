<div id="container" style="height: 400px; min-width: 310px; max-width: 600px; margin: 0 auto"></div>


<script>
Highcharts.chart('container', {

   chart: {
     type: 'bubble',
     plotBorderWidth: 1,
     zoomType: 'xy'
   },

   legend: {
     enabled: false
   },

   title: {
     text: 'Visualization of news by ratings and time'
   },

   subtitle: {
     text: '   '
   },

   xAxis: {
     gridLineWidth: 1,
     type:'datetime',
     title: {
       text: 'Date'
     }
     },

   yAxis: {
     startOnTick: false,
     endOnTick: false,
     title: {
       text: 'Ratings'
     },
     labels: {
       format: '{value}%'
     },
     maxPadding: 0.2,

   },

   tooltip: {
     useHTML: true,
     headerFormat: '<table>',
     pointFormat: '<tr>{point.heading}</tr>' +
       '<tr><th>Date:</th><td>{point.x:%d.%m.%Y}</td></tr>' +
       '<tr><th>Ratings:</th><td>{point.z}%</td></tr>',
     footerFormat: '</table>',
     followPointer: true
   },

   plotOptions: {
     series: {
       cursor: 'pointer',
       point: {
         events: {
           click: function() {
          //   location.href = this.url;
          window.open(this.url, '_blank');

           }
         }
       },
       dataLabels: {
         enabled: false,
         format: '{point.name}'
       }
     }
   },
   series: [{
     data: [

 
