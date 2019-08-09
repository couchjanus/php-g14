<?php
// Создание table с помощью MySQLi
// create.table.php
$servername = "localhost";
$username = "root";
$password = "ghbdtn";
$dbname = "store";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

/* проверка соединения */
if (mysqli_connect_errno()) {
    printf("\nНе удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
echo "Connected successfully\n\n";

$sql = "CREATE TABLE guestbook (
    id int(11) NOT NULL AUTO_INCREMENT,
    username varchar(25) NOT NULL,
    email varchar(25) NOT NULL,
    message text NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);";
 

// Create table

if (mysqli_query($conn, $sql)) {
    echo "\nTable guestbook created successfully\n\n";

} else {
    printf("\nError creating table: %s\n", mysqli_error($conn));
}

mysqli_close($conn);
