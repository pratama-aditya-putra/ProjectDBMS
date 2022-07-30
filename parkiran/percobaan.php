<?php 
$date=mktime(11, 14, 54, 8, 12, 2016);
echo "Created date is " . date("Y-m-d h:i:sa", $date)."<br/>";


$time1 = "11:14:54";
$time1 = strtotime($time1);
$time1 = date("Y-m-d h:i:s", $time1);

$time2 = date("Y-m-d h:i:s");


$starttimestamp = strtotime($time2);
$endtimestamp = strtotime($time1);

print "".abs($endtimestamp - $starttimestamp)."";

?>