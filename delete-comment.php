<?php 
include_once 'connect.php';
    

if (!isset($_GET['deleteComm'])) {
    $delete_comm = $_GET['id'];

    $sql = "DELETE FROM comments WHERE post_id = $delete_comm";
    $statement = $conn->prepare($sql);
    $statement->execute();

header("Location: single-post.php?id=$delete_comm");
}

?>
