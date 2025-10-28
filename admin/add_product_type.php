<?php 
    include('include/header.php');
    include('include/navbar.php');
    include('include/connect.php');
    include('include/session.php');
    if(isset($_POST['submit'])){
        $type_name = $_POST['type_name'];
        $create = "INSERT INTO tbl_product_type(type_name) VALUES ('$type_name')";
        $query = mysqli_query($conn,$create);
        if($query){
            echo "";
        }
        else{
            echo "";
        }
    }
?>
<div class="container mt-5">
    <h2>Add Product Type</h2>
    <div class="row">
        <form action="" method="POST" enctype="mutipart/form-data" class="w-100">
            <div class="col-12">
                <input type="text" placeholder="Type name" class="form-control my-2" name="type_name">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-outline-success" name="submit">Submit</button>
            </div>
        </form>
    </div>
</div>

<?php 
include('include/footer.php');
?>