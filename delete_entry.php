<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myblog";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {

    $id = intval($_GET['id']);

    $stmt = $conn->prepare("DELETE FROM myblog WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

$conn->close();

header("Location: view_entries.php");
exit;
?>