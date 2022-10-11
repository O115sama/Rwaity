<?php
$title = "الطلبات"
?>
<?php include "../template/header.php"; ?>
<?php include "../db.php"; ?>
<?php
if ($_SESSION['id'] and !$_SESSION['role']){
    header('location:../index.php');
    exit();
}
?>
<div class="container d-flex align-items-center justify-content-center py-5">
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
                            <button type="submit" name="allowed" value="<?php echo  $order['Order_id']?>" class="btn btn-secondary">غير مكتمل</button>
                            <?php
                        }else{ ?>
                            <button type="submit" name="blocked" value="<?php echo  $order['Order_id']?>" class="btn btn-success">مكتمل</button>
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
    $query = 'UPDATE `orders` SET `status` = 1 WHERE `orders`.`id` ='.$_POST['allowed'];
}else{
    $query = 'UPDATE `orders` SET `status` = 0 WHERE `orders`.`id` ='.isset($_POST['blocked']);
}

if ($conn->query($query)){
    header("Refresh:0");
    exit();
}
?>



<?php include "../template/footer.php"; ?>
