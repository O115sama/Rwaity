<?php
$title = "لوحة التحكم"
?>
<?php include "../template/header.php"; ?>
<?php include "../db.php" ?>

<?php
if (!$_SESSION['role']){
    header('location:../index.php');
    exit();
}
?>

<?php
$product = mysqli_query($conn, 'SELECT * FROM `products`');
$order = mysqli_query($conn, 'SELECT * FROM orders ');
$user = mysqli_query($conn, 'SELECT * FROM users ');
$message = mysqli_query($conn, 'SELECT * FROM contact ');
$sales = mysqli_query($conn, 'SELECT SUM(price) AS total_sales FROM products WHERE sold = 1');


$result_product = mysqli_num_rows($product);
$result_order = mysqli_num_rows($order);
$result_user = mysqli_num_rows($user);
$result_message = mysqli_num_rows($message);
$result_sales = mysqli_fetch_assoc($sales);


?>

    <div class="container py-5 text-center">

        <div class="row">
            <!-- dashboard admin -->
            <div class="col-md-6">
                <div class="card mb-4 p-5 text-center shadow-sm">
                    <h5>اجمالي المبيعات</h5>
                    <h1><?php echo $result_sales['total_sales'] ?></h1>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4 p-5 text-center shadow-sm">
                    <h5> الفوائد </h5>
                    <h1><?php echo $result_sales['total_sales'] - ($result_sales['total_sales'] - ($result_sales['total_sales'] / 100 )* 20) ?></h1>
                </div>
            </div>


            <div class="col-md-3">
                <div class="card mb-4 p-5 text-center shadow-sm">
                    <h5>عدد المنتجات</h5>
                    <h1><?php echo $result_product ?></h1>
                    <div class="card-body">
                        <a href="products.php"><small class="card-text">عرض كل المنتجات</small></a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4 p-5 text-center shadow-sm">
                    <h5>عدد الطلبات</h5>
                    <h1><?php echo $result_order ?></h1>
                    <div class="card-body">
                        <a href="orders.php"><small class="card-text">عرض كل الطلبات</small></a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4 p-5 text-center shadow-sm">
                    <h5>عدد المستخدمين</h5>
                    <h1><?php echo $result_user ?></h1>
                    <div class="card-body">
                        <a href="users.php"><small class="card-text">عرض كل المستخدمين</small></a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4 p-5 text-center shadow-sm">
                    <h5>عدد الرسائل</h5>
                    <h1><?php echo $result_message ?></h1>
                    <div class="card-body">
                        <a href="messages.php"><small class="card-text">عرض كل الرسائل</small></a>
                    </div>
                </div>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
            <tr>
                <th scope="col">المنتج</th>
                <th scope="col">المالك</th>
                <th scope="col">المشتري</th>
                <th scope="col">حالة الطلب</th>
            </tr>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($conn->query("select p.subject as Product , w.name as Owner, u.name as Buyer, o.status as Status, o.id as Order_id FROM orders o INNER JOIN products p ON p.id = o.id_product INNER JOIN users u ON u.id = o.id_buyer INNER JOIN users w ON p.id_user = w.id") as $order){ ?>
                <tr >
                    <th scope="row"><?php echo $order['Product']?></th>
                    <th scope="row"><?php echo $order['Owner']?></th>
                    <th scope="row"><?php echo $order['Buyer']?></th>
                    <th scope="row">
                        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                            <?php

                            if(!$order['Status']){ ?>
                                <span>تحت المعالجة</span>

                                <?php
                            }else{ ?>
                                <span>مكتمل</span>
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

<?php include "../template/footer.php"; ?>

