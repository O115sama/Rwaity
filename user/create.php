<?php $title = "انشاء منتج" ?>
<?php include "../template/header.php"?>
<?php include "../db.php"?>

<div class="d-flex align-items-center justify-content-center" style="padding-top:10%">
    <form class="form-signin text-center" action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
        <img class="mb-4" src="/rewity/template/logo.png" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">انشاء منتج</h1>
        <div>
            <input type="text" name="subject" id="subject" class="form-control" placeholder="ادخل العنوان" required>
        </div>
        <div class="pt-2">
            <input type="text" name="author" id="author" class="form-control" placeholder="ادخل اسم المؤلف" required>
        </div>
        <div class="pt-2">
            <input type="text" name="description" id="description" class="form-control" placeholder="ادخل وصف للرواية" required>
        </div>
        <div class="pt-2">
            <input type="file" name="image" id="image" class="form-control" placeholder="image" required>
        </div>
        <div class="pt-2">
            <select class="custom-select d-block w-100" id="category" name="category" required>
                <?php foreach ($conn->query('SELECT * FROM `category`') as $category) { ?>
                <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="pt-2">
            <input type="text" name="price" id="price" class="form-control" placeholder="ادخل السعر" required>
        </div>
        <div class="pt-2">
            <button class="btn btn-lg btn-secondary btn-block" type="submit">انشاء المنتج</button>
        </div>
    </form>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $is_user = $_SESSION['id'];
    $subject = $_POST['subject'];
    $author = $_POST['author'];
    $description = $_POST['description'];


    $image = $_FILES["image"];
    move_uploaded_file($image["tmp_name"],"../images/" . $image["name"]);
    $image = $image['name'];

    
    $category = $_POST['category'];
    $price = $_POST['price'];

    date_default_timezone_set("Asia/Riyadh");
    $created_at = date("Y-m-d");

    $query = "INSERT INTO `products` (`id`, `id_user`, `subject`, `author`, `description`, `image`, `id_category`, `price`, `status`, `sold`, `created_at`) 
                                VALUES (NULL, '$is_user', '$subject', '$author', '$description', '$image', '$category', '$price', true , false , '$created_at')";
    if ($conn->query($query)){
        header("Location:product.php");
        exit;
    }

}

?>

<?php include "../template/footer.php"?>
