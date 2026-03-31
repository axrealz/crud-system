<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>

    <style>
    body {
        font-family: Arial;
        background: #f4f6f9;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        width: 400px;
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    h1 {
        text-align: center;
        margin-bottom: 15px;
    }

    input, textarea, select {
        width: 100%;
        padding: 10px;
        margin: 8px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button {
        width: 100%;
        padding: 10px;
        background: #007bff;
        border: none;
        color: white;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background: #0056b3;
    }
    </style>

</head>
<body>

<div class="container">
    <h1>Add Product</h1>

    <form action="insert.php" method="POST" enctype="multipart/form-data">

        <!-- NAME -->
        <input type="text" name="name" placeholder="Product Name" required>

        <!-- DESCRIPTION -->
        <textarea name="description" placeholder="Description"></textarea>

        <!-- CATEGORY -->
        <select name="category_id" required>
            <option value="">Select Category</option>
            <?php
            $cat = $conn->query("SELECT * FROM categories");
            while($row = $cat->fetch_assoc()){
                echo "<option value='{$row['id']}'>{$row['name']}</option>";
            }
            ?>
        </select>

        <!-- BRAND -->
        <select name="brand_id" required>
            <option value="">Select Brand</option>
            <?php
            $brand = $conn->query("SELECT * FROM brands");
            while($row = $brand->fetch_assoc()){
                echo "<option value='{$row['id']}'>{$row['name']}</option>";
            }
            ?>
        </select>

        <!-- IMAGE -->
        <input type="file" name="image" accept="image/*" required>

        <button type="submit">Save</button>

    </form>
</div>

</body>
</html>