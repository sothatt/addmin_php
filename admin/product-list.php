<?php 
include('include/header.php');
include('include/navbar.php');
include('include/connect.php');
include('include/session.php');
                    
if(isset($_GET['delete_Id'])){
    $deleteid = $_GET['delete_Id'];
    
    $delete = "DELETE FROM tbl_addproduct WHERE id= $deleteid";
    
    $query = mysqli_query($conn,$delete);
    if($query){
        echo "";
    }
}
                
?>
<div class="container mt-5">
    <table border="1" id="myTable" class="display">
        <thead>
            <tr>
                <th>id</th>
                <th>title</th>
                <th>price</th>
                <th>Type Name</th>
                <th>details</th>
                <th>thumbnail</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $select = "SELECT * FROM tbl_addproduct INNER JOIN tbl_product_type ON tbl_addproduct.product_type_id = tbl_product_type.t_id";
            $querylist = mysqli_query($conn,$select);
            for($i = 1; $result[$i] = mysqli_fetch_array($querylist);$i++){
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $result[$i]['title']; ?></td>
                <td><?php echo $result[$i]['price']; ?></td>
                <td><?php echo $result[$i]['type_name']; ?></td>
                <td><?php echo $result[$i]['details']; ?></td>
                <td style="width: 50px;">
                    <img src="thumbnail/<?php echo $result[$i]['thumbnail']; ?>" alt="" style="width: 50px; "
                        class="rounded-pill">
                </td>
                <td>
                    <a href="product-list.php?delete_Id=<?php echo $result[$i]['id']; ?>"
                        class="btn btn-danger">Delete</a>
                    <a href=""></a>
                </td>
            </tr>
            <?php 
            }
            ?>
        </tbody>
    </table>
</div>
<?php 
include('include/footer.php');
?>