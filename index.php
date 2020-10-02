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
                <th scope="row"><?php $data['id'] ?></th>
                <td><?php echo  $data['name'] ?></td>
                <td><?php echo $data['email'] ?></td>
                <td><?php echo $data['skill'] ?></td>
                <td><a href="update.php?id=<?php echo $data['id'] ?>">Edit</a></td>
            </tr>
                <?php }?>
    <?php }else { ?>
            <h2>No Data</h2>
    <?php  }?>
        </tbody>
    </table>



		

<?php include 'inc/footer.php'; ?>