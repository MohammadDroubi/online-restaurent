<?php 

    require("inc-front/header.php");

    if(isset($_GET['id']))
    {
        $id=$_GET['id'];

        $sql="select * from food where id=$id";
        $query=mysqli_query($conn,$sql);

        if(mysqli_num_rows($query)==1)
        {
            $res=mysqli_fetch_assoc($query);

            $fid=$res['id'];
            $tit=$res['title'];
            $price=$res['price'];
            $img=$res['image'];
        }
    }

    ?>


    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <img src="admin/uploads/food/<?=$img?>" class="img-responsive img-curve">
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?=$tit?></h3>
                        <input type="hidden" name="food" value="<?=$tit?>">
                        <p class="food-price"><?=$price?></p>
                        <input type="hidden" name="price" value="<?=$price?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="fullname"  class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email"  class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10"  class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

        </div>
    </section>

    <?php
     
     if(isset($_POST['submit']))
     {

        $food=$_POST['food'];
        $price=$_POST['price'];
        $qty=$_POST['qty'];
        $total=$price*$qty;
        $date=date("Y-m-d h:i:sa");
        $status="ordered";
        $fullname=$_POST['fullname'];
        $contant=$_POST['contact'];
        $email=$_POST['email'];
        $address=$_POST['address'];

        $sql99="INSERT INTO orders set food='$food',price=$price,qty=$qty,total=$total,date='$date',status='$status',customername='$fullname',customercontant='$contant',
        customeremail='$email',customeraddress='$address'";

        $query99=mysqli_query($conn,$sql99);

        if($query99)
        {
            $_SESSION['success']="order added successfully";
            header("location: index.php");
        }
        else
        {
            echo "Wrong!!!";
        }
        
     }
     else
     {
       
     }
     
     
     ?>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php
    require('inc-front/footer.php')
     ?>

     