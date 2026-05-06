<!DOCTYPE html>
<html>
<head>
    <title>Upload Image</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Upload Image</h1>

    <div class="upload-box">
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="image" required><br><br>
            <button type="submit">Upload</button>
        </form>
    </div>

    <a href="index.php">📷 View Gallery</a>
</div>

</body>
</html>