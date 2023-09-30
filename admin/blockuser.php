<?php
session_start();
require('../database/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST["userId"];

    $query = "UPDATE user SET status = 'Blocked' WHERE id = '$userId'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "User blocked successfully.";
    } else {
        echo "Error blocking the user.";
    }
}
?>
