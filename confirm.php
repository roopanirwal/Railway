<?php
session_start();
 $con=mysqli_connect("localhost","root");
 mysqli_select_db($con,"app");
$rem = $_SESSION['seats']-1;
$no = $_SESSION['no'];
$query = "update trains set seats='$rem' where train_no='$no'";
mysqli_query($con,$query);
?>
<html>
<head>
    <title>Ticket Generated</title>
    <style>
    #d1{
            background-color: darkseagreen;
            width: 100%;
            height: 10%;
        }
        a{ 
            float: right;
            color: floralwhite;
            font-size: 150%;
            text-decoration: none;
            margin-right: 2%;
        }
        a:hover{
            color: coral;
        }
        #d2{
            box-shadow: 2px 2px 20px darkgreen;   
            margin: 4% 37% 4% 37%;
           width: 26%;
            height:60%;
            background-color: darkseagreen;
            padding-bottom: 1%;
        }
        body{
            background-color: aliceblue;
            margin: 0;
        }
        #hh{
            padding-top: 4%;
        }
        #tran{
            text-transform: capitalize;
        }
       
    </style>
    </head>
    <body>
    <div>
        <div id="d1">
        <?php
    echo '<br><a href="index.php?action=logout">LOGOUT</a>';        
            ?>
        </div> 
        <h2 align="center">Congratulations! Your ticket has been booked.<br>Have a great journey...</h2>
        <div id="d2">
        <h2 align="center" id="hh"><?php echo $_SESSION['tname']."<br>(".$_SESSION['no'].")" ?></h2>
<p align="center"><?php echo $_SESSION['from']."<b>   --->   </b>".$_SESSION['to']; ?></p>
            <p align="center"><?php echo $_SESSION['dep']." - ".$_SESSION['arr']; ?></p>
        <p align="center">Journey Date: <?php echo $_SESSION['date']; ?></p>
            <p align="center">Tkt Chrg: <?php echo "Rs.".$_SESSION['fare']; ?></p><br>
            <hr>
            <p align="center" id="tran"><?php echo $_SESSION['name'].", ".$_SESSION['gen']; ?></p>
            <p align="center"><?php echo "Age: ".$_SESSION['ages']; ?></p>
            <p align="center">Booking Status: Confirmed</p>
        </div>
        </div>
    </body>
</html>