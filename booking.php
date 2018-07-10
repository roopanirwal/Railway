<?php
session_start();
 if(isset($_POST['it'])){
     $no = $_POST['it'];
               $_SESSION['no']=$_POST['it'];
     $con=mysqli_connect("localhost","root");
                    mysqli_select_db($con,"app");
                   $query = "select train_name,departure,arrival,fare,seats from trains where train_no='$no'";
                   $result = mysqli_query($con,$query);
                   $row = mysqli_fetch_row($result);
                   $_SESSION['tname']= $row[0];
                    $_SESSION['dep']= $row[1];
                        $_SESSION['arr']= $row[2];
                        $_SESSION['fare']= $row[3];
                    $_SESSION['seats'] = $row[4];
              }
  if(isset($_GET['name']) && isset($_GET['age']) && isset($_GET['gen'])){
    $_SESSION['name']= $_GET['name'];
    $_SESSION['ages']= $_GET['age'];
    $_SESSION['gen']=$_GET['gen'];
      header("location:confirm.php");
}
?>

<html>
<head>
    <title>Ticket Booking</title>
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
            background-color: darkseagreen;
            border-radius: 0px;
            width: 30%;
            height: 70%;
            margin-left: 15%;
            margin-right: 10%;
            border: none;
            float: left;
        }
        body{
            background-color: aliceblue;
            margin: 0;
        }
        #big{
            width: 100%;
        }
        #d3{
             box-shadow: 2px 2px 20px darkgreen;  
            background-color: darkseagreen;
            width: 30%;
            height: 40%;
            margin-right: 5%;
            margin-top: 5%;
            float: right;
        }
        .coll{
            width: 100%;
            height: 6%;
            margin-bottom: 5%;
            padding-left: 2%;
        }
        form{
            margin: 10% 10% 10% 10%;
        }
        #conn{
            width: 70%;
            height: 8%;
            margin: 15% 15% 5% 15%;
            cursor: pointer;
            background-color: darkseagreen;
            border: 1px solid darkgreen;
            box-shadow: 2px 2px 5px forestgreen;
        }
        .pp{
            color: darkred;
        }
    </style>
    
    </head>
    <body>
      <div id="big"> 
        <div id="d1">
        <?php
    echo '<br><a href="index.php?action=logout">LOGOUT</a>';        
            ?>
        </div> 
          <div id="d3">
          <h1 align="center"><?php echo $_SESSION['tname']."<br>(".$_SESSION['no'].")" ?></h1>
              <p align="center"><?php echo $_SESSION['from']."<b> >>>>> </b>".$_SESSION['to']; ?></p>
            <p align="center"><?php echo $_SESSION['dep']." - ".$_SESSION['arr']; ?></p>
        <p align="center">Journey Date: <?php echo $_SESSION['date']; ?></p>
          </div>
          <div id="d2">
           <h3 align="center">Passenger Details</h3>
          <form action="booking.php" method="get">
              <p class="pp">Note: An id proof will be required during your journey.</p>
              <input class="coll" type="text" name="name" placeholder="Name" required/><br>
              <input class="coll" type="number" name="age" placeholder="Age" required/><br>
              Gender: <input type="radio" name="gen" value="male" required/>Male
              <input type="radio" name="gen" value="female"/>Female
              <input type="radio" name="gen" value="other"/>Other<br>
              <p class="pp">Fare: <?php echo "<b>₹".$_SESSION['fare']."</b> will be taken by TTE at the station before your journey."; ?></p>
              <input type="submit" id="conn" name="sub" value="CONFIRM BOOKING"/>
          </form>
        </div>             
        </div>
    </body>
</html>