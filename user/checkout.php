<?php
$title = "checkout"
?>
<?php include "../template/header.php"; ?>
<?php include "../db.php"; ?>

    <div class="container">
        <div class="py-5 text-center">
            <h2>انهاء الطلب</h2>
        </div>
        <div class="row py-5">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">السلة</span>
                </h4>
                <ul class="list-group mb-3">
                <?php $total = 0 ?>
                <?php foreach ($conn->query('SELECT * FROM `cart` INNER JOIN products ON products.id = id_product WHERE id_buyer ='.$_SESSION['id'].' and sold = 0') as $cart){ ?>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0"><?php echo $cart['subject'] ?></h6>
                        </div>
                        <span class="text-muted"><?php echo $cart['price'] ?></span>
                    </li>
                    <?php $total += $cart['price'] ?>
                <?php } ?>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>(ر.س)</span>
                        <strong>
                            <?php
                            echo $total;
                            ?>
                        </strong>
                    </li>
                </ul>
            </div>
            <div class="col-md-8 order-md-1 text-right">
                <h4 class="mb-3 ">العنوان</h4>
                    <div class="row">
                        <?php
                        $query = mysqli_query($conn, 'SELECT * FROM `users` WHERE id = '.$_SESSION['id']);
                        $user = mysqli_fetch_assoc($query);
                        ?>
                        <div class="col-md-6 mb-3">
                            <label for="country">الدولة</label>
                            <input type="text" class="form-control" disabled value="<?php echo $user['country'] ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="city">المدينة</label>
                            <input type="text" class="form-control" disabled value="<?php echo $user['city'] ?>">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="address">وصف تقريبي للمنزل</label>
                            <input type="text" class="form-control" name="address" id="address" disabled value="<?php echo $user['description'] ?>">
                        </div>
                    </div>
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <h4 class="mb-3">وسيلة الدفع</h4>
                    <div class="d-block my-3 ">
                        <div class="custom-control custom-radio">
                            <input id="cash" name="payment" value="الدفع عند الاستلام" type="radio" class="custom-control-input" checked required>
                            <label class="custom-control-label" for="cash">الدفع عند الاستلام</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="transfer" name="payment" value="تحويل بنكي " type="radio" class="custom-control-input" >
                            <label class="custom-control-label" for="transfer">تحويل بنكي <span class="text-muted">(IBAM SA0380000000608010167519)</span></label>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-secondary btn-lg btn-block" type="submit">اكمال الطلب</button>
                </form>
            </div>
        </div>
        <?php



if ($_POST){


    foreach ($conn->query('SELECT * FROM `cart` WHERE id_buyer = '.$_SESSION['id']) as $cart){

        $id_buyer = $cart['id_buyer'];
        $id_product = $cart['id_product'];
        $payment = $_POST['payment'];
        date_default_timezone_set("Asia/Riyadh");
        $created = date("Y-m-d");

        if ($conn->query("INSERT INTO `orders` (`id`, `id_buyer`,`id_product`, `payment`, `status`, `created_at`) VALUES (NULL, '$id_buyer','$id_product', '$payment', false , '$created');")){
            $conn->query("DELETE FROM `cart` WHERE id_product = '$id_product'");
            $conn->query("UPDATE `products` SET `sold` = '1' WHERE `products`.`id` = ".$id_product);
        }else{
            echo "error";
        }

    }
    header("Location:order.php");
    exit;
}
?>
<?php include "../template/footer.php"; ?>


