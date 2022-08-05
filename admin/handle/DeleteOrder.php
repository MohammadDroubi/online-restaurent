<?php

require("connection.php");
session_start();


if(isset($_GET['id']))
{
    $id=$_GET['id'];

    $sql="select * from orders where id=$id";
    $query=mysqli_query($conn,$sql);

if(mysqli_num_rows($query)==1)
{
    $sql2="delete from orders where id=$id";
    $qu=mysqli_query($conn,$sql2);

    if($qu)
    {
        $_SESSION['delete']="order deleted sucessfully";
        header("location: ../orders.php");        
    }
}
else
{
    echo "Nothing!!!!!!";
}
}
else
{
    echo "ro7 el3b b3ed";
}







?>