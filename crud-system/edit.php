<?php
include 'config.php';
$id = $_GET['id'];

$data = $conn->query("SELECT * FROM products WHERE id=$id")->fetch_assoc();
?>

<form action="update.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

    Name: <input type="text" name="name" value="<?php echo $data['name']; ?>"><br>

    <button type="submit">Update</button>
</form>