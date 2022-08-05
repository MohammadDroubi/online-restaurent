<?php 
require ("inc/header.php");


$sql="select * from food";
$query=mysqli_query($conn,$sql);

if(mysqli_num_rows($query)>0)
{
  $foods=mysqli_fetch_all($query,MYSQLI_ASSOC);
}



?>

<div class="content">
<div class="container">
    
    <h1>Manage Food</h1>

    </br>
    <a class="btn bg-success fs-5  mb-2" href="add-food.php">Add Food +</a>

    <br>

    <?php

      if(isset($_SESSION['success']))
      {
        ?>
        <div class="alert alert-success"><?=$_SESSION['success']?></div>
        <?php
      }
      unset($_SESSION['success']);
     ?>
    <table class="table bg-light">
  <thead>

      
      
    <tr>
      <th scope="col">#</th>
      <th scope="col">title</th>
      <th scope="col">description</th>
      <th scope="col">price</th>
      <th scope="col">image</th>
      <th scope="col">cat-ssn</th>
      <th scope="col">featured</th>
      <th scope="col">active</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>

  <?php 

    if(!empty($foods)):
    foreach($foods as $index=>$food):
  
  ?>

    <tr>
      <th scope="row"><?=$index?></th>
      <td><?=$food['title']?></td>
      <td><?=$food['foodDesc']?></td>
      <td><?=$food['price']?></td>
      <td><?php
      if($food['image']!="")
      {
        ?>
        <img src="uploads/food/<?= $food['image']?>" width="120px">
        <?php
      }
       ?></td>
       <td><?=$food['catid']?></td>
      <td><?= ($food['features']==1)?"Yes":"No"?></td>
      <td><?= ($food['active']==1)?"Yes":"No"?></td>
      <td>
        <a href="update-food.php?id=<?=$food['id']?>"><i class="fa-solid fa-pen-to-square me-2 fs-4 text-warning"></i></a>
        <a href="handle/deleteFood.php?id=<?=$food['id']?>"><i class="fa-solid fa-trash fs-4 text-danger"></i></a>
      </td>
    </tr>

    <?php endforeach;
    else:
      ?>
      <div class="alert alert-danger">Nothing to show!!!</div>
      <?php

    endif;?>
   
  </tbody>
</table>

    



</div>
</div>
    




</body>
</html>




