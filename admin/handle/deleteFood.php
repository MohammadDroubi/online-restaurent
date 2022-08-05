<?php 
session_start();
require("connection.php");
if(isset($_GET['id']))
{
    $id=$_GET['id'];

    $sql1="select * from food where id=$id";
    $query=mysqli_query($conn,$sql1);

    if(mysqli_num_rows($query)==1)
    {
        $res=mysqli_fetch_assoc($query);

        unlink("../uploads/food/".$res['image']);

        $sql="DELETE FROM food where id=$id";

        $que=mysqli_query($conn,$sql);

        if($que)
        {
            $_SESSION['success']="food deleted successfully";
            header("location: ../food.php");
        }
    }
    else

    {
        echo "no data to return" ; 
    }


    

    
}
else
{
    header("location: ../food.php");
}




?>