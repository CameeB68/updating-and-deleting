<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myblog";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM myblog";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>View Blog Entries</title>
</head>
<body>

<h2>Blog Entries</h2>

<table border="1">
<tr>
<th>ID</th>
<th>Content</th>
<th>Update</th>
<th>Delete</th>
</tr>

<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['content']; ?></td>

<td>
<form action="edit_entry.php" method="POST">
<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
<input type="text" name="content" value="<?php echo $row['content']; ?>">
<button type="submit">Update</button>
</form>
</td>

<td>
<a href="delete_entry.php?id=<?php echo $row['id']; ?>"
onclick="return confirm('Delete this entry?');">
Delete
</a>
</td>

</tr>

<?php
    }
}
?>

</table>

</body>
</html>

<?php
$conn->close();
?>