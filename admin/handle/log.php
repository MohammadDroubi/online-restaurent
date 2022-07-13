<?php 

require("connection.php");
session_start();

if(isset($_POST['submit']))
{
    $username=htmlspecialchars(trim($_POST['username'])) ;
    $password=htmlspecialchars(trim($_POST['password'])) ;

    $err=[];
  
    $sql="SELECT * FROM admins where user_name='$username'";
    $query=mysqli_query($conn,$sql);

    if(mysqli_num_rows($query)==1)
    {
        $admin=mysqli_fetch_assoc($query);


        $adminPass=$admin['password'];

    if(password_verify($password,$adminPass))
    {
        $_SESSION['adminid']=$admin['id'];
        header("location: ../admin.php");
    }
    else
    {
        $err[]="Wrong User Name or password..try again!";
        header("location: ../login.php");
        
    }
    }

    else
    {
        $err[]="Wrong User Name or password..try again!";
        header("location: ../login.php");
    }

    $_SESSION['err']=$err;

}



else
{
    header("location: ../login.php");
}


?>