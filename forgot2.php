 
<html>
<head>
    <style>
        form{
            text-align: center;
            margin-top: 10%;
        }
        #first{
             padding-left: 1%;
            padding-right: 1%;
            height: 5%;
            width: 20%;
            margin-bottom: 2%;
        }
        #sec{
             background-color: dodgerblue;
            width: 5%;
            height: 5%;
        }
        h2{
            margin-bottom: 0px;
        }
        #p1{
            margin-bottom: 0px;
            margin-top: 0px;
            color: red;
        }
    </style>
    </head>
    <body>
    <form action="forgot2.php" method="post">
       <h2>
       <?php 
            session_start();
            echo $_SESSION['ques'];
            ?>       
        </h2><br>
        <p id="p1">*(This is your security question)</p><br>
        <input type="text" name="ans" placeholder="Enter your answer" id="first" required>
        <input type="submit" id="sec" value="Next>>">
        </form>
    </body>
</html>

<?php
if(isset($_POST['ans'])){
$ans = $_POST['ans'];
    if($ans!=$_SESSION['ans']){
       
        echo "<p align='center'>Please correct your answer</p>";
    }
    else{
        header("location:authenticate.php");
    }
    
}
?>







