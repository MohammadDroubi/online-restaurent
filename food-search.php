<?php 

    require("inc-front/header.php");

    $search=$_POST['search'];

    ?>

    


    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on Your Search <a href="#" class="text-white">"<?=$search?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>


            <?php

                    $sql70="SELECT * FROM food where title like '%$search%' or foodDesc like '%$search%'";
                    $query70=mysqli_query($conn,$sql70);

                    if(mysqli_num_rows($query70)>0)
                    {

                        while($res5=mysqli_fetch_assoc($query70))
                        {
                            $id=$res5['id'];
                            $title=$res5['title'];
                            $desc=$res5['foodDesc'];
                            $price=$res5['price'];
                            $img=$res5['image'];

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
                        <div class="alert alert-danger">food not found</div>
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