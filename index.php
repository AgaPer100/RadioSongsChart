<?php

//connect to database
$conn = mysqli_connect('localhost', 'Maria', 'test1234', 'songs_chart');

//check connection
if(!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
}

//write query for all songs
$sql = 'SELECT nickname, songs, id FROM songs ORDER BY created_at';

//make query & get result
$result = mysqli_query($conn, $sql);

//fetch the resulting rows as an array
$charts = mysqli_fetch_all($result, MYSQLI_ASSOC);

//free result from memory
mysqli_free_result($result);

//close connection
mysqli_close($conn);

//explode(',', $charts[0]['songs']);


?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php') ?>

<h4 class="center grey-text">Hits!</h4>

<div class="container">
    <div class="row">
        <?php foreach($charts as $chart){ ?>

            <div class="col s6 md3">
                <div class="card">
                    <div class="card-content center">
                        <h6><?php echo htmlspecialchars($chart['nickname']); ?></h6>
                        <ul>
                            <?php foreach(explode(',', $chart['songs']) as $sng){ ?>
                                <li><?php echo htmlspecialchars($sng); ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="card-action right-align">
                        <a href="#" class="brand-text">more info</a>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>
</div>

<?php include('templates/footer.php') ?>
    

</html>