<?php
    

include 'configure.php';


$fname = mysqli_real_escape_string($conf,$_POST['first_name']);
$lname = mysqli_real_escape_string($conf,$_POST['last_name']);
$tel = mysqli_real_escape_string($conf,$_POST['mobile']);
$email = mysqli_real_escape_string($conf,$_POST['email']);
$pass = mysqli_real_escape_string($conf,$_POST['pass']);



$q1 = "select * from customer where email_id='$email'";
$q1_result = mysqli_query($conf,$q1);

if (!$q1_result) {
    printf("Error: %s\n", mysqli_error($conf));
    exit();
}

$q1_row = mysqli_num_rows($q1_result);

if($q1_row == 1)
{
    echo 'User Already Registered';
    
}
else
{
    $query = "Insert into customer(first_name,last_name,telephone,email_id,password) values('$fname','$lname','$tel','$email','$pass')";
    mysqli_query($conf,$query);
}

?>