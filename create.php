<?php include 'inc/header.php'?>
<?php include 'config/config.php' ?>
<?php include 'config/Database.php' ?>
<?php
    $db = new Database();
    if (isset($_POST['submit'])){
//        mysqli_real_escape_string() for protect input mysql injection
        $name = mysqli_real_escape_string($db->link, $_POST['name']);
        $email = mysqli_real_escape_string($db->link, $_POST['email']);
        $skill = mysqli_real_escape_string($db->link, $_POST['skill']);
        if ($name == '' || $email == '' || $skill == ''){
            $error = '<span class="text-danger">Field must not be empty!</span>';
        }else{
            $query = "INSERT INTO users(name,email,skill) VALUE('$name', '$email', '$skill')";
            $create = $db->create($query);
        }
    }
?>


    <form method="POST" action="create.php">
        <?php
            if (isset($error)){
                echo $error;
            }
        ?>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name"  placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email"  placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="skill">Skill</label>
            <input type="text" class="form-control" id="skill" name="skill"  placeholder="Enter skill">
        </div>
        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
        <input type="reset" value="Reset" class="btn btn-info">
        <a href="index.php" class="btn btn-success float-right">Go Back</a>

    </form>

<?php include 'inc/footer.php' ?>