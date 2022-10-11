<?php $title = "Contact Us" ?>
<?php include "template/header.php"?>
<?php include "db.php"?>

<div class="d-flex align-items-center justify-content-center" style="padding-top:12%">
    <form class="form-signin text-center" action="" method="post">
        <img class="mb-4" src="/rewity/template/logo.png" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Contact Us</h1>
        <div>
            <input type="text" name="name" id="name" class="form-control" placeholder="ادخل الاسم" required>
        </div>
        <div class="pt-2">
            <input type="text" name="communication" id="communication" class="form-control" placeholder="ادخل وسيلة الاتصال" required>
        </div>
        <div class="pt-2">
            <textarea name="message" id="message" class="form-control" placeholder="ادخل الرسالة" required></textarea>
        </div>
        <div class="pt-2">
            <button class="btn btn-lg btn-secondary btn-block" type="submit">ارسال</button>
        </div>
    </form>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $communication = $_POST['communication'];
    $message = $_POST['message'];

    date_default_timezone_set("Asia/Riyadh");
    $created_at = date("Y-m-d");
    $updated_at  = $created_at;

    if ($conn->query("INSERT INTO `contact` (`id`, `name`, `communication`, `message`,`created_at`,`updated_at`) VALUES (NULL, '$name', '$communication', '$message', '$created_at', '$updated_at');")){
        Header("Location: index.php");

    }
}

?>

<?php include "template/footer.php"?>
