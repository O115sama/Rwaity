<?php $title = "Page Blocked" ?>
<?php include "../template/header.php"?>

<?php
if ($_SESSION['id']){
    header('location:../index.php');
}
?>
<div class="d-flex align-items-center justify-content-center" style="padding-top:12%">
    <form class="form-signin text-center" action="" method="post">
        <img class="mb-4" src="../template/logo.png" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Sorry this account is blocked please <a href="../contact.php">Contact Us</a> admins</h1>


    </form>
</div>

<?php include "../template/footer.php"?>
