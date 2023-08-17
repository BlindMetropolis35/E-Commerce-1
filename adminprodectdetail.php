<?php

error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopping";

$conn = mysqli_connect("localhost","root","","shopping");
if (!$conn){
    die("Connection failed: " .$conn->connect_error);
}else{
    //echo "connection ok";
}

include("coonect.php");

    $query = "SELECT * FROM orders";
    $data = mysqli_query($conn,$query);

    $total = mysqli_num_rows($data);

if($total != 0)
{
    ?>
     
    <h1 align="center"><mark><u>User Details</u></mark></h1>
    <table border="4" width="auto" align="right">
        <tr>
        <th width="3%">Id</th>
        <th width="5%">productId</th>
        <th width="10%">paymentmethod</th>
        <th width="10%">orderStatus</th>
       
        </tr>
    
    <?php
    while($result = mysqli_fetch_assoc($data))
    {
        echo "<tr>
                <td>".$result['id']."</td>
                <td>".$result['productId']."</td>
                <td>".$result['paymentMethod']."</td>
                <td>".$result['orderStatus']."</td>
                
               
            </tr> ";
    }
}
else{
    echo "No records found";
}
?>
</table>

<html>
    <head>
        <title>product detail</title>
        <style>
            body{
                background:wheat;
            }
            table{
                background:white;
            }
            table th{
                border: 2px solid black;
            }
           
        </style>
    </head> 
</html> 

