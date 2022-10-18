<?php
$title = "عرض المنتج"
?>
<?php include "../template/header.php"; ?>
<?php include "../db.php"; ?>

<?php
    if($_POST['id_product']){

        $_SESSION['id_product_show'] = $_POST['id_product'];

    }
?>

<div class="container py-5">
        <div class=" text-center">
            <h2>عرض المنتج</h2>
        </div>
        <div class="row">

        <?php 
        foreach($conn->query('SELECT * FROM `products` where id ='.$_SESSION['id_product_show']) as $product){
        ?>
            <div class="col-md-4 order-md-2 mb-4">
            <img class="card-img-top border" src="../images/<?php echo  $product['image'] ?>" style="height: 450px; width: 100%; display: block;">
            </div>
            <div class="col-md-8 py-5 order-md-1 text-right">
                    <div class="row">
                        <div class="card-body d-flex flex-column align-items-start">
                        <h5 class=" mb-2 ">العنوان : <?php echo  $product['subject'] ?></h5>
                        <h5 class=" mb-2 ">المؤلف : <?php echo  $product['author'] ?></h5>
                        <h5 class=" mb-2 ">السعر : <?php echo  $product['price'] ?></h5>
                        <h5 class=" mb-2 ">الوصف</h5>
                        <p class=" mb-auto text-justify"> <?php echo  $product['description'] ?></p>
                        </div>
                    </div>
            <div>                   

                <form action="" method="post">
                                    <div class="text-center pt-3">
                                        <?php
                                        if ($_SESSION['id'] and $product['id_user'] == $_SESSION['id']){ ?>
                                            <!-- owner -->
                                            <button class="btn btn-secondary btn-lg btn-block" disabled  type="submit" disable >انت المالك</button>

                                            <?php
                                        }elseif($_SESSION['id']){ ?>
                                            <!-- auth -->
                                            <button class="btn btn-secondary btn-lg btn-block" type="submit" name="add_cart" value="<?php echo $product['id'] ?>" >اضف للسلة</button>
                                        <?php }else{ ?>
                                            <!-- gist -->
                                            <a href="../auth/login.php" >
                                            <button type="button" class="btn btn-secondary btn-lg btn-block" >سجل دخول</button>
                                            </a>
                                        <?php }
                                        ?>
                                    </div>
                                    </form>

            </div>
        <?php
        } ?>

        </div>
    </div>
        

<?php
    if (isset($_POST['add_cart'])){
        $id_puyer = $_SESSION['id'] ;
        $id_product = $_POST['add_cart'] ;

        $query = "INSERT INTO `cart` (`id`, `id_buyer`, `id_product`) VALUES (NULL, '$id_puyer', '$id_product');";
        if ($conn->query($query)){
        }
}
?>
<?php include "../template/footer.php"; ?>


