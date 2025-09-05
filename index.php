<?php include("db.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Milk Tea Shop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navbar">
        <a href="add.php">➕ Add Product</a>
    </div>

    <h2>Milk Tea Shop - Product List</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price (₱)</th>
            <th>Action</th>
        </tr>

        <?php
        $result = $conn->query("SELECT * FROM products");
        while($row = $result->fetch_assoc()){
            echo "<tr>
                    <td>".$row['id']."</td>
                    <td>".$row['name']."</td>
                    <td>".$row['price']."</td>
                    <td>
                        <a href='edit.php?id=".$row['id']."'>✏️ Edit</a> 
                        <a href='delete.php?id=".$row['id']."' onclick='return confirm(\"Are you sure?\")'>🗑 Delete</a>
                    </td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>
