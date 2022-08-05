<?php 

    require("inc-front/header.php");

    ?>


    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            
    <?php
    
    $sql55="select * from food where active=1";
    $que55=mysqli_query($conn,$sql55);

    if(mysqli_num_rows($que55)>0)
    {

        while($res1=mysqli_fetch_assoc($que55))
        {
            $id=$res1['id'];
            $title=$res1['title'];
            $desc=$res1['foodDesc'];
            $price=$res1['price'];
            $imgg=$res1['image'];
    
            ?>
                    <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="admin/uploads/food/<?=$imgg?>" class="img-responsive img-curve">
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

    
    
    ?>
           

            

          

           

           

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php
    require('inc-front/footer.php')
     ?>