<?php
 session_start();
 ?>

<html>
    <head>
    <title>Successfully registered</title>
        
     <style>
         a:link{
            color: firebrick;
         }
         a:hover{
             color: dodgerblue;
         }
        
        </style>  
    </head>
    <body>
        <h1 align="center">
      <?php
           
            echo "Hello ".$_SESSION['fname'].", You have successfully registered<br>Now you can take your ride.To login<br>";
            
            ?>
        </h1>
        <h2 align="center"><a href="index.php">Click here</a></h2>
        
        </body>
</html>

