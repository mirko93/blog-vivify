<?php 
include_once 'connect.php';
    

if (!isset($_POST['deleteComm'])) {
    $delete_comm = $_POST['post_id'];

    $sql = "DELETE FROM comments WHERE id = $delete_comm";
    $statement = $conn->prepare($sql);
    $statement->execute();

header("Location: single-post.php?id=$delete_comm");
}

?>
