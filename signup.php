<?php
session_start();
$con = mysqli_connect("localhost","root");
    mysqli_select_db($con,"app");
if(isset($_GET['submit'])){
   
    $userid=$_GET['id'];
$pwd=$_GET['password'];
$ques=$_GET['select'];
$ans=$_GET['securityAns'];
$fname=$_GET['fname'];
$lname=$_GET['lname'];
$gen=$_GET['gender'];
$mob=$_GET['mobNo'];
$email=$_GET['email'];
$status=$_GET['status'];
$door=$_GET['doorNo'];
$colony=$_GET['colony'];
$city=$_GET['city'];
$post=$_GET['post'];
$pin=$_GET['pin'];
    
    $q = "select userid from users where userid='$userid'";
    $result = mysqli_query($con,$q);
    $num = mysqli_num_rows($result);
    if($num>0){
        echo "<script>
        alert('This user id already exists.')
        </script>";
    }
    else{
        
         $qry = "insert into users (userid,password,secQues,secAns,fname,lname,gender,mob,email,status,door,colony,city,post,pin) values ('$userid','$pwd','$ques','$ans','$fname','$lname','$gen',
$mob,'$email','$status','$door','$colony','$city','$post',$pin)";
mysqli_query($con,$qry);
        
        $_SESSION['fname'] = $fname;
        header("location:register.php");
    }
}
mysqli_close($con);
?>



<html>
    <head>
    <title>Sign Up Page</title>
        <script src="signValid.js"></script>
        <style>
            body{
                background-image: url("clouds.jpg");
                background-repeat: no-repeat;
                background-size: 100% 100%;
            }
            #d1{
              height: 10%;
                background-color:dodgerblue;
                width: 100%;
                margin-bottom: 10%;
                
            }
            
        #d2{
        width:60%;
            background-color: antiquewhite;
            
            margin-bottom: 10%;
            margin-left: 20%;
            border: 5px solid dodgerblue;
            box-shadow: 3px 3px 10px dodgerblue;
            border-radius: 10px;
        } 
            
            form{
              margin-left: 15%;
                margin-right: 15%;
                
            }   
            
            .one{
               width: 100%; 
                height: 5%;
                
            }
            
            input{
                margin-bottom: 3%;
            }
            #p1{
                color: red;
            }
            h3{
                background-color: dodgerblue;
            }
            input[type="submit"]{
                width:30%;
                height: 5%;
                background-color: dodgerblue;
                box-shadow: 2px 2px 3px dodgerblue;              
            }
            
            h1{
                margin-bottom: 7%;
                text-decoration: underline;
            }
            input.one{
                padding-left: 3%;
                padding-right: 3%;
            }
            a{
                 float: right;
            color: floralwhite;
            font-size: 160%;
            text-decoration: none;
            margin-right: 2%;
                margin-top: 1%;
            }
            a:hover{
                color: coral;
            }
        </style>
    </head>
    <body>
        <div id="d3">
        <div id="d1">
            <a href="index.php">LOGIN</a>
            </div>
        <div id="d2">
    <h1 align="center">Enter Your Valid Information</h1>
        <form name="signform" action="signup.php" method="get" onsubmit="return validation()">
            User id</br><input type="text" name="id" class="one" placeholder="Create your id" required/></br>
                       
            
        Password</br><input type="password" name="password" class="one" placeholder="Create your password" required/></br>
Confirm Password</br><input type="password" name="password" class="one" placeholder="Enter the same password" required/></br>
Security Question (choose anyone)</br><select class="one" name="select">
<option>What is your pet name?</option>
        <option>Which is your favourite dish?</option>
        <option>Who is your best friend?</option>
        <option>What was your childhood name in school?</option>
        <option>To which country do you want to go?</option>
</select></br>
<p id="p1">(if you forgot your password then this question will be asked to confirm your identity)</p>
Security Answer</br><input type="text" name="securityAns" class="one" placeholder="Enter the corresponding answer" required/>

        
<p class="p2"><h3>PERSONAL INFORMATION</h3></p>

First Name</br><input type="text" name="fname" class="one" placeholder="Enter your first name" required/></br>
Last Name</br><input type="text" name="lname" class="one" placeholder="Enter your last name" required/></br>
Gender</br><input type="radio" name="gender" value="male" required/>Male
<input type="radio" name="gender" value="female"/>Female
<input type="radio" name="gender" value="other"/>Other</br>
Contact No.</br><input type="number" name="mobNo" class="one" placeholder="Enter your mobile no." required/></br>
Email id</br><input type="email" name="email" class="one" placeholder="Email id should be valid" required/></br>
Marital Status</br><input type="radio" name="status" value="married" required/>Married
<input type="radio" name="status" value="unmarried"/>Unmarried
<p class="p2"><h3>RESIDENTIAL ADDRESS</h3></p>

Flat/Door/Block No.</br><input type="text" name="doorNo" class="one" placeholder="Enter your door no." required/></br>
Colony/Village</br><input type="text" name="colony" class="one" placeholder="Enter your village or colony" required/></br>
City</br><input type="text" name="city" class="one" placeholder="Enter your city" required/></br>
Post Office</br><input type="text" name="post" class="one" placeholder="Enter post office location" required/></br>
Pin Code</br><input type="number" name="pin" class="one" placeholder="Enter your city's pincode" required/></br>
<input type="submit" name="submit" value="SUBMIT"/>
</form>
</div>
</div>
    </body>
</html>

