<?php

   


    $item_select_moz = "SELECT min(mozPa),max(fbshares) FROM `".$domain."`";
    $result_select_moz = mysqli_query($db, $item_select_moz);
    $row = mysqli_fetch_assoc($result_select_moz);

    $minMoz = intval($row["min(mozPa)"]);
    $maxfbshares = intval($row["max(fbshares)"]);
    $mulForMoz = $maxfbshares /50; 

    $item_select = "SELECT mozPa,fblikes,fbshares,url,reddit,pinterest FROM `".$domain."` ORDER BY fbshares desc";
    $result_select = mysqli_query($db, $item_select);
    while ($row = mysqli_fetch_assoc($result_select)) {
        try {
          $total=0;
            $url=$row["url"];
            $likes= $row["fblikes"];
            $shares= $row["fbshares"];
            $pa= $row["mozPa"];
            $reddit= $row["reddit"];
            $pinterest= $row["pinterest"];
            

            //Approx 50% for shares,10% for likes and 40% for pa.
            // Note that I feel log should ve avoided for likes and shares.
            if ($shares>0) {
                $total+=$shares;
            }
            if ($likes>0) {
                $total+=$likes;
            }
            if ($pa>0) {
                $total+=($pa - $minMoz + 1) * $mulForMoz;
            }
            if ($reddit>0) {
              $total+=$reddit;
          }
          if ($pinterest>0) {
            $total+=$pinterest;
        }
            $total=ceil($total);
            //echo $total;
      
            $insertquery="UPDATE `".$domain."` SET total='".$total."' WHERE url='".$url."'";
            $insert=mysqli_query($db, $insertquery);
            if (!$insert) {
                echo "insert failed - ",mysqli_error($db);
            }
        } catch (Exception $e1) {
            echo 'Caught exception: ',  $e1->getMessage(), "\n";
        }
    }

    mysqli_free_result($result_select);
    mysqli_close($db);
    
