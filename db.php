
  <?php
  try {

    //Diagnosis
      //  ini_set("display_errors",1);
      //error_reporting(E_ALL);
    
      // Database details
      $d = "127.0.0.1";
      $u = "root";
      $p = "";
      $db = mysqli_connect($d, $u, $p, "condense");
      if (mysqli_connect_errno($db)) {
          echo "AV:Failed to connect to MySQL: " . mysqli_connect_error();
          exit();
      }
      $site = $_GET["site"];
      if ($site == "others") {
          $siteText=$_GET["siteText"];
          $email=$_GET["email"];
          $email=mysqli_real_escape_string($db, $email);
          $siteText=mysqli_real_escape_string($db, $siteText);

          $item_select = "Insert into users (email, website) values ('".$email."','".$siteText."')";

          // echo $item_select;
          $result = mysqli_query($db, $item_select);
          if (!$result) {
              die('Av -- Could not insert data in others: --' . mysqli_error($db));
          }
          else
          {
              echo "You will receive the results of ".$siteText." in your mail ".$email." in around 2 hours";
          }
          mysqli_close($db);
      } else {
          $limit=$_GET["limit"];
        
          //$output=$_POST["output"];
    
          $dateSelect = $_GET["dateSelect"];
          if ($dateSelect == "custom") {
              $fromDate = $_GET["fromDate"];
              $toDate = $_GET["toDate"];
          } else {
              $fromDate = date("Y-m-d", strtotime($dateSelect));
              $toDate = date("Y-m-d", strtotime("now"));
          }


    
          $fromDate=mysqli_real_escape_string($db, $fromDate);
          $toDate=mysqli_real_escape_string($db, $toDate);
          $site=mysqli_real_escape_string($db, $site);


          //query generation for date
          $whereDateClause=" where";
          $whereDateClause.="(date between\"";
          $whereDateClause.=$fromDate;
          $whereDateClause.="\" AND \"";
          $whereDateClause.=$toDate;
          $whereDateClause.="\" )";

          $item_select = "SELECT count(*) as count FROM `".$site."`".$whereDateClause;

          //echo $item_select;
          $result = mysqli_query($db, $item_select);
          if (!$result) {
              die('Av -- Could not get data: --' . mysqli_error($db));
          }
          $rows = mysqli_fetch_assoc($result);
          echo "<div id='picked'> Picked from ".number_format($rows["count"])." articles </div>";

          $item_select = "SELECT title,date, url,total,image,fblikes,fbshares,mozPa, reddit, pinterest FROM `".$site."`".$whereDateClause." ORDER BY total desc limit ".$limit;

          //echo $item_select;
          $result = mysqli_query($db, $item_select);
          if (!$result) {
              die('Av -- Could not get data: --' . mysqli_error($db));
          }

   


          // Data being fetched for cards


          $table = '<div class="row">';



          while ($rows = mysqli_fetch_assoc($result)) {
              $table .= '<div class="column"><div class="card">';

              $table .='<div class="center-image" style="background-image: url('.$rows["image"].');"></div>';
              $table .= '<h2 class="block-with-text">'.preg_replace('/u([a-fA-F0-9]{4})/', '&#x\\1;', $rows["title"]).'</h2>';
              $table .= '<a target="_blank" href="'.$rows["url"].'" >Read Full Article</a>';
              $table .='<div class="container">';
              $table .='<div class="totalPopularity"> Total Popularity :'.$rows["total"].'</div>';
              $table .= '<div class="meta">';
              $table .= '<div class="meta-item"><p class="label">Search Engine Popularity:</p><p>';
              $table .= $rows["mozPa"]."</p></div>";
              $table .= '<div class="meta-item"><p class="label">Facebook Shares:</p><p>';
              $table .= $rows["fbshares"]."</p></div>";
              $table .= '<div class="meta-item"><p class="label">Facebook Likes:</p><p>';
              $table .= $rows["fblikes"]."</p></div>";
              $table .= '<div class="meta-item"><p class="label">Reddit:</p><p>';
              $table .= $rows["reddit"]."</p></div>";
              $table .= '<div class="meta-item"><p class="label">Pinterest:</p><p>';
              $table .= $rows["pinterest"]."</p></div>";
              $table .= '</div>';
              /*$table .= '<p class="description">';
              $table .= $rows["description"];
              $table .= '</p>';
              */
              $table.='</div></div></div>';
          }
          $table.='</div>';

          echo $table;


//
          mysqli_data_seek($result, 0);
          include "chartsScript.php";

          // Data being fetched from db for charts
          $table = "";
          while ($rows = mysqli_fetch_assoc($result)) {
              $adate = date_create($rows["date"]);

              // Not sure why I am subtracting a month.
              date_sub($adate, date_interval_create_from_date_string('1 month'));

              $table .= '{';
              $table .= 'x:Date.UTC(';
              $table .= date_format($adate, 'Y,m,d').'),';
              $table .= 'y:';
              $table .= $rows["total"].',';
              $table .= 'z:';
              $table .= $rows["fbshares"].',';
              $table .= 'heading:';
              $table .= '\'';
              $table .=  addcslashes($rows["title"], "'");
              $table .= '\''.',';

              $table .= 'url:';
              $table .= '\'';
              $table .= $rows["url"];
              $table .= '\'';
              $table.='}';
              $table.=',';
          }
          echo $table; ?>

  // Highcharts code termination
  ]
}]

});

</script>

<?php

mysqli_free_result($result);
          mysqli_close($db);
      }
  } catch (Exception $e) {
      echo 'Caught exception: ',  $e->getMessage(), "\n";
  }

?>
