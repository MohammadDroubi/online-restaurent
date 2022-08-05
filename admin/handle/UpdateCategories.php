<?php 
session_start();
require("connection.php");

if(isset($_POST['id']))
{

    $id=$_POST['id'];

    $sql="select * from categories where id=$id";
    $query=mysqli_query($conn,$sql);

    if(mysqli_num_rows($query)==1)
    {
        $cat=mysqli_fetch_assoc($query);
    }

    $title=$_POST['title'];
    $featured=$_POST['featured'];
    $active=$_POST['active'];
    $oldImage=$cat['image'];
    
    
    
    if($_FILES['img']['name'])
    {
        $imgName=$_FILES['img']['name'];
        $imgTemp=$_FILES['img']['tmp_name'];

        $ext=end(explode(".",$imgName));

        $newName="Category".rand(2000,100000).".".$ext;

        $dest="../uploads/categories/".$newName;
       
        
    }
    else
    {
        $newName=$oldImage;
    }


    $sql="UPDATE categories set title='$title',image='$newName',featured='$featured',active='$active' where id=$id";

    $res=mysqli_query($conn,$sql);

    if($res)
    {
        if($_FILES['img']['name'])
        {
            move_uploaded_file($imgTemp,$dest);
            unlink("../uploads/categories/".$oldImage);
        }
        $_SESSION['success']="categories updated successfully";
        header("location: ../categories.php");
        
    }
    else
    {
        echo "Wrong!!!!";
    }

   


   

    

}
else
{
    header("location: ../categories.php");
}




?>