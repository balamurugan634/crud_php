<?php include 'connect.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if(isset($_GET['uid'])) {
        $sid=$_GET['uid'];
        $qry1="select * from details where sno=".$sid;
        $fetch_res=mysqli_query($con,$qry1);
        $up=mysqli_fetch_assoc($fetch_res);
        ?>
    <h1>update page</h1>
    <form action="" method="post">
        <table>
            <tr>
                <td class="field">user name</td>
                <td><input type="text" name="upname" id="" value="<?php echo $up['uname'];?>"></td>
            </tr>
            <tr>
                <td class="field">user mail</td>
                <td><input type="email" name="upmail" value="<?php echo $up['mail'];?>"></td>
            </tr>
            <tr>
                <td class="field">user pass</td>
                <td><input type="text" name="uppass" id="" value="<?php echo $up['pass'];?>"></td>
            </tr>
            <tr>
                <td class="field">user dob</td>
                <td><input type="date" name="updob" id="" value="<?php echo $up['dob'];?>"></td>
            </tr>
            <tr><td><input type="submit" value="update" name="update" class="upbtn"></td></tr>
            
        </table>
    </form>

    <?php if(isset($_POST['update'])){
        $upname=$_POST['upname'];
        $uppass=$_POST['uppass'];
        $upmail=$_POST['upmail'];
        $updob=$_POST['updob'];
        $qry2="update details set uname='$upname',pass='$uppass',mail='$upmail',dob='$updob' where sno=".$sid;
        $res=mysqli_query($con,$qry2);
        if($res){
           // echo "ok";
            header('Refresh:0;url=display.php');
        }
        else{
            die(mysqli_error($con));
        }
    }
        } ?>
    <style>
        *{
            box-sizing:border-box;
            overflow:hidden;
        }
        body{
            width:100vw;
            height:100vh;
        }
        h1{
            text-align:center;
            text-transform:uppercase;
            width:100%;
            height:15%;
        }
        form{
            width:100%;
            height:80%;
            display:flex;
            align-items:center;
            justify-content:center;
        }
        table{
            border:1px solid grey;
            box-shadow: rgba(0, 0, 0, 0.6) 0px 5px 15px;
            width:700px;
            height:500px;
        }
        tr{
            width:100%;
        }
        td{
            width:50%;
            text-align:center;
            font-size:1.3rem;
        }
        td input{
            width:70%;
            height:40%;
            outline:none;
            border:none;
            padding:5px;
            font-size:1.1rem;
            background-color: rgba(0, 0, 0, 0.082);

            border-radius:5px;
        }
        .upbtn{
            background: #4cd137 ;
            color:white;
            width:50%;
            text-transform:uppercase;
            font-weight:bold;
            transition:0.5s ease;
        }
        .field{
            text-transform:uppercase;
            font-weight:bold;

        }
        .upbtn:hover{
            box-shadow: rgba(0, 0, 0, 0.6) 0px 5px 15px;
            cursor:pointer;
        }

    </style>
</body>
</html>