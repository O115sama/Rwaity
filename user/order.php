<?php
    $title = "الطلبات"
?>
<?php include "../template/header.php"; ?>
<?php include "../db.php"; ?>

<?php
if (!$_SESSION['id']){
    header('location:../index.php');
    exit();
}
?>

<div class="container text-center py-5">
    <table class="table table-sm ">
        <h3>المشتريات</h3>
        <thead>
        <tr>
            <th>المنتج</th>
            <th>وسيلة الدفع</th>
            <th>السعر</th>
            <th>حالة الطلب</th>
        </tr>
        </thead>
        <tbody>
        <?php
        //
        foreach ($conn->query('SELECT * FROM orders inner JOIN products ON products.id = id_product WHERE id_buyer ='.$_SESSION['id']) as $order){ ?>
        <tr>
            <td><?php echo $order['subject']?></td>
            <td><?php echo $order['payment']?></td>
            <td><?php echo $order['price']?></td>
            <?php
            $query = mysqli_query($conn,'SELECT * FROM `orders` where id_product ='.$order['id_product']);
            $result = mysqli_fetch_assoc($query);
            ?>
            <td><?php
                if ($result['status']){
                    echo "مكتمل";
                }else{
                    echo "تحت الاجراء";
                }
                ?></td>
        </tr>
            <?php } ?>
        </tbody>
    </table>

    <table class="table table-sm">
        <h3>المبيعات</h3>
        <thead>
        <tr>
            <th>المنتج</th>
            <th>وسيلة الدفع</th>
            <th>السعر</th>
            <th>حالة الطلب</th>
        </tr>
        </thead>
        <tbody>
        <?php
        //
        foreach ($conn->query('SELECT * FROM products inner JOIN orders ON orders.id_product = products.id WHERE `sold` = 1 and id_user = '.$_SESSION['id']) as $order){ ?>
            <tr>
                <td><?php echo $order['subject']?></td>
                <td><?php echo $order['payment']?></td>
                <td><?php echo $order['price'] - ($order['price'] / 100) * 20 ?></td>

                <?php
                $query = mysqli_query($conn,'SELECT * FROM `orders` where id_product ='.$order['id_product']);
                $result = mysqli_fetch_assoc($query);
                ?>
                <td><?php
                    if ($result['status']){
                        echo "مكتمل";
                    }else{
                        echo "تحت الاجراء";
                    }
                    ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<?php include "../template/footer.php"; ?>