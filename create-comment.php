<?php 

include_once 'connect.php';

$author = '';
$text = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $author = $_POST["author"];
    $text = $_POST["text"];
    $post_id = $_POST["post_id"];

    $sql = "INSERT INTO comments (author, text, post_id) values ('$author', '$text', '$post_id')";
    $result = $conn->prepare($sql);
    $result->execute();
    // var_dump($post_id);

    header("Location: single-post.php?id=$post_id");
}
  




