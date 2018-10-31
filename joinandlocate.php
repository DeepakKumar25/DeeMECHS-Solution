<script>
    function locate(add,add2,city,state,zip)
    {
        location = add+','+add2+','+city+','+state+' - '+zip;
        
        
    }
</script>

<?php
    

include 'configure.php';



$company = mysqli_real_escape_string($conf,$_POST['company']);
$manager = mysqli_real_escape_string($conf,$_POST['manager']);
$address = mysqli_real_escape_string($conf,$_POST['address']);
$address2 = mysqli_real_escape_string($conf,$_POST['address2']);
$city = mysqli_real_escape_string($conf,$_POST['city']);
$state = mysqli_real_escape_string($conf,$_POST['state']);
$zip = mysqli_real_escape_string($conf,$_POST['zip']);
$telephone = mysqli_real_escape_string($conf,$_POST['mobile']);

$q1 = "select * from garages where company='$company' && manager='$manager'";
$q1_result = mysqli_query($conf,$q1);

if (!$q1_result) {
    printf("Error: %s\n", mysqli_error($conf));
    exit();
}

$q1_row = mysqli_num_rows($q1_result);

if($q1_row == 1)
{
    echo 'Already Registered';
    
}
else
{
    $query = "Insert into garages(company,manager,contact,address,address2,city,state,zip_code) values('$company','$manager','$telephone','$address','$address2','$city','$state','$zip')";
    mysqli_query($conf,$query);
}

echo "locate(".$address.",".$address2.",".$city.",".$state.",".$zip")";




$q = "select * from garages where company='$company' && manager='$manager'";
    $result = mysqli_query($conf,$q);
    $row = mysqli_fetch_row($result);
    //$row = json_encode($address.", ".$address2.", ".$city.", ".$state);
    $row = json_encode($row,true);
   //echo "<div id='data'>".$row."</div>";
    echo '<script>geocode('.$row.')</script>';
?>




<script>
    var data =JSON.parse(document.getElementById('data').innerHTML);
    var address = data[1]+", "+data[4]+", "+data[5]+", "+data[6]+", "+data[7];
    console.log(address);
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({'address':address},function(results,status){
        if (status == 'OK'){
            map.setCentre(results[0].geometry.location);
            alert(results[0].geometry.location);
        }
        
        else
            {
                alert('Geocode was not successful for the following reasons :'+status );
            }
    });
</script>
