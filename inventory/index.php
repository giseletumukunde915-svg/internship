<?php
$conn = new mysqli("localhost","root","","inventory");

// ADD PRODUCT
if(isset($_POST['add'])){
  $conn->query("INSERT INTO products(name,qty,price)
  VALUES('{$_POST['name']}','{$_POST['qty']}','{$_POST['price']}')");
}

// DELETE
if(isset($_GET['del'])){
  $conn->query("DELETE FROM products WHERE id={$_GET['del']}");
}

// UPDATE QTY
if(isset($_POST['update'])){
  $conn->query("UPDATE products SET qty='{$_POST['qty']}' WHERE id={$_POST['id']}");
}
?>

<h2>Inventory System</h2>

<!-- ADD FORM -->
<form method="POST">
  <input name="name" placeholder="Name">
  <input name="qty" type="number" placeholder="Qty">
  <input name="price" type="number" placeholder="Price">
  <button name="add">Add</button>
</form>

<br>

<!-- LIST -->
<table border="1" cellpadding="5">
<tr><th>ID</th><th>Name</th><th>Qty</th><th>Price</th><th>Action</th></tr>

<?php
$res = $conn->query("SELECT * FROM products");
while($row = $res->fetch_assoc()){
?>
<tr>
<td><?= $row['id'] ?></td>
<td><?= $row['name'] ?></td>

<td>
<form method="POST">
  <input type="hidden" name="id" value="<?= $row['id'] ?>">
  <input name="qty" value="<?= $row['qty'] ?>">
  <button name="update">Update</button>
</form>
</td>

<td><?= $row['price'] ?></td>

<td>
<a href="?del=<?= $row['id'] ?>">Delete</a>
</td>
</tr>
<?php } ?>

</table>