<?php       
require("connection.php");
session_start();

if(isset($_GET['id']))
{
   $id=$_GET['id'];

   $name=htmlspecialchars(trim($_POST['name']));
   $username=htmlspecialchars(trim($_POST['username']));
     


     //name validation
    $errors=[];

     if(empty($name))
     {
        $errors[]="name is requierd";
     }
     else if (is_numeric($name))
     {
        $errors[]="name should be string";
     }
     else if (strlen($name)>100)
     {
        $errors[]="name size should be less than 50";
     }

      //user name validation
     if(empty($username))
     {
        $errors[]="user name is requierd";
     }
     else if (is_numeric($username))
     {
        $errors[]="user name should be string";
     }
     else if (strlen($username)>100)
     {
        $errors[]="user name size should be less than 50";
     }



     if(empty($errors))
{

   $sql="UPDATE ADMINS SET name='$name',user_name='$username' where id=$id";
   $query=mysqli_query($conn,$sql);

   if($query)
   {
      $_SESSION['update']="admin updated successfully";
      header("location: ../admin.php");
   }
   
   

}
else
{
    $_SESSION['errors']=$errors;
    header("location: ../add-admin.php");
    
}

}

else
{
    header("location: ../add-admin.php");
}


?>