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

$id=$update["photos"]["0"]["id"];
$id2=$update["photos"][0]["id];
$url=$update["photos"]["img_src"];

echo "<p>id = ".$id."</pp>";
echo "<p>id2 = ".$id2."</pp>";
echo '<img src="'.$url.'" alt="curiosity image">';

if (empty($update)) {
  echo "<p>vuoto!</pp>";
}

function count_dimension($Array, $count = 0) {
   if(is_array($Array)) {
      return count_dimension(current($Array), ++$count);
   } else {
      return $count;
   }
}

$dime=count_dimension($update);
echo "<p>dimensioni array ".$dime."</pp>";

print_r($update);
#var_dump($update);
#var_export($update);

#foreach($update as $error) 
#   echo $error . '<br/>';

#array_map('echo', $update);
?>
