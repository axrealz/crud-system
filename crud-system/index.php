<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Products</title>

<style>
body {
    font-family: Arial;
    background: #f4f6f9;
    padding: 20px;
}

.container {
    max-width: 900px;
    margin: auto;
    background: white;
    padding: 20px;
    border-radius: 10px;
}

h1 {
    text-align: center;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
}

th, td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
    text-align: center;
}

th {
    background: #007bff;
    color: white;
}

img {
    border-radius: 5px;
}

a {
    text-decoration: none;
    color: blue;
}
</style>

</head>
<body>

<div class="container">

<h1>Product List</h1>

<a href="create.php">+ Add New</a>

<table>
<tr>
    <th>Image</th>
    <th>Name</th>
    <th>Description</th>
    <th>Category</th>
    <th>Brand</th>
    <th>Action</th>
</tr>

<?php
$sql = "SELECT products.*, 
        categories.category_name AS category, 
        brands.brand_name AS brand
        FROM products
        JOIN categories ON products.category_id = categories.id
        JOIN brands ON products.brand_id = brands.id";

$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
?>
<tr>
    <td><img src="uploads/<?php echo $row['image']; ?>" width="80"></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['description']; ?></td>
    <td><?php echo $row['category']; ?></td>
    <td><?php echo $row['brand']; ?></td>
    <td>
        <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
        <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
    </td>
</tr>
<?php } ?>

</table>

</div>

</body>
</html>