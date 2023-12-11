<?php
$host='localhost';
$uname='root';
$pass='';
$db='crud';
$con=new mysqli($host,$uname,$pass,$db);
if($con){
    //echo 'success';
}
else{
    die(mysqli_error($con));
}

?>