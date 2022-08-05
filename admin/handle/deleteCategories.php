<?php 
require("connection.php");
session_start();
if(isset($_GET['id']))
{
    $id=$_GET['id'];


        $sql="select * from categories where id=$id";
        $res=mysqli_query($conn,$sql);


    


    if(mysqli_num_rows($res)==1)
    {
        $cat=mysqli_fetch_assoc($res);
        $sql="DELETE FROM categories where id=$id";
        $query=mysqli_query($conn,$sql);

        if($query)
        {
            $_SESSION['success']="categories deleteed successfully";
            header("location: ../categories.php");
            unlink("../uploads/categories/".$cat['image']);
        }
        
    }
    else
    {
        echo "Wrong!!!";
    }
}
else
{
    header("location: ../categories.php");
}





?>