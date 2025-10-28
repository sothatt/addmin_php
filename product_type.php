<?php 
include('compornent/header.php');
include('compornent/navbar.php');
include('admin/include/connect.php');

$typeId = $_GET['product_type_id'];
?>
<div class="container">
    <div class="row">
        <?php 
            $select = "SELECT * FROM tbl_addproduct WHERE product_type_id = '$typeId'";
            $query = mysqli_query($conn,$select);
            for($i = 0; $product[$i] = mysqli_fetch_array($query);$i++){
            ?>
        <div class="col-12 col-md-12 col-lg-6 col-xl-3 p-4 mt-5">
            <a href="details.php?product_id=<?php echo $product[$i]['id'];?>" class="nav-link">
                <div class="card">
                    <img src="admin/thumbnail/<?php echo $product[$i]['thumbnail']; ?>" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?php echo $product[$i]['title']; ?></h5>
                        <p class="card-text"><?php echo $product[$i]['details']; ?></p>
                        <div class="btn btn-primary disabled">$<?php echo $product[$i]['price']; ?></div>
                    </div>
                </div>
            </a>

        </div>
        <?php 
            }
            ?>
    </div>
</div>
<?php 
    include('compornent/footer.php');
?>