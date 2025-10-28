<?php 
    include('include/header.php');
    include('include/navbar.php');
    include('include/connect.php');
    include('include/session.php');
    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $price = $_POST['price'];
        $details = $_POST['details'];
        $thumbnail = $_FILES['thumbnail']['name'];
        $type_name = $_POST['type_name'];
        if(empty ($title) == true || empty($price) == true || empty($details) == true || empty($thumbnail) == true || empty($type_name) == true){
            echo "not found";
        }
        else{
            move_uploaded_file($_FILES['thumbnail']['tmp_name'],'thumbnail/'.$thumbnail);
            $create = "INSERT INTO tbl_addproduct(title,price,details,thumbnail ,product_type_id) VALUES ('$title','$price','$details','$thumbnail','$type_name')";
            $query = mysqli_query($conn,$create);
            if($query){
                echo "";
            }
        }
    }
?>
<div class="container mt-5">
    <h2>Add Product</h2>
    <div class="row">
        <form action="" method="POST" enctype="multipart/form-data" class="w-100">
            <div class="col-12">
                <input type="text" class="form-control my-2" placeholder="title" name="title">
            </div>
            <div class="col-12">
                <input type="number" class="form-control my-2" placeholder="price" name="price">
            </div>
            <div class="col-12">
                <input type="details" class="form-control my-2" placeholder="details" name="details">
            </div>
            <div class="col-12">
                <select class="form-select w-100 form-control" name="type_name" required>
                    <?php
                    $select = "SELECT * FROM tbl_product_type";
                    $query = mysqli_query($conn, $select);
                    while ($row = mysqli_fetch_array($query)) {
                ?>
                    <option value="<?php echo $row['t_id']; ?>"><?php echo $row['type_name']; ?></option>
                    <?php 
                    }
                ?>
                </select>
            </div>
            <div class="col-12">
                <input type="file" class="form-control my-2" placeholder="thumbnail" name="thumbnail">
            </div>
            <div class="col-12">
                <button class="btn btn-success" name="submit">Submit</button>
            </div>
        </form>
    </div>
</div>

<?php
include('include/footer.php'); 
?>