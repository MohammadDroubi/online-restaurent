<?php 
require ("inc/header.php");
require("handle/connection.php");


if(isset($_GET['id']))
{
    $id=$_GET['id'];    
}

$sql="select * from categories where id=$id";
$query=mysqli_query($conn,$sql);

if(mysqli_num_rows($query)==1)
{
    $cat=mysqli_fetch_assoc($query);
}





?>

<div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Update Categories</h3>
                <div class="card">
                    <div class="card-body p-5">


                        <form action="handle/UpdateCategories.php" method="POST" enctype="multipart/form-data">

                                <input name="id" type="hidden" value="<?php echo  $cat['id']?>">

                            <div class="form-group">
                              <label>Title</label>
                              <input name="title" value="<?php echo $cat['title']  ?>" type="text" class="form-control">
                            </div>

                            <div class="form-group mt-2">
                              <label class="fs-5  ">featured</label>
                              <input class="ms-2"  name="featured" type="radio" value="1" <?php echo ($cat['featured']==1)?"checked":"" ?>>
                              <label >Yes</label>
                              <input name="featured" type="radio" value="0" <?php echo ($cat['featured']==0)?"checked":"" ?>>
                              <label >No</label>
                            </div>




                            <div class="form-group mt-2">
                              <label class="fs-5">active</label>
                              <input class="ms-4" name="active" type="radio" value="1" <?php echo ($cat['active']==1)?"checked":"" ?>>
                              <label>Yes</label>
                              <input name="active" type="radio" value="0" <?php echo ($cat['active']==0)?"checked":"" ?>>
                              <label >No</label>
                            </div>


                            <div class="form-group mt-4">
                              
                              <input name="img" type="file" class="form-control">

                            </div>

                            <div>
                                <img src="uploads/categories/<?php echo $cat['image'] ?>" width="150px" class="mt-2">
                            </div>
    

                            
                              
                            <div class="text-center mt-5">
                                <button type="submit" name="submit" class="btn btn-primary">Update</button>
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