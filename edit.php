<?php
    include 'inc/header.php';
    include 'config/config.php';
    include 'config/Database.php';
?>
<?php
    $db = new Database();
    $id = $_GET['id'];
    $query = "SELECT * FROM users WHERE id=$id";
    $singleData = $db->select($query)->fetch_assoc();
?>
<?php
    if (isset($_POST['update'])){
        $name = mysqli_real_escape_string($db->link, $_POST['name']);
        $email= mysqli_real_escape_string($db->link, $_POST['email']);
        $skill = mysqli_real_escape_string($db->link, $_POST['skill']);
        if ($name == '' || $email == '' || $skill == '' ){
            echo  "<span class='text-danger'>Field Must not be empty</span>";
        }else{
            $update = "UPDATE users SET name='$name', email='$email', skill='$skill' WHERE id='$id'";
            $db->update($update);
        }
    }
?>

<form method="POST" action="edit.php?id=<?php echo $id; ?>">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" value="<?php echo $singleData['name'] ?>" name="name" placeholder="Enter name"
    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" value="<?php echo $singleData['email'] ?>" name="email" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="skill">Skill</label>
        <input type="text" class="form-control" id="skill" name="skill" value="<?php echo $singleData['skill'] ?>" placeholder="Enter skill">
    </div>
    <input type="submit" class="btn btn-primary" name="update" value="Update">
</form>


<?php
include 'inc/footer.php';
?>
