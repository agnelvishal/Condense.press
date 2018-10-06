
<head>





<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
  <link rel="stylesheet" href="css/card.css">
</head>
<body>
<?php


try{






$h = "agnelvishal2.cm6dgizwvuku.us-east-2.rds.amazonaws.com";
$u = "public";
$p = "onlySelectAccess";
$db = mysqli_connect($h, $u, $p,"agnelvishal");
if (mysqli_connect_errno($db)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$limit=100;
//$output=$_POST["output"];

$fromDate=$_POST["fromDate"];
$toDate=$_POST["toDate"];

//query generation for date
$whereDateClause=" where";
$whereDateClause.="( item_date between\"";
$whereDateClause.=$fromDate;
$whereDateClause.="\" AND \"";
$whereDateClause.=$toDate;
$whereDateClause.="\" )";



$item_select = "SELECT item_content,item_title,item_date, item_url,total,image,likes,shares,pa FROM `FEED`".$whereDateClause." ORDER BY total desc limit ".$limit;
//echo $item_select;
$result = mysqli_query($db, $item_select);
if (!$result) die('Av -- Could not get data: --' . mysqli_error($db));


if($_POST['output'] == 'chart') {
?>
<div id="container" style="height: 400px; min-width: 310px; max-width: 600px; margin: 0 auto"></div>
<?php
}
?>


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

<?php

$urlExists=array();
$iurlExists=0;

   while ($rows = mysqli_fetch_assoc($result)) {
     if (in_array($rows["item_url"], $urlExists))
     {
     continue;
     }
     else
     {
       $adate = date_create($rows["item_date"]);
       date_sub($adate, date_interval_create_from_date_string('1 month'));


       $urlExists[$iurlExists]=$rows["item_url"];
       $iurlExists++;
           $table .= '{';
           $table .= 'x:Date.UTC(';
           $table .= date_format($adate, 'Y,m,d').'),';
           $table .= 'y:';
           $table .= $rows["total"].',';
           $table .= 'z:';
           $table .= $rows["total"].',';
           $table .= 'heading:';
           $table .= '\'';
           $table .=  addcslashes($rows["item_title"], "'");
           $table .= '\''.',';

           $table .= 'url:';
           $table .= '\'';
           $table .= $rows["item_url"];
           $table .= '\'';
           $table.='}';
           $table.=',';

    }
  }
  echo $table;


  ?>
     ]
     }]

   });

  </script>

  <?php


////

 $table = '<div class="row">';

    mysqli_data_seek($result, 0);

    $urlExists=array();
    $iurlExists=0;
       while ($rows = mysqli_fetch_assoc($result)) {

         if (in_array($rows["item_url"], $urlExists))
         {
         continue;

         }
         else
         {

           $urlExists[$iurlExists]=$rows["item_url"];
           $iurlExists++;
       $table .= '<div class="column"><div class="card">';

       $table .='<div class="center-image" style="background-image: url('.$rows["image"].');" style="width:320px"></div>';
       $table .= '<h2 class="block-with-text">'.$rows["item_title"].'</h2>';
       $table .='<div class="container">';
       $table .= '<span class="date">'.$rows["item_date"].'</span>';
       $table .= '<div class="meta"><div class="meta-item"><p class="label">Total Popularity:</p><p>';
       $table .= $rows["total"];
       $table .= '</p></div><div class="meta-item"><p class="label">Search Engine Popularity:</p><p>';
       $table .= $rows["pa"];
       $table .= '</p></div><div class="meta-item"><p class="label">Facebook Shares</p><p>';
       $table .= $rows["shares"];
       $table .= '</p></div><div class="meta-item"><p class="label">Facebook Likes:</p><p>';
       $table .= $rows["likes"];
       $table .= '</p></div></div><p>';
       $table .= $rows["item_content"];
       $table .= '</p>';

       $table .= '<a target="_blank" href="'.$rows["item_url"].'" >Read more</a>';
       $table.='</div></div></div>'	;
      }
    }
    $table.='</div>';
if($_POST['output'] != 'chart') {
  echo $table;
}
////




mysqli_free_result($result);
mysqli_close($db);





} catch (Exception $e) {
  echo 'Caught exception: ',  $e->getMessage(), "\n";
}

 ?>


</body>
