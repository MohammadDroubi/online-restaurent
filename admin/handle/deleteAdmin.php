<?php 

    require("connection.php");
    session_start();


        if(isset($_GET['id']))
        {
            $id=$_GET['id'];
            
            $sql="DELETE FROM ADMINS WHERE id=$id";

            $query=mysqli_query($conn,$sql);

            if($query)
            {
                $_SESSION['delete']="Admin deleted successfully";
                header("location: ../admin.php");
            }
            else
            {
                echo "user not found";
            }
            

        }

        else
        {
            header("location: ../admin.php");
        }


?>