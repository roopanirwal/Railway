<?php
session_start();
if(isset($_POST['pwd']) && isset($_POST['pwd2'])){
  $con = mysqli_connect("localhost","root");  
      mysqli_select_db($con,"app");   
$pwd = $_POST['pwd'];
$pwd2 = $_POST['pwd2'];
    if($pwd!=$pwd2){
        echo "<script>alert('Please confirm your password again');</script>";
    }
    else{
     
        $uid = $_SESSION['id'];
        $query = "update users
        set password='$pwd2'
        where userid='$uid'";
        if(mysqli_query($con,$query)){
            header("location:changedpass.php");
        }
        else{
            echo "error: " .mysqli_error($con);
        }
    }
}
?>


<html>
<head>
    <style>
        h2{
            margin-top: 5%;
        }
        div{
            margin-top: 3%;
            width: 20%;
            height: 40%;
            margin-left: 40%;
        }
        .same{
            width: 100%;
            height: 12%;
        }
        input{
            margin-bottom: 5%;
        }
        input[type="submit"]{
            background-color: darkseagreen;
            border: 2px solid darkgreen;
            box-shadow: 2px 2px 5px forestgreen;
               cursor: pointer;
            width: 40%;
                height:12%;
        }
        body{
            background-color: aliceblue;
        }
    </style>
    </head>
    <body>
    <h2 align="center">CREATE NEW PASSWORD</h2>
        <div>
        <form action="newpass.php" method="post">
        Password<br>
            <input type="password" name="pwd" class="same" placeholder="New Password" required><br>
            Confirm Password<br>
            <input type="password" name="pwd2" class="same" placeholder="Enter Again" required><br>
            <input type="submit" value="SUBMIT">
        </form>
        </div>
    </body>
</html>

