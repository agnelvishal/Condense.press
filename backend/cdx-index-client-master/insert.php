<?php

include "dbDetails.php";

$domain=$argv[1];
//files
$files = array_slice(scandir('../../avcrawled'), 2);
foreach($files as $file)
{

$sql="LOAD DATA LOCAL INFILE '"
."../../avcrawled/"
.$file
. "' INTO TABLE `".
$domain
."`LINES TERMINATED BY '\n'
(@column1) set url=@column1;";
	if (!($stmt = $db->query($sql)))
	{
    	 	echo "\nQuery execute failed: ERRNO: (" . $mysqli->errno . ") " . $mysqli->error;
	}
	else
	{
	// Then unlink :)
	$file="../../avcrawled/".$file;
	unlink($file);
	}
}





?>
