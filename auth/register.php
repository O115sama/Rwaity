<?php $title = "Register" ?>
<?php include "../template/header.php"?>
<?php include "../db.php"?>
<?php
if (isset($_SESSION['id'])){
    header('location:../index.php');
}
?>
<div class="d-flex align-items-center justify-content-center" style="padding-top:5%">
    <form class="form-signin text-center" action="" method="post">
        <img class="mb-4" src="/rewity/template/logo.png" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">تسجيل حساب جديد</h1>
        <div>
            <input type="text" name="name" id="name" class="form-control" placeholder="ادخل الاسم" required>
        </div>
        <div class="pt-2">
            <input type="email" name="email" id="email" class="form-control" placeholder="ادخل الايميل" required>
        </div>
        <div class="pt-2">
            <input type="text" name="phone" id="phone" class="form-control" placeholder="ادخل الهاتف" required>
        </div>
        <div class="pt-2">
            <select class="custom-select d-block w-100" id="country" name="country" required>
                <option>السعودية</option>
            </select>
        </div>
        <div class="pt-2">
            <select class="custom-select d-block w-100" id="city" name="city" required>
                <option value="Riyadh">الرياض</option>
                <option value="Jeddah" >جدة</option>
                <option value="Mecca" >مكة المكرمه</option>
                <option value="Medina" >المدينة المنورة</option>
                <option value="Dammām" >الشرقية</option>
                <option value="Tabuk" >تبوك</option>
                <option value="Abha" >ابها</option>
                <option value="Arar" >عرعر</option>
                <option value="Jazan" >جازان</option>
                <option value="Sakaka" >سكاكا</option>
                <option value="Bahah" >الباحة</option>
            </select>
        </div>
        <div class="pt-2">
            <textarea name="address" id="address" class="form-control" placeholder="ادخل وصف تقريبي" required></textarea>
        </div>
        <div class="pt-2">
            <input type="password" name="password" id="password" class="form-control" placeholder="ادخل كلمة مرور" required>
        </div>
        <div class="pt-2">
            <button class="btn btn-lg btn-secondary btn-block" type="submit">تسجيل</button>
        </div>
    </form>
</div>
<div class="text-center">
    <a href="login.php" class="" >تسجيل دخول</a>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $password =  password_hash($_POST['password'],PASSWORD_DEFAULT);
    date_default_timezone_set("Asia/Riyadh");
    $create_at = date("Y-m-d");

    $query = "INSERT INTO `users` (`id`, `name`, `phone`, `email`, `status`, `role_admin`, `country`, `city`, `description`, `password`, `created_at`) VALUES (NULL, '$name', '$phone', '$email', 1, 0, '$country', '$city', '$address', '$password', '$create_at');";
    if ($conn->query($query)){
        Header("Location:../");
    }
}

?>

<?php include "../template/footer.php"?>
