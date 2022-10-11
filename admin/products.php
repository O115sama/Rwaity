<?php
    $title = "المنتجات"
?>
<?php include "../template/header.php"; ?>
<?php include "../db.php"; ?>
<?php
if (!$_SESSION['id'] and !$_SESSION['role']){
    header('location:../index.php');
    exit();
}
?>
    <div class="container d-flex align-items-center justify-content-center py-5">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">البائع</th>
                <th scope="col">العنوان</th>
                <th scope="col">المؤلف</th>
                <th scope="col">الوصف</th>
                <th scope="col">السعر</th>
                <th scope="col">حالة المنتج</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($conn->query('SELECT * FROM users INNER JOIN products on products.id_user = users.id ') as $product){ ?>
                <tr >
                    <th scope="row"><?php echo $product['name']?></th>
                    <th scope="row"><?php echo $product['subject']?></th>
                    <th scope="row"><?php echo $product['author']?></th>
                    <th scope="row"><?php echo mb_strimwidth($product['description'], 0, 100)?></th>
                    <th scope="row"><?php echo $product['price']?></th>
                    <th scope="row">
                        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                            <?php
                            if(!$product['status']){ ?>
                                <button type="submit" name="allowed" value="<?php echo  $product['id']?>" class="btn btn-secondary">غير مسموح</button>
                                <?php
                            }else{ ?>
                                <button type="submit" name="blocked" value="<?php echo  $product['id']?>" class="btn btn-success">مسموح</button>
                            <?php }
                            ?>
                        </form>
                    </th>
                </tr>
                <?php
            } ?>
            </tbody>
        </table>
    </div>

<?php
if (isset($_POST['allowed'])){
    $query = 'UPDATE `products` SET `status` = 1 WHERE `products`.`id` ='.$_POST['allowed'];
}else{
    $query = 'UPDATE `products` SET `status` = 0 WHERE `products`.`id` ='.isset($_POST['blocked']);
}
if ($conn->query($query)){
    header("Refresh:0");
}
?>



<?php include "../template/footer.php"; ?>