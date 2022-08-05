<?php 
require ("inc/header.php");

require("handle/connection.php");

if(isset($_GET['id']))
{
    $id=$_GET['id'];

    $sql2="select * from food where id=$id";
    $query2=mysqli_query($conn,$sql2);

    if(mysqli_num_rows($query2)==1)
    {
        $res=mysqli_fetch_assoc($query2);
    }


    $feat=$res['features'];
    $act=$res['active'];
    $currCat=$res['catid'];
}
else
{
    header("location: food.php");
}




?>

<div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Update Food</h3>
                <div class="card">
                    <div class="card-body p-5">


                        <form action="handle/updateFood.php" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                              
                              <input name="id" value="<?=$res['id']?>" type="text" class="form-control">
                            </div>
                            
                            <div class="form-group">
                              <label>Title</label>
                              <input name="title" value="<?=$res['title']?>" type="text" class="form-control">
                            </div>

                            <label class="mt-2" for="floatingTextarea">Description</label>
                            <div class="form-floating mt-2">
                            <label class="mt-2" for="floatingTextarea"></label>
                            <textarea type="text"  name="fdesc"  class="form-control"  id="floatingTextarea"><?=$res['foodDesc']?></textarea>
                           
                            </div>

                            <div class="form-group">
                              <label>price</label>
                              <input name="price" value="<?=$res['price']?>"  type="text" class="form-control">
                            </div>

                            <div class="form-group mt-4 mb-2">
                              

                              <input name="img" type="file" class="form-control">


                            </div>

                            <div class="form-group mt-4 mb-2">
                              

                             <img src="uploads/food/<?=$res['image']?>" width="200px">


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
                                    $Catid=$res['id'];
                                    $title=$res['title'];
                                    ?>
                                    <option <?php if($currCat==$Catid){echo "selected";} ?> value="<?php echo $Catid ?>"><?php echo $title ?></option>
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
                              <input <?php if($feat==1){echo "checked";} ?> class="ms-2" name="featured" type="radio" value="1" >
                              <label >Yes</label>
                              <input <?php if($feat==0){echo "checked";} ?>   name="featured" type="radio" value="0">
                              <label >No</label>
                            </div>

                            <div class="form-group mt-2">
                              <label class="fs-5">active</label>
                              <input <?php if($act==1){echo "checked";} ?>  class="ms-4"  name="active" type="radio" value="1" >
                              <label>Yes</label>
                              <input <?php if($act==0){echo "checked";} ?>  type="radio" name="active" value="0" >
                              <label >No</label>
                            </div>


                           
    

                            
                              
                            <div class="text-center mt-5">
                                <button type="submit" name="submit" class="btn btn-primary">Update Food</button>
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