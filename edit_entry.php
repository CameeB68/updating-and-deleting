<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myblog";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = intval($_POST['id']);
    $content = $_POST['content'];

    $stmt = $conn->prepare("UPDATE myblog SET content=? WHERE id=?");
    $stmt->bind_param("si", $content, $id);
    $stmt->execute();
    $stmt->close();
}

$conn->close();

header("Location: view_entries.php");
exit;
?>