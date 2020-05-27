<?php

include('config/db_connect.php');

if(isset($_POST['delete'])){

    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

    $sql = "DELETE FROM songs WHERE id = $id_to_delete";

    if(mysqli_query($conn, $sql)){
        //success
        header('Location: index.php');
    } {
        //failure
        echo 'query error: ' . mysqli_error($conn);
    }

}

//check GET request id param
if(isset($_GET['id'])){

    $id = mysqli_real_escape_string($conn, $_GET['id']);

    //mage sql
    $sql = "SELECT * FROM songs WHERE id = $id";

    //get the query result
    $result = mysqli_query($conn, $sql);

    //fetch result in array format
    $song = mysqli_fetch_assoc($result);
    
    mysqli_free_result($result);
    mysqli_close($conn);
}

?>


<!DOCTYPE html>
<html>

    <?php include('templates/header.php') ?>

    <div class="container center">
        <?php if($song): ?>

            <h4><?php echo htmlspecialchars($song['nickname']); ?></h4>
            <p>Created by: <?php echo htmlspecialchars($song['email']); ?></p>
            <p><?php echo date($song['created_at']); ?></p>
            <h5>Songs: </h5>
            <p><?php echo htmlspecialchars($song['songs']); ?></p>

            <!-- Delete form -->
            <form action="details.php" method="POST">
                <input type="hidden" name="id_to_delete" value="<?php echo $song['id'] ?>">
                <input type="submit" name="delete" value="Delete" class="btn brand">
            </form>

        <?php else: ?>

            <h5>No such chart exists!</h5>

        <?php endif; ?>
    </div>

    <?php include('templates/footer.php') ?>

</html>