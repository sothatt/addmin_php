<?php 
    include('compornent/header.php');
    include('compornent/navbar.php');
    include('admin/include/connect.php');
?>
<div class="container mt-5">
    <div class="row pt-5 mt-5" style="margin-top: 100px;">
        <?php 
                $productID = $_GET['product_id'];
                $select = "SELECT * FROM tbl_addproduct WHERE id = $productID ";
                $query = mysqli_query($conn,$select);
                $show = mysqli_fetch_array($query);
            ?>
        <div class="col-12 col-md-12 col-lg-6 col-5 mt-5">
            <div class="card">
                <img src="admin/thumbnail/<?php echo $show['thumbnail']; ?>" alt="">
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-6 col-7">
            <div class="card-body">
                <h2><?php echo $show['title']; ?></h2>
                <p><?php echo $show['details']; ?></p>
                <h3><?php echo $show['price']; ?></h3>
            </div>
        </div>
    </div>
</div>
<?php 
    include('compornent/footer.php');
?>