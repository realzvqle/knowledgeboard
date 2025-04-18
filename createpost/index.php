<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
    <title>Document</title>
</head>
<body>
    <h1>Create a Post!</h1>
    <form method="POST" action="index.php">
        <h4>Name</h4>
        <input type="text" name="author">
        <h4>Post</h4>
        <div class="postbox">
        <textarea type="text" name="post" maxlength="400"></textarea>
        </div>
        <button type="submit" name="submitpost">Post</button>
    </form>
    <br>
    <a href="../index.php">Go Back</a>
</body>
</html>


<?php
include_once "../server/db.php";

$conn = LoadDatabaseConnection();

if(!isset($_POST['submitpost'])){
    $conn->close();
    die();
}

if(!isset($_POST['author']) || !isset($_POST['post'])){
    //echo("Please Enter an Author!");
    $conn->close();
    header("Location: result.php?status=1");
    //die();
}

$author = $_POST['author'];
$post = $_POST['post'];
AddPostIntoDatabase($conn, $author, $post);
$conn->close();

header("Location: result.php?status=0");




?>