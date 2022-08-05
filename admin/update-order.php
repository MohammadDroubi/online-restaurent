<?php 
require ("inc/header.php");
require ("handle/connection.php");


if(isset($_GET['id']))
{
    $id=$_GET['id'];
}

    $sql="SELECT * FROM orders where id=$id";
    $query=mysqli_query($conn,$sql);

    if(mysqli_num_rows($query)==1)
    {
        $order=mysqli_fetch_assoc($query);
    }

?>

<div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Update Order</h3>
                <div class="card">
                    <div class="card-body p-5">
                        <form action="handle/UpdateOrders.php?id=<?=$order['id']?>" method="POST">

                            <div class="form-group">
                              <label>Qty</label>
                              <input name="qty" value="<?=$order['qty']?>" type="text" class="form-control">
                            </div>

                            <select name="status" class="my-3">
                                <option <?php echo ($order['status']=="ordered")?"selected":"" ?> value="ordered">ordered</option>
                                <option <?php echo ($order['status']=="on delivery")?"selected":"" ?> value="on delivery">on delivery</option>
                                <option <?php echo ($order['status']=="delivered")?"selected":"" ?> value="delivered">delivered</option>
                                <option <?php echo ($order['status']=="cancelled")?"selected":"" ?> value="cancelled">cancelled</option>
                            </select>
                              
                            <div class="text-center mt-5">
                                <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                <a class="btn btn-dark" href="orders.php">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    
    




    </body>
</html>