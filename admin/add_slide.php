<?php 
include('include/header.php');
include('include/navbar.php');
include('include/connect.php');
include('include/session.php');
if(isset($_POST['submit'])){
    $slide = $_FILES['slide']['name'];
    if(empty($slide) == true){
        ?>
<script>
swal("Good job!", "You clicked the button!", "success");
</script>
<?php
    }

    else{
        move_uploaded_file($_FILES['slide']['tmp_name'],'slide/'.$slide);
        $create = "INSERT INTO tbl_addslide(slide) VALUES ('$slide')";
        $query= mysqli_query($conn,$create);
        if($query){
            ?>
<script>
swal("Good job!", "You clicked the button!", "success");
</script>
<?php
        }
    }
}
?>
<div class="container mt-5">
    <h2>Add Slide</h2>
    <div class="row border border-danger py-3">
        <form action="" class="w-100" method="POST" enctype="multipart/form-data">
            <div class="col-12">
                <input type="file" class="form-control my-2" name="slide">
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