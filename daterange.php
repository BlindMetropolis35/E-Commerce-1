<?php require_once("includes/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Date Range</title>
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link href="css/styles.css" rel="stylesheet"> 
    <style>
        hr {
        position: relative;
        top: 20px;
        border: none;
        height: 2px;
        background: black;
        margin-bottom: 50px;
        }
        .btn-primary:hover {
            background-color:green;
            transition: 0.2s;
        }
        #hew1{
            background-color:yellow;
        }
    </style> 	
</head>
<body>
    <center>
    <div class="tab">
    <?php
        $today = date("y-m-d");
    ?>
    <table class="table table-bordered" width="100%"  border="2px" style="padding:80px">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">userId</th>
                    <th scope="col">productId</th>
                    <th scope="col">quantity</th>
                    <th scope="col">orderDate</th>
                    <th scope="col">paymentMethod</th>
                    <th scope="col">orderStatus</th>
                </tr>
            </thead>
            <?php
                $rett=mysqli_query($con,"select * from orders where orderDate= '$today' ");
                $numm=mysqli_num_rows($rett);
                if($numm>0){
                    while ($rows=mysqli_fetch_array($rett)) {
            ?>
            <tbody>
                <tr data-expanded="true">
                    <td><?php echo $rows['id'];?></td>
                    <td><?php  echo $rows['userId'];?></td>
                    <td><?php  echo $rows['productId'];?></td>
                    <td><?php  echo $rows['quantity'];?></td>
                    <td><?php  echo $rows['orderDate'];?></td>
                    <td> <?php  echo $rows['paymentMethod'];?></td>
                    <td><?php  echo $rows['orderStatus'];?></td>
                </tr>
                <?php 
                    } } else { }
                ?>
                <tr>
                    <td colspan="8"> No record found against this dates</td>
                </tr>
                            
            </tbody>
        </table>
    </div>
    <h1>Enter Date Range below</h1>
    <hr/>
    <!--center-->
    <div class="row">
        <form name="bwdatesdata" action="" method="post" action="">
            <table width="100%" height="117"  border="0">
            <tr>
                <th width="27%" height="63" scope="row">From Date :</th>
                <td width="73%">
                    <input type="date" name="fdate" class="form-control" id="fdate">
                </td>
            </tr>
            <tr>
                <th width="27%" height="63" scope="row">To Date :</th>
                <td width="73%">
                    <input type="date" name="tdate" class="form-control" id="tdate">
                </td>
            </tr>
            <tr>
                <th width="27%" height="63" scope="row"></th>
                <td width="73%">
                <button class="btn-primary" type="submit" name="submit">Submit</button>
            </tr>
            </table>
        </form>
    </div>
    <div class="col-xs-12">
        <?php
            if(isset($_POST['submit']))
            { 
                $fdate=$_POST['fdate'];
                $tdate=$_POST['tdate'];
        ?>
        <hr/>
        <h3 style="float:center; color:blue;">Report from <?php echo $fdate?> to <?php echo $tdate?></h3>
        <table class="table table-bordered" width="100%"  border="2px" style="padding:80px">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">userId</th>
                    <th scope="col">productId</th>
                    <th scope="col">quantity</th>
                    <th scope="col">orderDate</th>
                    <th scope="col">paymentMethod</th>
                    <th scope="col">orderStatus</th>
                </tr>
            </thead>
            <?php
                $ret=mysqli_query($con,"select * from orders where orderDate between '$fdate' and '$tdate' ");
                $num=mysqli_num_rows($ret);
                if($num>0){
                $cnt=1;
                while ($row=mysqli_fetch_array($ret)) {
            ?>
            <tbody>
                <tr data-expanded="true">
                    <td><?php echo $row['id'];?></td>
                    <td><?php  echo $row['userId'];?></td>
                    <td><?php  echo $row['productId'];?></td>
                    <td><?php  echo $row['quantity'];?></td>
                    <td><?php  echo $row['orderDate'];?></td>
                    <td> <?php  echo $row['paymentMethod'];?></td>
                    <td><?php  echo $row['orderStatus'];?></td>
                </tr>
                <?php 
                    $cnt=$cnt+1;
                    } } else { 
                ?>
                <tr>
                    <td colspan="8"> No record found against this dates</td>
                </tr>
                            
            </tbody>
        </table>
        <?php } }?>  
    </div> 
    <hr>
    </center>
    <!-- script references -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>