<?php include("db.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navbar">
        <a href="index.php">🏠 Home</a>
    </div>

    <?php
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $price = $_POST['price'];

        $sql = "INSERT INTO products (name, price) VALUES ('$name','$price')";
        if($conn->query($sql)){
            header("Location: index.php");
        } else {
            echo "Error: ".$conn->error;
        }
    }
    ?>

    <h2>Add Product</h2>
    <form method="POST">
        <label>Name:</label>
        <input type="text" name="name" required><br>
        <label>Price:</label>
        <input type="number" name="price" required><br>
        <button type="submit" name="submit">Save</button>
    </form>
</body>
</html>
