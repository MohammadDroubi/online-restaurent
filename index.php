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

    <?php 
    
    if(isset($_SESSION['success']))
    {
        ?>

        <div style="color:green;font-size:26px;text-align:center;margin-top:1% "><?=$_SESSION['success']?></div>
        <?php

        
    }
    
    unset($_SESSION['success']);
    
    
    ?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php

                $sql22="SELECT * FROM categories where active=1 and featured=1 limit 3 ";
                $que=mysqli_query($conn,$sql22);

                if(mysqli_num_rows($que)>0)
                {
                    while($result=mysqli_fetch_assoc($que))
                    {
                     $id=$result['id'];
                     $title=$result['title'];
                     $img=$result['image'];

                     ?>
                     <a href="category-foods.php?id=<?=$id?>">
                     <div class="box-3 float-container">
                     <img src="admin/uploads/categories/<?=$img?>"  class="img-responsive img-curve">
                     <h3 class="float-text text-white"><?=$title?></h3>
                    </div>
            </a>

                    <?php
                    }
                }
                else
                {
                    ?>
                    <div class="alert alert-danger">nothing to</div>
                    <?php
                }
                
            
            ?>

           

           

           

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php

                $sql33="SELECT * FROM food where active=1 and features=1 limit 6";
                $query33=mysqli_query($conn,$sql33);

                if(mysqli_num_rows($query33)>0)
                {
                    while($res=mysqli_fetch_assoc($query33))
                    {
                        $id=$res['id'];
                        $title=$res['title'];
                        $desc=$res['foodDesc'];
                        $price=$res['price'];
                        $imgg=$res['image'];

                        ?>
                 <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="admin/uploads/food/<?php echo $imgg ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
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
                        <div class="alert alert-danger">nothing to show!!!!</div>
                    <?php
                }
            
            
            
            
            ?>

           
           

            

           


            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="foods.php">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php
    require('inc-front/footer.php');
    ?>