<?php
session_start();
if(isset($_GET['id'])){
$id = $_GET['id'];
$con = mysqli_connect("localhost","root");
mysqli_select_db($con,"app");
$query = "select userid,secQues,secAns from users where userid='$id'";
$result = mysqli_query($con,$query);
$num = mysqli_num_rows($result);
if($num>0){
    $row = mysqli_fetch_row($result);
    $_SESSION['ques'] = $row[1];
    $_SESSION['ans'] = $row[2];
    $_SESSION['id'] = $id;
    header("location:forgot2.php");
}
else{
echo "<h2 align='center'>Please enter a valid id</h2>";    
}
}
?>


<html>
<head>
    <style>
        #first{
           padding-left: 1%;
            padding-right: 1%;
            height: 5%;
            width: 20%;
            margin-bottom: 2%;
        }
        form{
        text-align: center;
            margin-top: 10%;
        }
        p{
            font-size: 25px;
            margin-bottom: 5px;
        }
        #sec{
             background-color: darkseagreen;
            border: 2px solid darkgreen;
            box-shadow: 2px 2px 5px forestgreen;
               cursor: pointer;
            width: 5%;
            height: 5%;
        }
        body{
            background-color: aliceblue;
        }
    </style>
    </head>
    <body>
        <form action="forgot.php" method="get">
   <p>Enter your id</p>    
        <input type="text" placeholder="Userid" name="id" id="first" required><br>
            <input type="submit" id="sec" value="Next>>">
        </form>
    </body>
</html>

