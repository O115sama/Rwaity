<?php
    $title = "الرسائل"
?>
<?php include "../template/header.php"; ?>
<?php include "../db.php"; ?>
<?php
if (!$_SESSION['role']){
    header('location:../index.php');
    exit();
}
?>

    <div class="container d-flex align-items-center justify-content-center py-5">
        <table class="table text-right">
            <thead>
            <tr>
                <th scope="col">من</th>
                <th scope="col">وسيلة الاتصال</th>
                <th scope="col">الرسالة</th>
                <th scope="col">تاريخ الرسالة</th>
                <th scope="col">الاجراء</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($conn->query('SELECT * FROM `contact`') as $message){ ?>
                <tr >
                    <th scope="row"><?php echo $message['name']?></th>
                    <th scope="row"><?php echo $message['communication']?></th>
                    <th scope="row"><?php echo $message['message']?></th>
                    <th scope="row"><?php echo $message['created_at']?></th>
                    <form action="" method="post">
                        <th scope="row">
                            <?php if ($message['status']){?>
                            <button type="submit" name="status" disabled class="btn btn-secondary">تم اجراء اللازم</button>
                            <?php }else{ ?>
                            <button type="submit" name="status" value="<?php echo $message['id']?>" class="btn btn-success">تحت المراجعة</button>
                            <?php }?>
                    </th>
                    </form>
                </tr>
                <?php
            } ?>
            </tbody>
        </table>
    </div>

<?php
if (isset($_POST['status'])){
    $query = 'UPDATE `contact` SET `status` = 1 WHERE `contact`.`id` =' .$_POST['status'];

    if ($conn->query($query)){
        header("Refresh:0");
    }
}
?>

<?php include "../template/footer.php"; ?>

