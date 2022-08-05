<?php 
require ("inc/header.php");

$sql="select * from orders ORDER BY id DESC";
$query=mysqli_query($conn,$sql);

if(mysqli_num_rows($query)>0)
{

  $orders=mysqli_fetch_all($query,MYSQLI_ASSOC);

}

?>

<div class="content">
<div class="container">
    
    <h1>Manage Orders</h1>

    
   <br>

   <?php

    if(isset($_SESSION['success']))
    {
        ?>
<div class="alert alert-success"><?=$_SESSION['success']?></div>
        <?php
      
    }
    if(isset($_SESSION['delete']))
    {
        ?>
<div class="alert alert-success"><?=$_SESSION['delete']?></div>
        <?php
      
    }
   
   unset($_SESSION['success']);
   unset($_SESSION['delete']);
   ?>

    <table class="table bg-light">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">food</th>
      <th scope="col">price</th>
      <th scope="col">qty</th>
      <th scope="col">total</th>
      <th scope="col">date</th>
      <th scope="col">address</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
      <th scope="col">status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

  <?php
  
    if(!empty($orders)):
    foreach($orders as $index=>$order):
   
      
  ?>
    <tr>
      <th scope="row"><?=$order['id']?></th>
      <td><?=$order['food']?></td>
      <td><?=$order['price']?></td>
      <td><?=$order['qty']?></td>
      <td><?=$order['total']?></td>
      <td><?=$order['date']?></td>
      <td><?=$order['customeraddress']?></td>
      <td><?=$order['customername']?></td>
      <td><?=$order['customercontant']?></td>
      <td><?=$order['customeremail']?></td>
      <td><?=$order['status']?></td>
      <td>
        <a href="update-order.php?id=<?=$order['id']?>"><i class="fa-solid fa-pen-to-square me-2 fs-4 text-warning"></i></a>
        <a href="handle/DeleteOrder.php?id=<?= $order['id'] ?>"><i class="fa-solid fa-trash fs-4 text-danger"></i></a>
      </td>
    </tr>

    <?php endforeach ;
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






