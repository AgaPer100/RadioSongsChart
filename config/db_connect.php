<?php
//connect to database
$conn = mysqli_connect('localhost', 'Maria', 'test1234', 'songs_chart');

//check connection
if(!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
}

?>