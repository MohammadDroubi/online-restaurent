<?php 
require ("inc/header.php");
require("handle/connection.php");


$sql="select * from categories";
$query=mysqli_query($conn,$sql);

if(mysqli_num_rows($query)>0)
{
  $cat=mysqli_fetch_all($query,MYSQLI_ASSOC);
}




?>

<div class="content">
<div class="container">
    
    <h1>Manage Categories</h1>

    </br>

    <?php  
    
    
    if(isset($_SESSION['success']))
    {
        ?>  

          <div class="alert alert-success"><?php echo $_SESSION['success']  ?></div>

        <?php

        
    }
    unset($_SESSION['success']);
    
    ?>
      
      
    <a class="btn bg-success fs-5  mb-2" href="add-categories.php">Add Category +</a>

    <br>
  
    <table class="table bg-light">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">title</th>
      <th scope="col">image</th>
      <th scope="col">featured</th>
      <th scope="col">active</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

   
       <?php
       
       if(!empty($cat)):
       foreach($cat as $index=>$cats):
       
       ?>
    <tr>
      <th scope="row"><?=$index?></th>
      <td><?=$cats['title']?></td>
      <td>

              <?php

              if($cats['image']!=""){?>

              <img src="uploads/categories/<?=$cats['image']?>" width="100px" height="90px" >
              <?php
              }

                else
                {
                  ?>
                  <div class="alert alert-danger">no image</div>
                  <?php
                }
              ?>

      </td>
      <td><?=($cats['featured']==1)?"yes":"no"?></td>
      <td><?=($cats['active']==1)?"yes":"no"?></td>
      <td>
        <a href="update-categories.php?id=<?php echo $cats['id'] ?>"><i class="fa-solid fa-pen-to-square me-2 fs-4 text-warning"></i></a>
        <a href="handle/deleteCategories.php?id=<?php echo $cats['id'] ?>"><i class="fa-solid fa-trash fs-4 text-danger"></i></a>
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
    

    



</div>
</div>
    




  </body>
  </html>






