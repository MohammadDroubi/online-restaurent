<?php 

require("connection.php");
session_start();
 
if(isset($_GET['id']))
{

    $id=$_GET['id'];

    $sql="SELECT * FROM orders where id=$id";

    $qurey=mysqli_query($conn,$sql);

    if(mysqli_num_rows($qurey)==1)
    {
        $order=mysqli_fetch_assoc($qurey);
    }
    echo '<pre>';
    print_r($order);
    echo '</pre>';

    $qty=$_POST['qty'];
    $status=$_POST['status'];
    $price=$order['price'];
    $total=$qty*$price;

    
    $sql2="UPDATE orders SET qty=$qty,total=$total,status='$status' where id=$id";
    $qu=mysqli_query($conn,$sql2);

    if($qu)
    {
            $_SESSION['success']="order updated succesfully";
            header("location: ../orders.php");       
    }

}

else
{

    header("location: ../orders.pho");

}










?>