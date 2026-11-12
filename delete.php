<?php
include "db.php";

if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $sql = $conn->prepare("DELETE FROM results WHERE id = $id");

    if ($sql->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}
?>