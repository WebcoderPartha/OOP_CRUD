<?php
include 'inc/header.php';
include 'config/config.php';
include 'config/Database.php';
?>
<?php
    $db = new Database();
    $query = "SELECT * FROM users";

    $read = $db->select($query);


?>
    <a href="create.php" class="btn btn-primary">Create</a>
<?php
if (isset($_GET['msg'])){
    echo "<span class='text-success'>".$_GET['msg']."</span>";
}

?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Skill</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php if ($read)  {?>
            <?php while ($data = $read->fetch_assoc()) {?>
            <tr>
                <th scope="row"><?php echo $data['id'] ?></th>
                <td><?php echo  $data['name'] ?></td>
                <td><?php echo $data['email'] ?></td>
                <td><?php echo $data['skill'] ?></td>
                <td>
                    <a href="edit.php?id=<?php echo urlencode($data['id']); ?>" class="btn btn-info">Edit</a>
                    <?php
                        if (isset($_POST['delete'])){
                            $id = $_GET['id'];
                            $delete = "DELETE FROM `users` WHERE id=$id";
                            $db->delete($delete);
                        }
                    ?>
                    <form action="index.php?id=<?php echo urlencode($data['id']); ?>" method="POST">
                        <input value="Delete" type="submit" name="delete" class="btn btn-danger">
                    </form>
                </td>
            </tr>
                <?php }?>
    <?php }else { ?>
            <h2>No Data</h2>
    <?php  }?>
        </tbody>
    </table>



		

<?php include 'inc/footer.php'; ?>