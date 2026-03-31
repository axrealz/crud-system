<?php
include 'config.php';

$id = $_POST['id'];
$name = $_POST['name'];

$conn->query("UPDATE products SET name='$name' WHERE id=$id");

header("Location: index.php");
?>