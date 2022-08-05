<?php

include("inc/header.php");



require("handle/connection.php");
$sql="SELECT count(id) as acount FROM admins";
$query=mysqli_query($conn,$sql);
$count=mysqli_fetch_assoc($query);

$sql2="SELECT COUNT(id) as ccount from categories";
$query=mysqli_query($conn,$sql2);
$ccount=mysqli_fetch_assoc($query);


$sql3="select count(id) as fcount from food";
$query3=mysqli_query($conn,$sql3);
$fcount=mysqli_fetch_assoc($query3);

$sql4="select count(id) as ocount from orders";
$query4=mysqli_query($conn,$sql4);
$ocount=mysqli_fetch_assoc($query4);
?>


<div class="content">
<div class="container">
    
    <h1>Dashbord</h1>

    <div class="box">
        <h2><?=$count['acount']?></h2>
        <br>
        <h3>Admins</h3>
        <br>
        <a class="btn" href="admin.php">Show</a>
    </div>

    <div class="box">
        <h2><?=$ccount['ccount']?></h2>
        <br>
        <h3>categories</h3>
        <br>
        <a class="btn" href="categories.php">Show</a>
    </div>

    <div class="box">
        <h2><?=$fcount['fcount']?></h2>
        <br>
        <h3>foods</h3>
        <br>
        <a class="btn" href="food.php">Show</a>
    </div>


    <div class="box">
        <h2><?=$ocount['ocount']?></h2>
        <br>
        <h3>orders</h3>
        <br>
        <a class="btn" href="orders.php">Show</a>
    </div>

    <div class="fix"></div>



</div>
</div>

</body>
</html>
