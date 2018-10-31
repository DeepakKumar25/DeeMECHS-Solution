<?php
require 'configure.php';

$gid = $_POST['gid'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];

print_r($gid);

$query = "update garages set lat = $lat , lng = $lng where gid = $gid ";
//$query = "insert into garages(lat,lng) values('$lat','$lng') where cid = $cid";
$result = mysqli_query($conf,$query);

if($result)
    echo 'Success';
else 
    printf("Error: %s\n", mysqli_error($conf));
?>