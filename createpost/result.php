<?php

if(!isset($_GET['status'])){
    die();
}

$result = $_GET['status'];


switch($result){
    case 0:
        echo("Successfully Created Post!");
        break;
    case 1:
        echo("Post was Empty!\n");
        break;
}

?>


<a href="../index.php">Go Back</a>