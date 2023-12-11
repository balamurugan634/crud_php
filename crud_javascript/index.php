<?php include 'connect.php' ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>crud</title>
    <link rel="stylesheet" href="./style.css" />
   
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body>
    <h1 class="logh1">login</h1>
    <h1 class="regh1">Register</h1>
    <div class="reguser"><i class="fa fa-user"></i></div>
    <div class="loguser"><i class="fa fa-user"></i></div>
    <div class="reg">
      <form action="" method='post'>
        <table>
          <tr>
            <td><label for="uname">user name</label></td>
            <td>
              <input type="text" id="uname" placeholder="enter username" name='uname'/>
            </td>
          </tr>
          <tr>
            <td><label for="upass">password</label></td>
            <td>
              <input type="password" id="upass" placeholder="enter password" name='upass'/>
            </td>
          </tr>
          <tr>
            <td><label for="dob">DOB</label></td>
            <td><input type="date" id="dob" placeholder="enter username" name='dob' /></td>
          </tr>
          <tr>
            <td><label for="mail">user mail</label></td>
            <td>
              <input type="email" id="mail" placeholder="enter mail" name='umail'/>
            </td>
          </tr>
          <tr>
            <td><button name='reg' class="click_btn">signup</button></td>
          </tr>
        </table>
      </form>
    </div>
    <div class="log">
      <form action="" method='POST'>
        <table>
          <tr>
            <td><label for="logname">user name</label></td>
            <td>
              <input
                type="text"
                name="luname"
                id="logname"
                placeholder="enter username"
              />
            </td>
          </tr>
          <tr>
            <td>
              <label for="logpass">password</label>
            </td>
            <td>
              <input
                type="password"
                name="lupass"
                id="logpass"
                placeholder="enter password"
              />
            </td>
          </tr>
          <tr>
            <td><button name='log' class="click_btn">login</button></td>
          </tr>
        </table>
      </form>
    </div>
  </body>
</html>
<?php
if(isset($_POST['reg'])){
  session_start();
  $user_name=$_POST['uname'];
  $user_pass=$_POST['upass'];
  $user_mail=$_POST['umail'];
  $dob=$_POST['dob'];
  /* function verify($user_name,$con){
    $select_qry="select * from details";
    $fetch_res=mysqli_query($con,$select_qry);
    if(mysqli_num_rows($fetch_res) >0){
        while($rec=mysqli_fetch_assoc($fetch_res)){
          if($rec['uname']==$user_name){
              echo "<h1>.$user_name already exist</h1>";
              return false;
              break;
          }
          else{
            return true;  
          }
    }
  }
} */
//if(verify($user_name,$con)==false){
  $qry="select * from details where uname='$user_name'";
  $rec=mysqli_query($con,$qry) or die('failed'.mysqli_error($con));
  if(mysqli_num_rows($rec)){?>
    <script>
      alert('user already exist please login ')
    </script>
  <?php }
  else{
    $query="insert into details(uname,mail,pass,dob) values ('$user_name','$user_mail','$user_pass','$dob') ";
      $res=mysqli_query($con,$query);

    if($res){
      header('location:display.php');
            }
    else{
        die(mysqli_error($con));
      }
    //}
  }
}
if(isset($_POST['log'])){
  $user_name=$_POST['luname'];
  $user_pass=$_POST['lupass'];
  $qry3="select * from details where uname='$user_name'";
  $res2=mysqli_query($con,$qry3);
  $row=mysqli_fetch_assoc($res2);
  if($row['uname']==$user_name && $row['pass']==$user_pass){
      header('Refresh:0;url=display.php');
  }
  else{?>
  <script>
    alert('wrong username and password')
  </script>

  <?php }
}

?>