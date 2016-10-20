<?php
echo "Curiosity rover last images!";

$date=getdate();
$month=$date[mon];
$day=$date[mday];
$year=$date[year];

echo "<p>day ".$day."</pp>";
echo "<p>month ".$month."</pp>";
echo "<p>year ".$year."</pp>";

#$update=file_get_contents("https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?earth_date=".$year."-".$month."-".$day."&api_key=DEMO_KEY");
$update=file_get_contents("https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?earth_date=2016-10-19&api_key=DEMO_KEY");


$update=json_decode($update, TRUE);
$camera=$update["photos"]["camera"]["name"];
$full_camera=$update["photos"]["camera"]["full_name"];
$url=$update["photos"]["img_src"];

$id1=$update["photos"]["camera"]["id"];
$id2=$update["photos"]["id"];
$id3=$update["id"];
$id4=$update["camera"]["id"];

echo "<p>".$camera."</pp>";
echo "<p>".$full_camera."</pp>";
echo '<img src="'.$url.'" alt="curiosity image">';

echo "<p>update ".$update."</pp>";
echo "<p>id1 ".$id1."</pp>";
echo "<p>id2 ".$id2."</pp>";
echo "<p>id3 ".$id3."</pp>";
echo "<p>id4 ".$id4."</pp>";

echo "<p>3 ".$update["photos"]["camera"]["id"]."</pp>";
echo "<p>00 ".$update[0][0]"</pp>";
echo "<p>000 ".$update[0][0][0]"</pp>";

if (!empty($update)) {
  echo "<p>vuoto!</pp>";
}
?>
