<?php


function LoadDatabaseConnection(){
    
    $conn = NULL;

    try {
        $conn = mysqli_connect("localhost", "root", "", "knowledgeboard");
        
    } catch(Exception $e){
        // database doesn't exist, create one
        $createdb = mysqli_connect("localhost", "root", "");
        $createdb->query("CREATE DATABASE knowledgeboard");
        $createdb->close();
        $conn = mysqli_connect("localhost", "root", "", "knowledgeboard");
        // create table
        $result = $conn->query("SHOW TABLES like 'posts'");
        if($result->num_rows == 0){
            // if doesn't exist, create the table
            $conn->query("CREATE TABLE posts (author TEXT NOT NULL, post TEXT NOT NULL)");
        }
    }
    return $conn;
}


function AddPostIntoDatabase($conn, $author, $post){
    $stmt = mysqli_prepare($conn, "INSERT INTO posts (author, post) VALUES (?,?)");
    $stmt->bind_param("ss", $author, $post);
    $stmt->execute();
}

function SearchPostInDatabaseViaAuthorsName($conn, $author){
    $results = [];
    $stmt = mysqli_prepare($conn, "SELECT post FROM posts WHERE author = ?");
    $stmt->bind_param("s", $author);
    $stmt->execute();
    $stmt->bind_result($data);
    while($stmt->fetch()){
        $results[] = "Post by $author: \"$data\"<br>";
    }
    $results = array_reverse($results);
    if(empty($results)){
        return "Couldn't Find Anything.";
    } 
    $result = implode("<br>", $results);
    return $result;
}



?>