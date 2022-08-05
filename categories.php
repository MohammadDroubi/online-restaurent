
    <?php 

    require("inc-front/header.php");

    ?>



    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>



            <?php

                $sql44="SELECT * FROM categories";
                $que44=mysqli_query($conn,$sql44);

                if(mysqli_num_rows($que44)>0)
                {
                    while($ress=mysqli_fetch_assoc($que44))
                    {
                        $id=$ress['id'];
                        $title=$ress['title'];
                        $img=$ress['image'];

                        ?>
                        <a href="category-foods.php">
                        <div class="box-3 float-container">
                        <img src="admin/uploads/categories/<?=$img?>"  class="img-responsive img-curve">

                        <h3 class="float-text text-white"><?=$title?></h3>
                        </div>
            </a>


                        <?php
                    }
                }

            ?>

           

            

            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


    <?php
    require('inc-front/footer.php')
     ?>