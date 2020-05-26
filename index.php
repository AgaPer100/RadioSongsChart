<?php

//connect to database
$conn = mysqli_connect('localhost', 'Maria', 'test1234', 'songs_chart');

//check connection
if(!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
}

//write query for all songs
$sql = 'SELECT nickname, songs, id FROM songs';

//make query & get result
$result = mysqli_query($conn, $sql);

//fetch the resulting rows as an array
$songs = mysqli_fetch_all($result, MYSQLI_ASSOC);

//free result from memory
mysqli_free_result($result);

//close connection
mysqli_close($conn);

print_r($songs);


?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php') ?>

<?php include('templates/footer.php') ?>
    

</html>