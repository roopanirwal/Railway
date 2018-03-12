

<html>
<head>
    <title>Logged in</title>
    <script type="text/javascript">
    function populate(s1,s2){
        var s1=document.getElementById(s1);
        var s2=document.getElementById(s2);
        s2.innerHTML = "";
        if(s1.value == "Kanpur"){
            var optionArray = ["|","allahabad|Allahabad","delhi|Delhi","muzaffarnagar|Muzaffarnagar"];
        }
        else if(s1.value == "Delhi"){
            var optionArray = ["|","agra|Agra","kanpur|Kanpur"];
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
    <style>
        #d1{
            background-color: dodgerblue;
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
        b{
            font-size: 120%;
        }
        #d2{
            width: 30%;
            height: 40%;
            margin-left: 35%;
            margin-top: 5%;
            margin-bottom: 5%;
            border: 5px solid dodgerblue;
            border-radius: 10px;
            box-shadow: 3px 3px 10px green;
        }
        form{
            margin: 5% 25% 5% 25%;
        }
        select{
            width: 100%;
            margin-bottom: 3%;
            height: 10%;
            padding-left: 3%;
            padding-right: 3%;
        }
        input{
            background-color: dodgerblue;
            box-shadow: 2px 2px 3px dodgerblue;
            height: 10%;
                width: 70%;
            padding-left: 3%;
            padding-right: 3%;
            margin-bottom: 3%;         
        }
        #d3{
            margin-bottom: 5%;
        }
        
    </style>
    </head>
    <body>
    <div>
        <b>
       <?php
session_start();
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
            
            <?php          
            if(isset($_GET['to']) && isset($_GET['from'])){
            $from = $_GET['from'];
                $to = $_GET['to']; 
                if($to==""){
                echo "*Please choose your destination also";     
                }
            }
            ?>
            
            <input type="submit" value="SHOW TRAINS"/>
            </form>
        </div> 
        
        <div id="d3">
        <?php
        if(isset($_GET['to']) && isset($_GET['from'])){
            $from = $_GET['from'];
                $to = $_GET['to']; 
        if($from!="" && $to!=""){
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
            border:1px solid dodgerblue;
            border-collapse:collapse;
            }
            table{
            width:100%;
            height:10%;
            }
            
            td{
            padding-left:1%;
            
            }
            th{
            text-align:left;
            padding-left:1%;
            background-color:dodgerblue;
            }
            </style>
            </head>
            <body>
            <table>
            <tr><th width='8%'>Train No.</th>
            <th width='15%'>Train Name</th>
            <th width='10%'>From</th>
            <th width='5%'>Departure</th>
            <th width='10%'>To</th>
            <th width='5%'>Arrival</th>
            <th width='8%'>Total Dist.</th>
            <th width='8%'>Travel Time</th>
            </tr></table>
            </body>
            </html>";
                 
                for($i=0;$i<$num;$i++){
                $row = mysqli_fetch_row($result);
             echo "<table border='1'><tr><td width='8%'>".$row[0]."</td>
             <td width='15%'>".$row[1]."</td>
             <td width='10%'>".$row[2]."</td>
             <td width='5%'>".$row[3]."</td>
             <td width='10%'>".$row[4]."</td>
             <td width='5%'>".$row[5]."</td>
             <td width='8%'>".$row[6]."</td>
             <td width='8%'>".$row[7]."</td>
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
