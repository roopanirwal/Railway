<?php
session_start();
?>

<html>
<head>
    <title>Logged in</title>
    <script type="text/javascript">
    function populate(s1,s2){
        var s1=document.getElementById(s1);
        var s2=document.getElementById(s2);
        s2.innerHTML = "";
        if(s1.value == "Kanpur"){
            var optionArray = ["|","Allahabad|Allahabad","Delhi|Delhi","Muzaffarnagar|Muzaffarnagar"];
        }
        else if(s1.value == "Delhi"){
            var optionArray = ["|","Agra|Agra","Kanpur|Kanpur"];
        }
        for(var option in optionArray){
            var pair = optionArray[option].split("|");
            var newOption = document.createElement("option");
            newOption.value = pair[0];
            newOption.innerHTML = pair[1];
            s2.options.add(newOption);                
        }
    }
    </script>
    
    <script src='https://code.jquery.com/jquery-3.3.1.js'></script>
    <script src='https://code.jquery.com/jquery-2.2.4.js'></script>
    <script src='https://code.jquery.com/ui/1.12.1/jquery-ui.js'></script>
    <link href='https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css' rel='stylesheet'>
    <script>
       $(document).ready(function(){
           var minDate = new Date();
           $('#date').datepicker({
               minDate: minDate,
               dateFormat: 'dd/mm/yy',
               showAnim: 'drop',
               changeMonth: true,
               changeYear: true
           });           
       });
        $(document).ready(function(){
            $('.but1').click(function(){
               $(this).next('ul').toggleClass('active'); 
               if($(this).html()=="Check availability and fare"){
                    $(this).html("Hide");                 
                }
                else{
                    $(this).html("Check availability and fare");             
                }
            });
        });
        $(document).ready(function(){
            $(".but2").click(function(){
              var item = $(this).closest('tr').find('.nr').text();
                $.post('booking.php',{it:item},function(data){
                    $("#full").html(data);
                });
                
            });
        });
    </script>
   
    <style>     
        div.ui-datepicker, .ui-datepicker td{
            font-size: 80%;
        }
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
        body{
            background-color: aliceblue;
            margin-left: 0;
            margin-right: 0;
        }
        b{
            font-size: 120%;
            text-transform: capitalize;
        }
        #d2{
            width: 30%;
            height: 50%;
            margin-left: 35%;
            margin-top: 5%;
            margin-bottom: 5%;
            box-shadow: 2px 2px 20px darkgreen;  
            background-color: darkseagreen;
            padding-top: 1%;
        }
        form{
            margin: 5% 25% 5% 25%;
        }
       
        #date,select{
            width: 100%;
            margin-bottom: 3%;
            height: 10%;
            padding-left: 3%;
            padding-right: 3%;
        }
        #in{
            background-color: darkseagreen;
            border: 2px solid darkgreen;
            box-shadow: 2px 2px 5px forestgreen;
            cursor: pointer;
            height: 10%;
                width: 70%;
            padding-left: 3%;
            padding-right: 3%;
            margin-bottom: 3%; 
            margin-top: 5%;
        }
        #d3{
            margin-bottom:15%;
        }  
        
    </style>   
    </head>
    <body id="full">
    <div>
        <b>
       <?php
echo "Welcome ".$_SESSION['fname'];
?>
        </b>
        <div id="d1">
        <?php
    echo '<br><a href="index.php?action=logout">LOGOUT</a>';        
            ?>
        </div>
        <div id="d2">
            <u><h2 align="center">Select Your Journey</h2></u>
        <form action="login.php" method="get">
            From Station<br>
            <select id="slct1" name="from" onchange="populate(this.id,'slct2')">
                <option value=""></option>
            <option value="Kanpur">Kanpur</option>
                <option value="Delhi">Delhi</option>         
            </select><br>
            To Station<br>
            <select id="slct2" name="to"></select><br>
            Date<br>
            <input type="text" id="date" name="date" readonly='true' placeholder="Start Date" required/><br>  
            <?php          
            if(isset($_GET['to']) && isset($_GET['from']) && isset($_GET['date'])){
            $from = $_GET['from'];
                $to = $_GET['to']; 
                $dat = $_GET['date'];
                if($to==""){
                echo "*Please choose your destination also";     
                }
                else if($dat==""){
                    echo "*Please select a date also";
                }
            }
            ?>
            <input type="submit" id="in" value="SHOW TRAINS"/>
            </form>
        </div> 
        
        <div id="d3">
        <?php
        if(isset($_GET['to']) && isset($_GET['from']) && isset($_GET['date'])){
            $from = $_GET['from'];
                $to = $_GET['to']; 
            $dat = $_GET['date'];
            $_SESSION['from']=$from;
            $_SESSION['to']=$to;
            $_SESSION['date']=$dat;
        if($from!="" && $to!="" && $dat!=""){
            $con=mysqli_connect("localhost","root");
mysqli_select_db($con,"app");
            $query = "select * from trains where st_location='$from' and end='$to'";
            $result = mysqli_query($con,$query);
            $num = mysqli_num_rows($result);
            if($num>0){
            echo "<html>
            <head>
            <style>
            table,th,td{
            border:1px solid darkseagren;
            border-collapse:collapse;
            }
            table{
            width:96%;
            height:10%;
            margin-left:2%;
            margin-right:2%;
            }
            td{
            padding-left:1%;
            padding-top:1%;
            padding-bottom:1%;
            }
            #td1{
           
            padding:1% 4% 5% 2%;
            }
            th{
            text-align:centre;
           
            background-color:darkseagreen;
            }
            </style>
            </head>
            <body>
            <table>
            <tr><th width='5%'>Train No.</th>
            <th width='10%'>Train Name</th>
            <th width='10%'>From</th>
            <th width='5%'>Departure</th>
            <th width='10%'>To</th>
            <th width='5%'>Arrival</th>
            <th width='5%'>Total Dist.</th>
            <th width='5%'>Travel Time</th>
            <th width='15%'></th>
            </tr></table>
            </body>
            </html>";
                 
                for($i=0;$i<$num;$i++){
                $row = mysqli_fetch_row($result);
             echo "<table border='1'><tr><td width='5%' class='nr'>".$row[0]."</td>
             <td width='10%'>".$row[1]."</td>
             <td width='10%'>".$row[2]."</td>
             <td width='5%'>".$row[3]."</td>
             <td width='10%'>".$row[4]."</td>
             <td width='5%'>".$row[5]."</td>
             <td width='5%'>".$row[6]."</td>
             <td width='5%'>".$row[7]."</td>
             <td width='15%' id='td1'><html>
<head>

    <style>   
        .dropdown{
            position: absolute;
            
        }
        .but1{
            position: relative;
            cursor: pointer;
            width: 230px;
            height: 50px;
            background-color:darkseagreen;
             border: 2px solid darkgreen;
            box-shadow: 2px 2px 5px forestgreen;
        }
        ul{
            position: absolute;
            background:beige; 
            width: 100%;
            height:400%;
            margin: 0;
            padding: 0;
            box-shadow: 0 2px 10px grey;
             transform-origin: top;
            transform: perspective(100px) rotateX(-90deg);
            transition: 0.5s;                                    /* now it will take 0.5s to rotate from -90 to 0.Without transition it will  
                                                                           take 0s. */   
       }                                                                   
        ul.active{
            transform: perspective(1000px) rotateX(0deg);
            z-index: 1;
        }
        ul li{
            list-style: none;           
        }
        ul li p{
            display: block;
            margin-left: 10px;
        }
        .but2{
        width:50%;
        height:15%;
        margin:7% 25% 7% 25%;   
        cursor:pointer;
         background-color:darkseagreen;
             border: 2px solid darkgreen;
            box-shadow: 2px 2px 5px forestgreen;
        }
        
    </style>
    </head>
    <body>
    
    <div class='dropdown'>
        <button class='but1'>Check availability and fare</button>
        <ul>
            <li><p>3AC</p></li>
            <li><p>Fare: Rs.".$row[8]."</p></li>
            <li><p>Availability: ".$row[9]."</p></li>    
            <button class='but2'>BOOK NOW</button>
        </ul>
        </div>
    
    </body>
</html></td>
             </tr>
             </table>";   
            }                
               
            }
            else{
                echo "<h1 align='center'>No train found from ".$from." to ".$to."</h1>";
            }
        }
        }
        ?>
        </div>
        
        </div>
    </body>
</html>
