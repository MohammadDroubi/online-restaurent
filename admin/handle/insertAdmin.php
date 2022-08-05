<?php       
require("connection.php");
session_start();

if(isset($_POST['submit']))
{
    
     $name=htmlspecialchars(trim($_POST['name']));
     $username=htmlspecialchars(trim($_POST['username']));
     $password=htmlspecialchars(trim($_POST['password']));


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
     else if (strlen($name)>50)
     {
        $errors[]="Name size must be less than 50";
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
     else if (strlen($username)>50)
     {
        $errors[]="User Name size must be less than 50";
     }

      //password validation

      if(empty($password))
     {
         $errors[]="password is requird";
     }
     elseif(!preg_match("#[0-9]+#",$password)) {
         $errors[] = "Your Password Must Contain At Least 1 Number!";
     }
     elseif(!preg_match("#[A-Z]+#",$password)) {
         $errors[] = "Your Password Must Contain At Least 1 Capital Letter!";
     }
     elseif(!preg_match("#[a-z]+#",$password)) {
         $errors[] = "Your Password Must Contain At Least 1 Lowercase Letter!";
     }

     $password=password_hash($password,PASSWORD_DEFAULT);



     if(empty($errors))
{
    $sql="INSERT INTO admins (`name`,`user_name`,`password`) values ('$name','$username','$password')";
    $query=mysqli_query($conn,$sql);

    if($query)
    {
        $_SESSION['success']="Admin added successfully";
        header("location: ../admin.php");
    }
    else
    {
       echo "something Wrong!!!";
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