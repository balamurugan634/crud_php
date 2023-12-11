<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>hello</h1>
    <?php 
include 'connect.php';
if(isset($_GET['sid'])){
    $id=$_GET['sid'];
    //echo "<h1>$id</h1>";
    $delqry="delete from details where sno=".$id;
    $result=mysqli_query($con,$delqry);
if($result){
    header('location:display.php');
  //  echo 'success';
}
else{
    die(mysqli_error($con));
}

}




?>    
</body>
</html>
