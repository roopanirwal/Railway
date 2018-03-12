

<html>
<head>
    <title>Indian Railways</title>
    
    <style>
       
        #d1{
            width: 50%;
            height: 50%;
            margin-left: 25%;
            margin-top: 10%;
            margin-bottom: 2%;
            border: 5px solid dodgerblue;
            border-radius: 10px;
            box-shadow: 3px 3px 10px dodgerblue;
        }
        #d2{
            
            width:100%;
            height:10%;
            background-color: dodgerblue;
            
            
        }
        h1{
            
            padding-top: 1%;
        }
         input{
            margin-bottom: 3%;
            width: 100%;
             height: 10%;
             padding-left: 3%;
             padding-right: 3%;
        }
        input[type="submit"]{
            background-color:dodgerblue;
            box-shadow: 2px 2px 3px dodgerblue;
        }
        form{
            margin: 5% 25% 5% 25% ;
            
        }
        a:link{
         color:firebrick;
        }
        a:hover{
            color:blueviolet;
        }
        h2{
            text-decoration: underline;
        }
       
    </style>
</head>
    <body>
        <div id="d3">
        <div id="d2">
    <h1 align="center">Welcome To Railways</h1>    
        </div>
    
        <div id="d1">
            <h2 align="center">LOGIN</h2>
        
        <form action="index.php" name="firstform" method="post">
            User id</br>
            <input type="text" name="id" placeholder="Enter your id" required/></br>
            Password</br>
            <input type="password" name="password" placeholder="Enter password" required/></br>
            <input type="submit" value="LOGIN"/>
        </form>

<?php
session_start();
$con=mysqli_connect("localhost","root");
mysqli_select_db($con,"app");
if(isset($_POST['id']) && isset($_POST['password'])){
    $id = $_POST['id'];
    $pass = $_POST['password'];
    $q="select userid,password,fname from users where userid='$id' and password='$pass'";
    $result = mysqli_query($con,$q);
    $num=mysqli_num_rows($result);
    if($num > 0){
        $row=mysqli_fetch_row($result);
        $name=$row[2];
        $_SESSION['fname']=$name;
        header("location:login.php");
        
    }
    else{
        echo " Either id or password is incorrect";
    }
}

if(isset($_GET['logout'])){
    session_unregister('fname');
}

mysqli_close($con);
?>

    </div>
    
<p align="center"><a href="forgot.php">Forgot Password</a></p>
 <p align="center"><a href="signup.php">Sign Up</a></p> 
</div>
    </body>
</html>