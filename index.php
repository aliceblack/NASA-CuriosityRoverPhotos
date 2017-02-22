<?php
echo "Curiosity rover yesterday's Photos!";

$date=getdate();
$month=$date[mon];
$day=$date[mday];
$year=$date[year];

$y=0;
$y=$day-1;
if($month==11|$month==4|$month==6|$month==9)
{
  if($day==1)
  {
    $y=30;
  }
}
else if($month==2)
{
  if($day==1)
  {
    $y=28;
  }
}
else
{
  if($day==1)
  {
    $y=31;
  }
}

#$update=file_get_contents("https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?earth_date=".$year."-".$month."-".$day."&api_key=DEMO_KEY");
$update=file_get_contents("https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?earth_date=".$year."-".$month."-".$y."&api_key=DEMO_KEY");
$update=json_decode($update, TRUE);

echo "<p>Photos taken on: </pp>";
echo "<p>day ".$y."</pp>";
echo "<p>month ".$month."</pp>";
echo "<p>year ".$year."</pp>";

$id=$update["photos"]["0"]["id"];
$id2=$update["photos"][0]["id"];
//$name=$update["photos"]["0"]["camera"]["name"];
$name=$update["photos"]["0"]["camera"]["id"];//camera id
$fullname=$update["photos"]["0"]["camera"]["full_name"];//camera id
$url=$update["photos"]["0"]["img_src"];

echo "<p>id = ".$id."</pp>";
echo "<p>id = ".$id2."</pp>";
echo "<p>Camera id = ".$name."</pp>"; //camera id
echo "<p>Camera full_name = ".$fullname."</pp>"; //camera full_name

echo '<img src="'.$url.'" alt="curiosity image">';

if (empty($update)) {
  echo "<p>Empty Array! Curiosity took a day off!</pp>";
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
