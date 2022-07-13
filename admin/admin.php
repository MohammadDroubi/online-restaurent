
<?php

include("inc/header.php");
require("handle/connection.php");


if(isset($_GET['page']))
{
  $page=$_GET['page'];
}
else
{
  $page=1;
}

$sql="SELECT COUNT(id) as total from admins";
$query=mysqli_query($conn,$sql);
$totalofadmins=mysqli_fetch_assoc($query);
$totalofadmins=$totalofadmins['total'];

$limit=2;
$offset=($page-1)*$limit;

$numofpages=ceil($totalofadmins/$limit);

if($page < 1|| $page>$numofpages)
{
  header("location: admin.php?page=1");
}

$sql="SELECT * FROM ADMINS limit $limit offset $offset";
$query=mysqli_query($conn,$sql);

if(mysqli_num_rows($query)>0)
{
  $admins=mysqli_fetch_all($query,MYSQLI_ASSOC);

}




?>

<div class="content">
<div class="container">
    
    <h1>All Admins</h1>
 </br>
    <a class="btn bg-success fs-5  mb-2" href="add-admin.php">Add Admin+</a>

    <br>

    <?php
    if(isset( $_SESSION['success']))
    {
      ?>
        <div class="alert alert-success"><?= $_SESSION['success'] ?></div>
      <?php
    }
    if(isset( $_SESSION['update']))
    {
      ?>
        <div class="alert alert-success"><?= $_SESSION['update'] ?></div>
      <?php
    }
    if(isset( $_SESSION['delete']))
    {
      ?>
        <div class="alert alert-success"><?= $_SESSION['delete'] ?></div>
      <?php
    }

    if(isset( $_SESSION['pwd-success']))
    {
      ?>
        <div class="alert alert-success"><?= $_SESSION['pwd-success'] ?></div>
      <?php
    }

    

    
    unset( $_SESSION['success']);
    unset( $_SESSION['update']);
    unset( $_SESSION['delete']);
    unset(  $_SESSION['pwd-success']);

   
    
    
    
    ?>
    <table class="table bg-light">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">UserName</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if(!empty($admins)):
    foreach($admins as $index=> $admin):
      ?>
    <tr>
      <th scope="row"><?=$index?></th>
      <td><?=$admin['name']?></td>
      <td><?=$admin['user_name']?></td>
      <td>
        <a href="edit-Admin.php?id=<?=$admin['id']?>"><i class="fa-solid fa-pen-to-square me-2 fs-4 text-warning"></i></a>
        <a href="handle/deleteAdmin.php?id=<?=$admin['id']?>"><i class="fa-solid fa-trash fs-4 text-danger"></i></a>
       
        
       
      </td>
    </tr>
   
    <?php endforeach;
    else:
      ?>

        <div class="alert alert-danger">No Data</div>

      <?php
   endif;?>
  </tbody>
</table>

<nav aria-label="Page navigation example">
  <ul class="pagination">


  
    <li class="page-item
    <?=($page==1)?'disabled':''?>
    "><a class="page-link" href="admin.php?page=<?=$page-1?>">Previous</a></li>

    <?php for($i=1;$i<=$numofpages;$i++):?>
    <li class="page-item"><a class="page-link" href="admin.php?page=<?=$i?>"><?=$i?></a></li>
    <?php endfor; ?>
    <li class="page-item
    <?=($page==$numofpages)?'disabled':''?>
    "><a class="page-link" href="admin.php?page=<?=$page+1?>">Next</a></li>

  
  </ul>
</nav>
    

    



</div>
</div>


</body>
</html>