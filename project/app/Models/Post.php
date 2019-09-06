<?php
require_once CONFIG.'/db.php';

function all()
{
    $conn = mysqli_connect(HOST, DBUSER, DBPASSWORD, DATABASE) 
        or die("Ошибка " . mysqli_error($conn));
    
    mysqli_query($conn, 'SET CHARACTER SET utf8');

    $posts = [];
    $sql = "SELECT * FROM posts";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)){
        array_push($posts, $row);
    }

    mysqli_close($conn);

    return $posts;
}
