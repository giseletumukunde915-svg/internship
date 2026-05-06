<?php
$folder = __DIR__ . "/uploads/";

if(is_dir($folder)) {
    echo "Uploads folder EXISTS ✅";
} else {
    echo "Uploads folder MISSING ❌";
}
?>