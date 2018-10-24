
<head>





<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
  <link rel="stylesheet" href="css/card.css">




</head>
<body>
<?php


try{
//$output=$_POST["output"];

$fromDate=$_POST["fromDate"];
$toDate=$_POST["toDate"];

// Declaring Base URL for API EndPoint
$url = "http://localhost:8000/";

// Determining final end point and concatenating data as needed
if (!empty($fromDate) and !empty($toDate)) {
    $url .= "feeds/between?startDate=$fromDate&endDate=$toDate";
} else {
    $url .= "feeds";
}

// Opening a curl request
$apiRequest = curl_init();

// Setting Request URL to the opened curl request
curl_setopt($apiRequest, CURLOPT_URL, $url);

// Telling curl to return results to var instead of printing to the screen
curl_setopt($apiRequest, CURLOPT_RETURNTRANSFER, 1);

// Executing and storing returns from the curl request
$result = curl_exec($apiRequest);

// Closing curl request
curl_close($apiRequest);

// Converting JSON Return to a array Object
$result = json_decode($result, true);

include "chartsScript.php";
?>


<?php
// Data being fetched from db for charts
$urlExists=array();
$iurlExists=0;

   foreach ($result['data'] as $index => $item) {
     if (in_array($item["item_url"], $urlExists))
     {
     continue;
     }
     else
     {
       $adate = date_create($item["item_date"]);
       date_sub($adate, date_interval_create_from_date_string('1 month'));


       $urlExists[$iurlExists]=$item["item_url"];
       $iurlExists++;
           $table .= '{';
           $table .= 'x:Date.UTC(';
           $table .= date_format($adate, 'Y,m,d').'),';
           $table .= 'y:';
           $table .= $item["total"].',';
           $table .= 'z:';
           $table .= $item["total"].',';
           $table .= 'heading:';
           $table .= '\'';
           $table .=  addcslashes($item["item_title"], "'");
           $table .= '\''.',';

           $table .= 'url:';
           $table .= '\'';
           $table .= $item["item_url"];
           $table .= '\'';
           $table.='}';
           $table.=',';
    }
  }
  echo $table;
  ?>

// Highcharts code termination
     ]
     }]

   });

  </script>

  <?php


// Data being fetched for cards


 $table = '<div class="row">';

    $urlExists=array();
    $iurlExists=0;
       foreach ($result['data'] as $index => $item) {

         if (in_array($item["item_url"], $urlExists))
         {
         continue;

         }
         else
         {

           $urlExists[$iurlExists]=$item["item_url"];
           $iurlExists++;
       $table .= '<div class="column"><div class="card">';

       $table .='<div class="center-image" style="background-image: url('.$item["image"].');" style="width:320px"></div>';
       $table .= '<h2 class="block-with-text">'.$item["item_title"].'</h2>';
       $table .='<div class="container">';
       $table .= '<span class="date">'.$item["item_date"].'</span>';
       $table .= '<div class="meta"><div class="meta-item"><p class="label">Total Popularity:</p><p>';
       $table .= $item["total"];
       $table .= '</p></div><div class="meta-item"><p class="label">Search Engine Popularity:</p><p>';
       $table .= $item["pa"];
       $table .= '</p></div><div class="meta-item"><p class="label">Facebook Shares</p><p>';
       $table .= $item["shares"];
       $table .= '</p></div><div class="meta-item"><p class="label">Facebook Likes:</p><p>';
       $table .= $item["likes"];
       $table .= '</p></div></div><p class="description">';
       $table .= $item["item_content"];
       $table .= '</p>';

       $table .= '<a target="_blank" href="'.$item["item_url"].'" >Read more</a>';
       $table.='</div></div></div>'	;
      }
    }
    $table.='</div>';

  echo $table;

} catch (Exception $e) {
  echo 'Caught exception: ',  $e->getMessage(), "\n";
}

 ?>


</body>

