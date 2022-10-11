<?php $title = "Login" ?>
<?php include "../template/header.php"?>
<?php include "../db.php"?>
<?php

if (isset($_SESSION['id'])){
    header('location:../index.php');
}

?>
<div class="d-flex align-items-center justify-content-center" style="padding-top:12%">
    <form class="form-signin text-center" action="" method="post">
        <img class="mb-4" src="/rewity/template/logo.png" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">تسجيل دخول</h1>
        <div>
            <input type="text" name="email" id="email" class="form-control" placeholder="ادخل الايميل" required>
        </div>
        <div class="pt-2">
            <input type="password" name="password" id="password" class="form-control" placeholder="ادخل كلمة المرور" required>
        </div>
        <div class="pt-2">
            <button class="btn btn-lg btn-secondary btn-block" type="submit">تسجيل دخول</button>
        </div>
    </form>
</div>
<div class="text-center">
    <a href="register.php" class="" >انشاء حساب جديد</a>
</div>


<?php

if (isset($_POST['email']) && $_POST['password']){
    $email = $_POST['email'] ;
    $result = $conn->query("SELECT * FROM `users` where email = '$email' limit 1");

    if ($result->num_rows){
        $result = $result->fetch_array();
        $coff = password_verify($_POST['password'],$result['password']);

        if ($coff and $result['status']){
            $_SESSION['user'] = $result['name'];
            $_SESSION['id'] = $result['id'];
            $_SESSION['role'] = $result['role_admin'];
            Header("Location:../");
        }
        Header("Location:../pages/blocked.php");
        exit();
    }
}
?>

<?php include "../template/footer.php"?>
