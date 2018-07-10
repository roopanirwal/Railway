<?php
session_start();
?>
<html>
<head>
    <title>Indian Railways</title>
    
    <style>
       
        #d1{
            width: 40%;
            height: 50%;
            margin-left: 30%;
            margin-top: 10%;
            margin-bottom: 2%;
            margin-right: 30%;
            box-shadow: 2px 2px 20px darkgreen;  
            background-color: darkseagreen;
            padding-top: 1%;
        }
        
        #d2{
            width:100%;
            height:10%;
            background-color: darkseagreen;    
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
             background-color: darkseagreen;
            border: 2px solid darkgreen;
            box-shadow: 2px 2px 5px forestgreen;
               cursor: pointer;
            margin-top: 8%;
        }
        form{
            margin: 5% 25% 5% 25% ;
            
        }
        a{
         color: darkred;
            font-size: 150%;
            float: right;
            margin-right: 5%;
        }
        a:hover{
            color:blueviolet;
        }
        h2{
            text-decoration: underline;
        }
        body{
            background-image: url("corfe.jpg");
            background-repeat: no-repeat;
            background-size: 100% 100%;
            margin: 0;
        }
        #pp{
            margin-left: 5%;
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
            User id<br>
            <input type="text" name="id" placeholder="Enter your id" required/><br>
            Password<br>
            <input type="password" name="password" placeholder="Enter password" required/><br>
            <input type="submit" value="LOGIN"/>
        </form>
            <p id="pp">
    <?php
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
            ?></p>
    </div>
    
<p><a href="forgot.php">Forgot Password</a></p><br>
 <p><a href="signup.php">Sign Up</a></p> 
</div>
    </body>
</html>