<?php
    $title = "المنتجات"
?>
<?php include "../template/header.php"; ?>
<?php include "../db.php"; ?>

    <div class="py-5">
        <div class="container text-right">
            <div class="row">
                <?php
                foreach ($conn->query('SELECT * FROM products  WHERE sold = 0 and id_user ='.$_SESSION['id']) as $product){ ?>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="../images/<?php echo $product['image']?>" style="height: 450px; width: 100%; display: block;">
                            <div class="card-body">
                                <small class="card-text"><b>العنوان <?php echo $product['subject']?></b></small><br>
                                <small class="card-text"><b>المؤلف  <?php echo $product['author']?></b></small><br>
                                <small class="card-text"><b>السعر  <?php echo $product['price']?></b></small><br>
                                <small class="card-text"><?php echo mb_strimwidth($product['description'], 0, 100, "...") ?></small>
                                <div class="text-center">
                                    <div class="btn-group w-75 pt-3">
                                        <form action="edite.php" method="post" class="btn-group w-75 pt-3">
                                            <button type="submit" class="btn btn-sm btn-outline-secondary" name="id_product_edit" value="<?php echo $product['id'] ?>" >تعديل</button>
                                        </form>
                                        <form action="" method="post" class="btn-group w-75 pt-3">
                                            <button type="submit" class="btn btn-sm btn-outline-secondary" name="id_product_delete" value="<?php echo $product['id'] ?>" >حذف</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="col-md-4 text-right" >
                    <a href="create.php">
                        <button type="submit" name="category" value="" class="btn btn-outline-dark">انشاء منتج</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

<?php
if (isset($_POST['id_product_delete'])) {
    $id_product_delete = $_POST['id_product_delete'];
    $query = 'DELETE FROM `products` WHERE `products`.`id` =' . $id_product_delete;
    if ($conn->query($query)){
        header("Refresh:0");
        exit;
    }

}
?>

<?php include "../template/footer.php" ?>


