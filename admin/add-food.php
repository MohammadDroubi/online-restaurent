<?php 
require ("inc/header.php");

require("handle/connection.php");

?>

<div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Add Food</h3>
                <div class="card">
                    <div class="card-body p-5">


                        <form action="handle/insertfood.php" method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                              <label>Title</label>
                              <input name="title" type="text" class="form-control">
                            </div>

                            <label class="mt-2" for="floatingTextarea">Description</label>
                            <div class="form-floating mt-2">
                            <label class="mt-2" for="floatingTextarea"></label>
                            <textarea  name="fdesc" class="form-control"  id="floatingTextarea"></textarea>
                           
                            </div>

                            <div class="form-group">
                              <label>price</label>
                              <input name="price" type="text" class="form-control">
                            </div>

                            <div class="form-group mt-4 mb-2">
                              
                              <input name="img" type="file" class="form-control">
                            </div>

                            <div class="form-floating mt-4 mb-3">

                            <select name="catId" class="form-select w-50 " >
                            
                            <?php
                            
                            $sql="select * from categories where active=1";
                            $query=mysqli_query($conn,$sql);

                            if(mysqli_num_rows($query)>0)
                            {
                               

                                while( $res=mysqli_fetch_assoc($query))
                                {
                                    $id=$res['id'];
                                    $title=$res['title'];
                                    ?>
                                    <option value="<?php echo $id ?>"><?php echo $title ?></option>
                                    <?php

                                }
                            }
                            else
                            {
                                ?>

                                        <option value="0">no catagory</option>

                                <?php

                            }
                            

                            ?>


                            
                             
                            

                             </select>
                            
                            </div>

                            <div class="form-group mt-2">
                              <label class="fs-5 ">featured</label>
                              <input class="ms-2" name="featured" type="radio" value="1">
                              <label >Yes</label>
                              <input class="sel"  name="featured" type="radio" value="0" checked>
                              <label >No</label>
                            </div>

                            <div class="form-group mt-2">
                              <label class="fs-5">active</label>
                              <input class="ms-4"  name="active" type="radio" value="1" checked>
                              <label>Yes</label>
                              <input type="radio" name="active" value="0">
                              <label >No</label>
                            </div>


                           
    

                            
                              
                            <div class="text-center mt-5">
                                <button type="submit" name="submit" class="btn btn-primary">Add Food</button>
                                <a class="btn btn-dark" href="categories.php">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    




    </body>
</html>