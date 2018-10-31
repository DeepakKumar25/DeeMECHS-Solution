<?php
require 'configure.php';

funtion getGarages(){
    $q="Select * from garages where lat is null and lng is null";
    $result = mysqli_query($conf,$q);
    
    return mysqli_fetch_all($result,MYSQLI_ASSOC);
}
?>