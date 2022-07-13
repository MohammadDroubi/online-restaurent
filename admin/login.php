<?php 

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Log in</h3>
                <div class="card">
                    <div class="card-body p-5">

                    <ul>

                
                    <?php

                                if(isset($_SESSION['err']))
                                {
                                   foreach($_SESSION['err'] as $err)
                                   {
                                    ?>
                                      <li> <div class="alert alert-danger"><?=$err?></div> </li> 
                                    <?php
                                   }
                                }

                              
                                unset($_SESSION['err']);


                        ?>
                            </ul>
                        <form action="handle/log.php" method="POST">

                           

                            <div class="form-group">
                              <label>User Name</label>
                              <input name="username" type="text" class="form-control">
                            </div>

    

                            <div class="form-group">
                              <label>Password</label>
                              <input name="password" type="password" class="form-control">
                            </div>
                              
                            <div class="text-center mt-5">
                                <button type="submit" name="submit" class="btn btn-primary">log in</button>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    




    </body>
</html>