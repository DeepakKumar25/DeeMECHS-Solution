<?php
session_start();

$conf= mysqli_connect('localhost','root');
if(!$conf)
{
	echo 'no connection';
}
mysqli_select_db($conf,'deemechs');
?>