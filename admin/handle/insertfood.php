<?php

require("connection.php");
session_start();


if(isset($_POST['submit']))
{
     $title=$_POST['title'];
     $desc=$_POST['fdesc'];
     $price=$_POST['price'];
     $img=$_FILES['img'];
     $catid=$_POST['catId'];
     $featured=$_POST['featured'];
     $active=$_POST['active'];

     if(isset($img['name']))
     {
        $name=$img['name'];
        $scr=$img["tmp_name"];

        $ext=end(explode(".",$name));

        $newName="food-".rand(0,9000).".".$ext;

        $dest="../uploads/food/".$newName;
        
     }
     else
     {
        $newName="";
     }

     $sql="INSERT INTO food set title='$title', foodDesc='$desc', price='$price', image='$newName' , catid=$catid,features=$featured,active=$active";

     $res=mysqli_query($conn,$sql);

     if($res && $img['name'])
     {
        $_SESSION['success']="food added successfully";
        header("location: ../food.php");
        move_uploaded_file($scr,$dest);
     }
     else
     {
        echo "wrong!!!";
     }


}
else
{
    header("location: ../add-food.php");
}



?>