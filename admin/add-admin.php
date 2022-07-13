<?php 
require ("inc/header.php");

?>

<div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Add Admin</h3>
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
                        <form action="handle/insertAdmin.php" method="POST">

                            <div class="form-group">
                              <label>Name</label>
                              <input name="name" type="text" class="form-control">
                            </div>

                            <div class="form-group">
                              <label>User Name</label>
                              <input name="username" type="text" class="form-control">
                            </div>

    

                            <div class="form-group">
                              <label>Password</label>
                              <input name="password" type="password" class="form-control">
                            </div>
                              
                            <div class="text-center mt-5">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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