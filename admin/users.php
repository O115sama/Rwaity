<?php
    $title = "المستخدمين";
?>
<?php include "../template/header.php"; ?>
<?php include "../db.php"; ?>

<?php
if (!$_SESSION['id'] and $_SESSION['role']){
    header('location:../index.php');
    exit();
}
?>
    <div class="container d-flex align-items-center justify-content-center py-5">
        <table class="table text-right">
            <thead>
            <tr>
                <th scope="col">الاسم</th>
                <th scope="col">الهاتف</th>
                <th scope="col">الاميل</th>
                <th scope="col">الصلاحية</th>
                <th scope="col">حالة المستخدم</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($conn->query('SELECT * FROM `users`') as $user){ ?>
                <tr >
                    <th scope="row"><?php echo $user['name']?></th>
                    <th scope="row"><?php echo $user['phone']?></th>
                    <th scope="row"><?php echo $user['email']?></th>
                    <th scope="row">
                        <?php
                        if($user['role_admin']){ ?>
                            Admin
                            <?php
                        }else{ ?>
                            User
                        <?php }
                        ?>
                    </th>
                    <th scope="row">
                        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                        <?php
                        if(!$user['status']){ ?>
                            <button type="submit" name="allowed" value="<?php echo  $user['id']?>" class="btn btn-secondary">نشط</button>
                            <?php
                        }else{ ?>
                            <button type="submit" name="blocked" value="<?php echo  $user['id']?>" class="btn btn-success">نشط</button>
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
    $query = 'UPDATE `users` SET `status` = 1 WHERE `users`.`id` = ' .$_POST['allowed'];
}else{
    $query = 'UPDATE `users` SET `status` = 0 WHERE `users`.`id` = ' .isset($_POST['blocked']);
}
if ($conn->query($query)){
    header("Refresh:0");

}
?>


<?php include "../template/footer.php"; ?>


