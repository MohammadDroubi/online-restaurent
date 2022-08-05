<?php 

session_start();

require("connection.php");

if(isset($_POST['submit']))
{
    $title=$_POST['title'];

    $featured=$_POST['featured'];
    
    $active=$_POST['active'];

    $img=$_FILES['img'];

    if($_FILES['img']['name'])
    {
        $imgName=$img['name'];
        $imgTemp=$img['tmp_name'];

        $ext=end(explode(".",$imgName));

        $newName="Category".rand(0,1000).".".$ext;

        $dest="../uploads/categories/".$newName;
        
    }
    else
    {
        $newName="default.jpg";
    }


    $sql="insert into categories set title='$title',image='$newName',featured='$featured',active='$active'";

    $query=mysqli_query($conn,$sql);

    if($query)
    {

        move_uploaded_file($imgTemp,$dest);

        $_SESSION['success']="Categories added successfully";
        header("location: ../categories.php");
    }
   
}
else
{
    header("location: ../index.php");
}



?>