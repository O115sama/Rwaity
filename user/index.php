<?php
    $title = "لوحة التحكم"
?>
<?php include "../template/header.php"; ?>
<?php include "../db.php" ?>
<?php
if (!$_SESSION['id']){
    header('location:../index.php');
    exit();
}
?>
<?php
$order = mysqli_query($conn, 'SELECT * FROM orders  WHERE id_buyer ='.$_SESSION['id']);
$product = mysqli_query($conn, 'SELECT * FROM `products` WHERE sold = 0 and id_user  = '.$_SESSION['id']);
$result_product = mysqli_num_rows($product);
$result_order = mysqli_num_rows($order);



?>

            <div class="container text-right py-5">
                <div class="row">

                    <!-- dashboard user -->
                    <div class="col-md-6">
                        <div class="card mb-4 p-5 text-center shadow-sm">
                            <h5>عند المنتجات</h5>
                            <h1><?php echo $result_product ?></h1>
                            <div class="card-body">
                                <a href="product.php"><small class="card-text">عرض كل المنتجات</small></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4 p-5 text-center shadow-sm">
                            <h5>عدد الطلبات</h5>
                            <h1><?php echo $result_order ?></h1>
                            <div class="card-body">
                                <a href="order.php"><small class="card-text">عرض كل الطلبات</small></a>
                            </div>
                        </div>
                    </div>

                <table class="table text-right">
                    <thead>
                    <h5 class="p-2">اخر الطلبات</h5>
                    <tr>
                        <th scope="col">رقم الطلب</th>
                        <th scope="col">المنتج</th>
                        <th scope="col">وسيلة الدفع</th>
                        <th scope="col">حالة الطلب</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    //
                    foreach ($conn->query('select p.subject as Product , w.name as Owner, u.name as Buyer, o.status as Status, o.id as Order_id, o.payment as Payment FROM orders o INNER JOIN products p ON p.id = o.id_product INNER JOIN users u ON u.id = o.id_buyer INNER JOIN users w ON p.id_user = w.id WHERE id_buyer ='.$_SESSION['id']) as $order){ ?>
                        <tr>
                            <td><?php echo $order['Order_id']?></td>
                            <td><?php echo $order['Product']?></td>
                            <td><?php echo $order['Payment']?></td>
                            <td>
                                <?php

                                if($order['Status']){ ?>
                                    <span>مكتمل</span>
                                    <?php
                                }else{ ?>
                                    <span>تحت الاجراء</span>
                                <?php }
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>

<?php include "../template/footer.php"; ?>