<!DOCTYPE html>
<html>
<head>
    <title>Gallery</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>📸 Image Gallery</h1>
<a href="form.php">⬆ Upload New Image</a><br><br>

<div class="gallery">

<?php
$folder = "uploads/";
$files = scandir($folder);

// load likes
$likesFile = "likes.txt";
$likes = [];

if(file_exists($likesFile)) {
    $likes = json_decode(file_get_contents($likesFile), true);
}

foreach($files as $file) {
    if($file != "." && $file != "..") {

        $count = isset($likes[$file]) ? $likes[$file] : 0;

        echo "
        <div class='card'>
            <img src='$folder$file'>

            <div class='actions'>
                <a href='action.php?like=$file'>
                    <button style='background:red;color:white;'>❤️ $count</button>
                </a>

                <a href='action.php?delete=$file' onclick=\"return confirm('Delete this image?')\">
                    <button style='background:black;color:white;'>🗑 Delete</button>
                </a>
            </div>
        </div>
        ";
    }
}
?>

</div>

</body>
</html>