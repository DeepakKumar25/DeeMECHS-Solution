<?php
    

include 'configure.php';



$email = mysqli_real_escape_string($conf,$_POST['email']);
$pass = mysqli_real_escape_string($conf,$_POST['pass']);



$q1 = "select * from customer where email_id='$email' && password='$pass'";
$result = mysqli_query($conf,$q1);

if (!$result) {
    printf("Error: %s\n", mysqli_error($conf));
    exit();
}
$row = mysqli_fetch_array($result);
$num = mysqli_num_rows($result);

if($num == 1)
{
    $_SESSION['name'] = $row['first_name'] ;
    $_SESSION['cid'] = $row['cid'] ;
    header('location:customer.php');
}
else 
{   
    
    $_SESSION['error'] = "INVALID LOGIN CREDENTIALS ENTERED...........LOGIN AGAIN !!!";
    header('location:login.html');
}

?>