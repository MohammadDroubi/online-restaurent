<?php

include("inc/header.php");



require("handle/connection.php");
$sql="SELECT count(id) as acount FROM admins";
$query=mysqli_query($conn,$sql);
$count=mysqli_fetch_assoc($query);





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
        <h2>5</h2>
        <br>
        <h3>categories</h3>
        <br>
        <a class="btn" href="#">Show</a>
    </div>

    <div class="box">
        <h2>5</h2>
        <br>
        <h3>categories</h3>
        <br>
        <a class="btn" href="#">Show</a>
    </div>


    <div class="box">
        <h2>5</h2>
        <br>
        <h3>categories</h3>
        <br>
        <a class="btn" href="#">Show</a>
    </div>

    <div class="fix"></div>



</div>
</div>

<?php

include("inc/footer.php")
?>
