<?php 
require ("inc/header.php");

?>

<div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Add Categories</h3>
                <div class="card">
                    <div class="card-body p-5">


                        <form action="handle/insertCategories.php" method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                              <label>Title</label>
                              <input name="title" type="text" class="form-control">
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
                              <input class="ms-4" name="active" type="radio" value="1" checked>
                              <label>Yes</label>
                              <input name="active" type="radio" value="0">
                              <label >No</label>
                            </div>


                            <div class="form-group mt-4">
                              
                              <input name="img" type="file" class="form-control">
                            </div>
    

                            
                              
                            <div class="text-center mt-5">
                                <button type="submit" name="submit" class="btn btn-primary">Add</button>
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