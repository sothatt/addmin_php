<?php 
include('compornent/header.php');
include('compornent/navbar.php');
include('admin/include/connect.php');
include('admin/include/session.php');
?>
<div class="row">
    <section class="hero-banner vh-100" id="home">
        <div id="carouselExampleDark" class="carousel carousel-dark slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner boder-5 border-danger">
                <?php 
                            $SELECT = "SELECT * FROM  tbl_addslide ORDER BY ID LIMIT 6";
                            $query = mysqli_query($conn,$SELECT);
                            for($i = 0 ; $myslide[$i] = mysqli_fetch_array($query); $i++){
                        ?>
                <div class="carousel-item <?php if($i == 0) {echo "active";} ?>" data-bs-interval="100">
                    <img src="admin/slide/<?php echo $myslide[$i]['slide']; ?>"
                        class="d-block w-100 vh-100 border border-danger img-fluid" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <?php   
                            }
                        ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
</div>
<section class="vh-100" id="Service">
    <?php 
                $selectProductType  = "SELECT * FROM tbl_product_type";
                $queryProductType = mysqli_query($conn,$selectProductType);
                for($i = 0 ; $productType[$i] = mysqli_fetch_array($queryProductType); $i++){
                    
            ?>

    <div class="container">

        <h2><?php echo $productType[$i]['type_name']; ?></h2>
        <div class="row g-3">
            <?php
                        $productTypeId = $productType[$i]['t_id'];
                        $select = "SELECT * FROM tbl_addproduct where product_type_id = $productTypeId  ORDER BY id DESC";
                        $query = mysqli_query($conn,$select);
                        for($k = 0; $read[$k] = mysqli_fetch_array($query);$k++){
            ?>
            <div class="col-12 col-md-12 col-lg-6 col-xl-3 p-4">
                <a href="details.php?product_id=<?php echo $read[$k]['id'];?>" class="nav-link">
                    <div class="card">
                        <img src="admin/thumbnail/<?php echo $read[$k]['thumbnail']; ?>" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?php echo $read[$k]['title']; ?></h5>
                            <p class="card-text"><?php echo $read[$k]['details']; ?></p>
                            <div class="btn btn-primary disabled">$<?php echo $read[$k]['price']; ?></div>
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
                }
            ?>
</section>
<section class="vh-100" id="Product">

</section>
<?php
include('compornent/footer.php');
 ?>