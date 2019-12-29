<?php 

include_once 'connect.php';

$title = '';
$body = '';
$user_id = 1;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // $id = $_POST['id'];
    $title = $_POST["title"];
    $body = $_POST["body"];
    $user_id = $_POST["user_id"];

    $sql = "INSERT INTO posts (title, body, user_id) values ('$title', '$body', '$user_id')";
    $result = $conn->prepare($sql);
    $result->execute();

    header("Location: posts.php");
}
  