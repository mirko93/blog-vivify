<?php 

include_once 'connect.php';

if (!isset($_POST['deletePost'])) {
    $delete_post = $_POST['id'];

    $sql = "DELETE FROM posts WHERE id = $delete_post";
    $statement = $conn->prepare($sql);
    $statement->execute();

header("Location: posts.php");
}
