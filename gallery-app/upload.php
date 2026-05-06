<?php
$folder = __DIR__ . "/uploads/";

if(isset($_FILES['image'])) {

    $file = $_FILES['image'];

    // Clean filename
    $cleanName = preg_replace("/[^a-zA-Z0-9.]/", "_", basename($file["name"]));
    $fileName = time() . "_" . $cleanName;

    $target = $folder . $fileName;

    $fileType = strtolower(pathinfo($target, PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'gif'];

    if(in_array($fileType, $allowed)) {

        if($file["size"] < 2000000) {

            if(move_uploaded_file($file["tmp_name"], $target)) {
                echo "<script>alert('Upload successful!'); window.location='index.php';</script>";
            } else {
                echo "Upload failed. Check uploads folder.";
            }

        } else {
            echo "File too large (max 2MB).";
        }

    } else {
        echo "Only JPG, PNG, GIF allowed.";
    }
}
?>
