<?php include("db.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navbar">
        <a href="index.php">🏠 Home</a>
    </div>

    <?php
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM products WHERE id=$id");
    $product = $result->fetch_assoc();

    if(isset($_POST['update'])){
        $name = $_POST['name'];
        $price = $_POST['price'];

        $sql = "UPDATE products SET name='$name', price='$price' WHERE id=$id";
        if($conn->query($sql)){
            header("Location: index.php");
        } else {
            echo "Error: ".$conn->error;
        }
    }
    ?>

    <h2>Edit Product</h2>
    <form method="POST">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $product['name']; ?>" required><br>
        <label>Price:</label>
        <input type="number" name="price" value="<?php echo $product['price']; ?>" required><br>
        <button type="submit" name="update">Update</button>
    </form>
</body>
</html>
