<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<?php

include_once "../server/db.php";


$conn = LoadDatabaseConnection();
if(isset($_GET['author'])){
    $name = $_GET['author'];
    $result = SearchPostInDatabaseViaAuthorsName($conn, $name);
    echo($result);
}

$conn->close();


?>