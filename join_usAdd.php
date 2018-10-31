<script src="geocode.js"></script>
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


?>

