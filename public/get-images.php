<?php
$imageFolder = 'images/products/';
$images = [];

if (is_dir($imageFolder)) {
    $files = scandir($imageFolder);
    foreach ($files as $file) {
        if ($file[0] !== '.' && in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $images[] = $imageFolder . $file;
        }
    }
}

header('Content-Type: application/json');
echo json_encode($images);
?>
