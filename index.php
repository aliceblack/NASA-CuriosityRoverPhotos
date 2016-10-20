<?php
echo "Curiosity rover last images!";

$date=getdate();
$day=$date[mon];
$month=$date[mday];
$year=$date[year];

$update=file_get_contents("https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?earth_date=".$year."-".$month."-".$day."&api_key=DEMO_KEY");

$update=json_decode($update, TRUE);
$camera=$update["name"];
$full_camera=$update["full_name"];
$url=$update["img_src"];


echo "<p>".$camera."</pp>";
echo "<p>".$full_camera."</pp>";
echo '<img src="'.$url.'" alt="curiosity image">';

?>
