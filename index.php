<?php
echo "Curiosity rover last images!";



#$update=file_get_contents("https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?earth_date=".$year."-".$month."-".$day."&api_key=DEMO_KEY");
$update=file_get_contents("https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?earth_date=2016-10-19&api_key=DEMO_KEY");
$update=json_decode($update, TRUE);

$date=getdate();
$month=$date[mon];
$day=$date[mday];
$year=$date[year];

echo "<p>day ".$day."</pp>";
echo "<p>month ".$month."</pp>";
echo "<p>year ".$year."</pp>";

$camera=$update["photos"]["camera"]["name"];
$full_camera=$update["photos"]["camera"]["full_name"];
$url=$update["photos"]["img_src"];

echo "<p>".$camera."</pp>";
echo "<p>".$full_camera."</pp>";
echo '<img src="'.$url.'" alt="curiosity image">';

if (!empty($update)) {
  echo "<p>vuoto!</pp>";
}
?>
