<?php

if(isset($_POST['submit'])){
    echo htmlspecialchars($_POST['email']);
    echo htmlspecialchars($_POST['nickname']);
    echo htmlspecialchars($_POST['songs']);
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php') ?>

<section class="container grey-text">
    <h4 class="center">Add your favorite songs</h4>
    <form action="add.php" method="POST" class="white">
        <label>Your Email:</label>
        <input type="email" name="email">
        <label>Your Nickname:</label>
        <input type="text" name="nickname">
        <label>3 favorite songs (comma separated):</label>
        <input type="text" name="songs">
        <div class="center">
            <input type="submit" name="submit" value="submit" class="btn brand">
        </div>
    </form>
</section>

<?php include('templates/footer.php') ?>
    

</html>