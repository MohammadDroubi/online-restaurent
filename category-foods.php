<?php 

    require("inc-front/header.php");

    if(isset($_GET['id']))
    {
        $id=$_GET['id'];

        $sql="select * from categories where id=$id"; 
        $query=mysqli_query($conn,$sql);

        if(mysqli_num_rows($query)>0)
        {
            $res=mysqli_fetch_assoc($query);
        }

        $cat=$res['title'];
    

    }
    else
    {
        header("location: index.php");
    }

    ?>


    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white">"<?=$cat?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

           
            <?php
            
            $sql0="select * from food where catid=$id";
            $query0=mysqli_query($conn,$sql0);

            if(mysqli_num_rows($query0)>0)
            {
                while($res0=mysqli_fetch_assoc($query0))
                {
                    $id=$res0['id'];
                    $title=$res0['title'];
                    $desc=$res0['foodDesc'];
                    $price=$res0['price'];
                    $img=$res0['image'];

                    ?>
                     <div class="food-menu-box">
                    <div class="food-menu-img">
                    <img src="admin/uploads/food/<?=$img?>" class="img-responsive img-curve">
                     </div>

                     <div class="food-menu-desc">
                    <h4><?=$title?></h4>
                    <p class="food-price"><?=$price?></p>
                    <p class="food-detail">
                    <?=$desc?>
                    </p>
                    <br>

                    <a href="order.php?id=<?=$id?>" class="btn btn-primary">Order Now</a>
                    </div>
                     </div>

                    <?php
                }
            }
            else
            {
                ?>

                <div class="alert alert-danger">nothing to Show!!!</div>
                <?php
            }

            
            ?>
           

           

           
            


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php
    require('inc-front/footer.php')
     ?>