
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

    $query = "SELECT * FROM users";
    $data = mysqli_query($conn,$query);

    $total = mysqli_num_rows($data);

if($total != 0)
{
    ?>
     
    <h1 align="center"><mark><u>User Details</u></mark></h1>
    <table border="4" width="auto" align="right">
        <tr>
        <th width="3%">Id</th>
        <th width="5%">Name</th>
        <th width="10%">Email</th>
        <th width="10%">Contact no.</th>
       
        </tr>
    
    <?php
    while($result = mysqli_fetch_assoc($data))
    {
        echo "<tr>
                <td>".$result['id']."</td>
                <td>".$result['name']."</td>
                <td>".$result['email']."</td>
                <td>".$result['contactno']."</td>
                
               
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
        <title>User Data</title>
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





