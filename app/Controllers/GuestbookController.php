<?php

require_once CONFIG.'/db.php';

if (!empty($_POST)) {
   
    if ( !$_POST['username'] or !$_POST['email'] or !$_POST['message']){
        echo "<b>Please complete all the fields</b><br><br>";
    } else {
        // подключаемся к серверу
        $conn = mysqli_connect(HOST, DBUSER, DBPASSWORD, DATABASE) 
        or die("Ошибка " . mysqli_error($conn));

        // $username = mysqli_real_escape_string ($conn, $_POST['username']);
        // $email = mysqli_real_escape_string ($conn, $_POST['email']);

        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);

        $message = mysqli_real_escape_string ($conn, $_POST['message']);

        // выполняем операции с базой данных
        $sql = "INSERT INTO guestbook (username, email, message) VALUES ('$username', '$email', '$message')";
        mysqli_query($conn, $sql) or die("Ошибка: " . mysqli_error($conn));
        mysqli_close($conn);
    }
}

// ===================================================

$conn = mysqli_connect(HOST, DBUSER, DBPASSWORD, DATABASE) 
        or die("Ошибка " . mysqli_error($conn));


$comments = [];
$sql = "SELECT * FROM guestbook";
$result = mysqli_query($conn, $sql);
$resCount = mysqli_num_rows($result);

while($row = mysqli_fetch_assoc($result)){
        array_push($comments, $row);
    }
// закрываем подключение
mysqli_close($conn);


$address = conf('contacts');
view('guestbook/index01', array(
    'title' => 'Guest Book',
    'address' => $address,
    'result' => $result,
    'comments' => $comments,
    'error' => $error,
));
