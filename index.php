<?php
    $title = "الرئيسية"
?>
<?php include "template/header.php"; ?>
<?php include "db.php"?>
    <div class="py-5">
        <div class="container">
            <!-- Search -->
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <div class="input-group  w-75 text-center" style="margin: auto; ">
                    <input type="text" class="form-control" placeholder="ابحث باسم الكتاب" aria-label="ابحث باسم الكتاب" aria-describedby="basic-addon1" name="search">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-secondary" type="submit">ابحث</button>
                    </div>
                </div>
            </form>

            <!-- Category -->
            <div class="w-90 text-center p-5" style="margin: auto;">
                <div class="" role="group" aria-label="Basic example" >
                    <form action="" method="get">
                    <?php foreach ($conn->query('SELECT * FROM `category`') as $category) { ?>
                        <button type="submit" name="category" value="<?php echo $category['id']?>" class="btn btn-outline-dark m-1"><?php echo $category['name']?></button>
                        <?php
                     } ?>
                        <button type="submit" name="category" value="0" class="btn btn-outline-dark m-1">عرض الكل</button>
                    </form>
                </div>
            </div>

            <!-- show product -->
            <div class="row">
                <?php
                if (isset($_POST['search'])){
                    $query = "SELECT * FROM `products` WHERE `status` = 1 and `sold` =0 and `subject` LIKE '%".$_POST['search']."%'";
                }elseif (isset($_GET['category']) and $_GET['category'] > 0){
                    $query = "SELECT * FROM `products` INNER JOIN category ON category.id = products.id_category WHERE `status` = 1 and `sold` =0 and category.id =".$_GET['category'];
                }else{
                    $query = "SELECT * FROM products  where `status` = 1 and `sold` =0";
                }
                foreach ($conn->query($query) as $product){ ?>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="images/<?php echo $product['image']?>" style="height: 450px; width: 100%; display: block;">
                            <div class="card-body card-body text-right">
                                <small class="card-text">العنوان <b><?php echo $product['subject']?></b></small><br>
                                <small class="card-text">المؤلف <b><?php echo $product['author']?></b></small><br>
                                <small class="card-text">السعر <b><?php echo $product['price']?></b></small><br>
                                <small class="card-text text-justify"><?php echo mb_strimwidth($product['description'], 0, 100, "...")?></small>
                                <div class="text-center">
                                    <?php if(!$_SESSION['role']){ ?>

                                        <form action="user/show.php" method="post">
                                        <div class="btn-group text-center pt-3">
                                        <button type="submit" name="id_product" value="<?php echo $product['id'] ?>"  class="btn btn-sm btn-block btn-secondary ">عرض المنتج</button>
                                        </div>
                                        </form>
                                        <?php } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>



<?php include "template/footer.php"; ?>
