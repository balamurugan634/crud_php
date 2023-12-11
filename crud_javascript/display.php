<?php include 'connect.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <h1>result page<span style="font-size:1.2rem;text-decoration:none;color:red;padding-left:70px;"><a href="./index.php" style="text-decoration:none;color:red;"> back to home</a></span></h1>
    <table  cellpadding='10' cellspacing='10px'>
        <tr style='background-color:aliceblue;text-transform:uppercase;'>
            <th>sno</th>
            <th>name</th>
            <th>mail</th>
            <th>pass</th>
            <th>dob</th>
            <th>delete</th>
            <th>update</th>
        </tr>
        <tbody>
            <form action="" method="post">
            <?php
                $select_qry="select * from details";
                $fetch_res=mysqli_query($con,$select_qry);
                if(mysqli_num_rows($fetch_res) >0){
                    while($res=mysqli_fetch_assoc($fetch_res)){ ?>
                        
                        <tr>
                        <td><?php echo $res['sno'] ?></td>
                        <td><?php echo $res['uname'] ?></td>
                        <td><?php echo $res['mail'] ?></td>
                        <td><?php echo $res['pass'] ?></td>
                        <td><?php echo $res['dob'] ?></td>
                        <td><a onclick="del_confirm('<?php echo $res['sno']; ?>','<?php echo $res['uname']?>')"><i class="fa fa-trash" style="font-size:1.2rem;color:red;"></i></a></td>
                        <td><a onclick="update('<?php echo $res['sno']; ?>','<?php echo $res['uname']?>')"><i class="fa fa-edit" style="font-size:1.2rem;color:green;"></i></a></td>
                        </tr>
                        <?php
                            }
                        }
            ?>
        </tbody>
    </table>
    </form>
    <script>
       // var c=document.getElementById('del')
        //c.addEventListener('click',function (){
          //  var par=document.getElementById('del').parentElement;
            //console.log(par);
            //var per=par.parentElement;
            //console.log(per);
            //per.remove();
        //}
        //);
        function del_confirm(x,y){
           // alert('deleted successfully')
           var result = confirm("Are you sure you want to delete "+y+" record?");
            if(result){
                //alert("Record deleted!");
                // location.replace("http://myproject/studentresult/delete_student_mark.php?sid="+xidnum+"&sem="+xsem)
              location.replace("http://myproject/crud_php/crud_javascript/delete.php?sid="+x);
                //window.location.replace("http://myproject/crud_php/crud_javascript/delete.php?sid="+x);
                //window.location="myproject/crud_php/crud_javascript/delete.php";
                //window.location.href="http://myproject/crud_php/crud_javascript/delete.php?sid="+x;
                //window.location.replace("http://myproject/crud_php/crud_javascript/index.php");
              //  location.replace("http://myproject/studentresult/table.php");
            }
            else
            {
                alert("Deletion canceled.");
            }
            
        }

        function update(x,y){
            location.replace("http://myproject/crud_php/crud_javascript/update.php?uid="+x);
        }
    </script>
    <style>
    
  @import url('https://fonts.googleapis.com/css2?family=Pacifico&family=Roboto:wght@600&display=swap');
        h1{
            text-transform:uppercase;
            font-weight:bold;
            letter-spacing:1.2px;
        }
        body{
            font-family: 'Roboto', sans-serif;
            display:flex;
            flex-direction:column;
            align-items:center;
            width:100vw;
            height:100vh;
        }
        table{
            min-width: 90%;
            max-height:80%;
        }
        tr{
            text-align:center;
        }
    </style>
    
</body>
</html>