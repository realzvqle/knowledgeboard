<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style.css">

    <title>Document</title>
</head>
<body>
    <h1>Search Post</h1>
    <form method="POST" action="index.php">
        <input type="text" name="search" value="Enter Something...">
        <button type="submit" name="submitsearch">Search</button>
    </form>
    <a href="createpost">Create a Post!</a>
</body>
</html>

<?php

include_once "server/db.php";
include_once "server/abstractions.php";

$conn = LoadDatabaseConnection();


if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!isset($_POST['submitsearch'])) return;
    if(!isset($_POST['search'])){
        header("Location: ");    
    }
    $searchdata = $_POST['search'];
    header("Location: results?author=$searchdata");
}
else if($_SERVER["REQUEST_METHOD"] == "GET"){
}

$conn->close();

?>