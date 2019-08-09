<?php

$servername = "localhost";
$username = "root";
$password = "ghbdtn";
$dbname = "store";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $dbname);
/* проверка соединения */
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
echo "Connected successfully\n\n";

// Create sql

$sql = "SELECT * FROM guestbook";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - User Name: " . $row["username"]. " Email: " . $row["email"]. " Comment: " . $row["message"]. " Created: " . $row["created_at"]. "\n\n";
    }
} else {
    echo "0 results\n";
}
mysqli_close($conn);
