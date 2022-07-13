<?php 
require ("inc/header.php");
require ("handle/connection.php");


if(isset($_GET['id']))
{
    $id=$_GET['id'];
}

    $sql="SELECT * FROM admins where id=$id";
    $query=mysqli_query($conn,$sql);

    if(mysqli_num_rows($query)==1)
    {
        $admin=mysqli_fetch_assoc($query);
    }

?>

<div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Update Admin</h3>
                <div class="card">
                    <div class="card-body p-5">


                    <?php 

                        if(isset($_SESSION['errors']))
                        {
                            foreach($_SESSION['errors'] as $error)
                            {
                                ?>
                                <div class="alert alert-danger"><?= $error?></div>
                                <?php
                            }
                        }
                        
                        unset($_SESSION['errors'])


                    ?>
                        <form action="handle/editAdmin.php?id=<?=$admin['id']?>" method="POST">

                            <div class="form-group">
                              <label>Name</label>
                              <input name="name" value="<?=$admin['name']?>" type="text" class="form-control">
                            </div>

                            <div class="form-group">
                              <label>User Name</label>
                              <input name="username" value="<?=$admin['user_name']?>" type="text" class="form-control">
                            </div>

    

                           
                              
                            <div class="text-center mt-5">
                                <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                <a class="btn btn-dark" href="admin.php">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    




    </body>
</html>