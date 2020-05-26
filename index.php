<?php

//connect to database
$conn = mysqli_connect('localhost', 'Maria', 'test1234', 'songs_chart');

//check connection
if(!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php') ?>

<?php include('templates/footer.php') ?>
    

</html>