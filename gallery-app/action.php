<?php
$folder = __DIR__ . "/uploads/";

// DELETE IMAGE
if(isset($_GET['delete'])) {
    $file = $folder . $_GET['delete'];

    if(file_exists($file)) {
        unlink($file);
    }

    header("Location: index.php");
    exit();
}

// LIKE IMAGE
if(isset($_GET['like'])) {
    $file = $_GET['like'];
    $likesFile = "likes.txt";

    $likes = [];

    if(file_exists($likesFile)) {
        $likes = json_decode(file_get_contents($likesFile), true);
    }

    if(!isset($likes[$file])) {
        $likes[$file] = 0;
    }

    $likes[$file]++;

    file_put_contents($likesFile, json_encode($likes));

    header("Location: index.php");
    exit();
}
?>