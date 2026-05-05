<?php
include "connect.php";

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $stmt = $conn->prepare("UPDATE products SET name=?, price=?, quantity=? WHERE id=?");
    $stmt->bind_param("sdii", $name, $price, $quantity, $id);

    if ($stmt->execute()) {
        echo "Updated!";
    }
}

$result = $conn->query("SELECT * FROM products WHERE id=$id");
$product = $result->fetch_assoc();
?>

<form method="POST">
    <input type="text" name="name" value="<?= $product['name'] ?>"><br>
    <input type="number" step="0.01" name="price" value="<?= $product['price'] ?>"><br>
    <input type="number" name="quantity" value="<?= $product['quantity'] ?>"><br>
    <button type="submit">Update</button>
</form>