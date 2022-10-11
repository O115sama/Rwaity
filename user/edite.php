<?php $title = "تعديل المنتج" ?>
<?php include "../template/header.php"?>
<?php include "../db.php"?>
<?php 
    if(isset($_POST['id_product_edit'])){
        $_SESSION['id_product_edit'] = $_POST['id_product_edit'];
    }
?>

<div class="d-flex align-items-center justify-content-center" style="padding-top:10%">
    <form class="form-signin text-center" action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
        <img class="mb-4" src="/rewity/template/logo.png" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">تعديل المنتج</h1>
        <?php foreach($conn->query( 'SELECT * FROM `products` WHERE id ='.$_SESSION['id_product_edit']) as $product){ ?>
        <div>
            <input type="text" name="subject" id="subject" class="form-control" value="<?php echo $product['subject']?>" required>
        </div>
        <div class="pt-2">
            <input type="text" name="author" id="author" class="form-control" value="<?php echo $product['author']?>" required>
        </div>
        <div class="pt-2">
            <input type="text" name="description" id="description" class="form-control" value="<?php echo $product['description']?>" required>
        </div>
        <div class="pt-2">
            <input type="file" name="image" id="image" class="form-control" value="image" required>
        </div>
        <div class="pt-2">
            <select class="custom-select d-block w-100" id="category" name="category" required>
                <?php foreach ($conn->query('SELECT * FROM `category`') as $category) { ?>
                <option value="<?php echo $category['id'] ?>" <?php if ( $category['id'] == $product['id_category'])  echo "selected" ?>><?php echo $category['name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="pt-2">
            <input type="text" name="price" id="price" class="form-control" value="<?php echo $product['price']?>" required>
        </div>
        <?php } ?>
        <div class="pt-2">
            <button class="btn btn-lg btn-secondary btn-block"  type="submit">حفظ التعديل</button>
        </div>
    </form>
</div>


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $subject =isset($_POST['subject']) ? $_POST['subject'] : null;
    $author =isset($_POST['author']) ? $_POST['author'] : null;
    $description =isset($_POST['subject']) ? $_POST['description'] : null;
    $category =isset($_POST['category']) ? $_POST['category'] : null;
    $price =isset($_POST['price']) ? $_POST['price'] : null;

    $image = null;
    if(isset($_FILES["image"])){
        $image = $_FILES["image"];
        move_uploaded_file($image["tmp_name"],"../images/" . $image["name"]);
        $image = $image['name'] ;
    }
    
    $query = "UPDATE `products` SET `subject`='$subject',`author`='$author',`description`='$description',`image`='$image',`id_category`='$category',`price`='$price ' WHERE `id` =". $_SESSION['id_product_edit'] ;
    if ($conn->query($query)){
        Header("Location:product.php");
    }

}

?>

<?php include "../template/footer.php"?>
