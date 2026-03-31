<?php
include 'config.php';

// GET DATA (with safety)
$name = $_POST['name'] ?? '';
$desc = $_POST['description'] ?? '';
$category = $_POST['category_id'] ?? '';
$brand = $_POST['brand_id'] ?? '';

// CHECK REQUIRED FIELDS
if (empty($name) || empty($category) || empty($brand)) {
    die("Error: Please fill all required fields!");
}

// IMAGE UPLOAD
$image = $_FILES['image']['name'] ?? '';
$tmp = $_FILES['image']['tmp_name'] ?? '';

if (!empty($image)) {
    $folder = "uploads/" . $image;

    // move file
    move_uploaded_file($tmp, $folder);
} else {
    $image = "default.png"; // optional fallback
}

// INSERT
$sql = "INSERT INTO products (name, description, category_id, brand_id, image)
VALUES ('$name', '$desc', '$category', '$brand', '$image')";

if ($conn->query($sql)) {
    header("Location: index.php");
    exit;
} else {
    echo "Error: " . $conn->error;
}
?>