<?php 

include_once 'connect.php';

$title = '';
$body = '';
$user_id = 1;
$hasError = false;
$error = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // $id = $_POST['id'];
    $title = test_input($_POST["title"]);
    $body = test_input($_POST["body"]);
    $user_id = test_input($_POST["user_id"]);

    $sql = "INSERT INTO posts (title, body, user_id) values ('$title', '$body', '$user_id')";
    $result = $conn->prepare($sql);
    $result->execute();

    header("Location: posts.php");
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// required
// if ($_SERVER["REQUEST_METHOD"] === "POST") {
//     // title required
//     if (empty($_POST["title"])) {
//         $title = "";
//         $error = "Please fill in this field.";
//         $hasError = true;
//     } else {
//         $title = test_input($_POST["comment"]);
//     }

//     // body required
//     if (empty($_POST["body"])) {
//         $body = "";
//         $error = "Please fill in this field.";
//         $hasError = true;
//     } else {
//         $body = test_input($_POST["body"]);
//     }
// }
  