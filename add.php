<?php

$nickname = $email = $songs = '';
$errors = ['email'=>'', 'nickname'=>'', 'songs'=>''];

if(isset($_POST['submit'])){

    //check
    if(empty($_POST['email'])){
        $errors['email'] = 'An email is required <br/>';
    } else {
        $email = $_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'Email must be a valid email address';
        }
    }
    if(empty($_POST['nickname'])){
        $errors['nickname'] = 'A nickname is required <br/>';
    } else {
        $nickname = $_POST['nickname'];
        if(!preg_match('/^[a-zA-Z\s]+$/', $nickname)){
            $errors['nickname'] = 'Nickname must be letters and spaces only';
        }
    }
    if(empty($_POST['songs'])){
        $errors['songs'] = 'Enter 3 songs <br/>';
    } else {
        $songs = $_POST['songs'];
        if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $songs)){
            $errors['songs'] = 'Songs must be a comma separated list';
        }
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php') ?>

<section class="container grey-text">
    <h4 class="center">Add your favorite songs</h4>
    <form action="add.php" method="POST" class="white">
        <label>Your Email:</label>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
        <div class="red-text"><?php echo $errors['email'] ?></div>
        <label>Your Nickname:</label>
        <input type="text" name="nickname" value="<?php echo htmlspecialchars($nickname) ?>">
        <div class="red-text"><?php echo $errors['nickname'] ?></div>
        <label>3 favorite songs (comma separated):</label>
        <input type="text" name="songs" value="<?php echo htmlspecialchars($songs) ?>">
        <div class="red-text"><?php echo $errors['songs'] ?></div>
        <div class="center">
            <input type="submit" name="submit" value="submit" class="btn brand">
        </div>
    </form>
</section>

<?php include('templates/footer.php') ?>
    

</html>