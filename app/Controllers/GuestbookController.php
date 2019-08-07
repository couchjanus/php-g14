<?php

// ===================================================
// Ассоциативный массив параметров, переданных скрипту через URL.

// if ($_GET) {
//    var_dump($_GET);
// }

// if ($_POST) {
//     var_dump($_POST);
// }

// echo '<pre>';
// var_dump($_SERVER['PHP_SELF']); 
// var_dump($_SERVER['REQUEST_METHOD']);
// var_dump($_SERVER['SCRIPT_NAME']);
// echo '</pre>';

// ====================Например,  отправим форму самой себе:===================================
// if ($_POST) {
//     echo '<pre>';
//     echo htmlspecialchars(print_r($_POST,  true));
//     echo '</pre>';
// } 

// =======================================================
// if (!empty($_POST)) {
//     if ( !$_POST['username'] or !$_POST['email'] or !$_POST['message']){
//         echo "<b>Please complete all the fields</b><br>";
//     } else{
//         echo htmlspecialchars(print_r($_POST,  true));
//     }
// }


// =======================================================
// Пример использования filter_input()

// $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
// echo $username;

// $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
// echo $email;

// FILTER_VALIDATE_EMAIL

// if(filter_var($email, FILTER_VALIDATE_EMAIL)){
//     echo $email.'<br>';
//     var_dump(filter_var($email, FILTER_VALIDATE_EMAIL));
// }else{
//     var_dump(filter_var($email, FILTER_VALIDATE_EMAIL));   
// } 

// echo '<pre>';
//     echo $username;
//     echo $email;
// echo '</pre>';

// ===================================================

/** 
 * fopen
 * fclose
*/

// Преднамеренная ошибка при работе с файлами

// $my_file = @file('non_existent_file') 
//     or
//     die("Ошибка при открытии файла: сообщение об ошибке");

// =======================================================
$comments = '';

// ========================fgets===============================
// Для построчного чтения используется функция fgets(), которая получает дескриптор файла и возвращает одну считанную строку.

// $fd = @fopen(DB."/comments", 'r') or die("не удалось открыть файл");

// while (!feof($fd)) {
//     $comments .= fgets($fd);
// }
// fclose($fd);
// var_dump($comments);

// ====================file_get_contents===============================
// Если нам надо прочитать файл полностью:

// $comments = file_get_contents(DB."/comments");
// var_dump($comments);

// При этом нам не надо открывать явно файл, получать дескриптор, а затем закрывать файл.

// ====================fread===============================
// Также можно провести поблочное считывание, то есть считывать определенное количество байт из файла с помощью функции fread():

// if (file_exists(DB."/comments")) {
//     $fhandle =@fopen(DB."/comments", "rt");
//     $comments = '';
//     while (!feof($fhandle)) {
//         $comments .= fread($fhandle, 4096);
//     }
//     fclose($fhandle);
//     var_dump($comments);
// } else {
//     echo "Файл не существует";
// }

// =====================file==============================
// Чтение файла полностью
// count, implode, str_replace, htmlspecialchars

// $file = file(DB."/comments");
// $count = count($file);
// $comments = str_replace("\n", "<br />\n", htmlspecialchars(implode("\n", $file)));

// file, str_replace, htmlspecialchars, implode 

// $comments = str_replace("\n", "<br />\n", htmlspecialchars(implode("\n", file(DB."/comments"))));
// var_dump($comments);
// ===================================================
$username = null;  
$email = null;
$message =  null;  
$result = false;
$fields = [];
$error = null;

// if (!empty($_POST)) {
//     $username = $_POST['name'];  
//     $email = $_POST['email'];  
//     $message =  $_POST['message'];  

//     if (!$username or !$email or !$message) {
//         $error = "<h2>Please complete all the fields</h2>";
//     } else {
//         $result = true;
//         array_push($fields, $username); 
//         array_push($fields, $email); 
//         array_push($fields, $message);

//         var_dump($fields);

//     }
// }

// =====================fwrite==============================
// add comment to comments.csv

// if (!empty($_POST)) {
    
//     if (!$_POST['name'] or !$_POST['email'] or !$_POST['message']) {
//         $error = "<h2>please complete all the fields</h2>";
//     } else {
//         $result = true;
//         $fields = [];

//         $username = $_POST['name'];
//         array_push($fields, $username); 
//         $email = $_POST['email'];
//         array_push($fields, $email); 
        
//         $message = $_POST['message'];
//         array_push($fields, $message); 
//         $appended_at = date("Y-m-d");
//         array_push($fields, $appended_at); 

//         // $appended_at =  date("Y/m/d");
//         // $appended_at =  date("Y.m.d");
//         // $appended_at =  date("Y-m-d");
//         // $appended_at =  date("l");

//         $handle = fopen(DB."/comments.csv", "a+");
//         $string = $username.":".$email.":".$message.":".$appended_at."\r\n";

//         // fwrite($handle, $string);

//         // file_put_contents(DB."comments.csv", $string, FILE_APPEND);

//         fputcsv($handle, $fields, ':');
//         fclose($handle);
//     }
// }
// =====================fgetcsv==============================
// $comments = [];

// $handle = fopen(DB."/comments.csv", "rt");

// while (($row = fgetcsv($handle, 10000, ":")) !== false) { 
//     array_push($comments, $row); 
// } 
// fclose($handle); 

view('guestbook/index01', array(
    'title' => 'Guest Book',
));

// $address = conf('contacts');
// view('guestbook/index02', array(
//     'title' => 'Guest Book',
//     'address' => $address
// ));

// $address = conf('contacts');
// view('guestbook/index05', array(
//     'title' => 'Guest Book',
//     'address' => $address,
//     'result' => $result,
//     'comments' => $comments,
//     'error' => $error,
// ));
