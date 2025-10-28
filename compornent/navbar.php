    <header class="fixed-top">
        <div class="container">
            <nav id="navbar-example2" class="navbar bg-body-tertiary px-3 mb-3">
                <a class="navbar-brand" href="#">
                    <img src="assets/images/logo.png" alt="" class="img-fluid rounded-circle"
                        style="height: 50px; width: 50px">
                </a>
                <ul class="nav nav-pills mx-auto">
                    <li class="nav-item">
                        <a class="nav-link px-xl-5" href="index.php">Home</a>
                    </li>
                    <?php 
                    include('admin/include/connect.php');
                    $select = "SELECT * FROM tbl_product_type";
                    $query = mysqli_query($conn,$select);
                    for($i = 0; $type[$i] = mysqli_fetch_array($query);$i++){

                   
                ?>
                    <li class="nav-item">
                        <a class="nav-link px-xl-5"
                            href="product_type.php?product_type_id=<?php echo $type[$i]['t_id']; ?>"><?php echo $type[$i]['type_name']; ?></a>
                    </li>
                    <?php 
                    }
                ?>
                </ul>
            </nav>
        </div>
    </header>

    <main data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%"
        data-bs-smooth-scroll="true" class="scrollspy-example bg-body-tertiary p-3 rounded-2" tabindex="0">