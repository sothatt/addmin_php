<?php 
include('include/header.php');
include('include/navbar.php');
include('include/connect.php');
include('include/session.php');
                    
    if(isset($_GET['del_id'])){
        $deleteid = $_GET['del_id'];
        $delete = "DELETE FROM tbl_product_type WHERE t_id = $deleteid";
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
                <th>type_name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $select = "SELECT * FROM tbl_product_type ";
            $query = mysqli_query($conn,$select);
            for($i = 1; $result[$i] = mysqli_fetch_array($query);$i++){
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $result[$i]['type_name']; ?></td>
                <td>
                    <a href="productlist.php?del_id=<?php echo $result[$i]['t_id']; ?>"
                        class="btn btn-danger">Delete</a>

                    <a href="update_product_type.php?updateid=<?php echo $result[$i]['t_id']; ?>"
                        class="btn btn-warning ">Update</a>
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