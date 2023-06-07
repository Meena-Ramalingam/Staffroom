<?php
require_once 'vendor/autoload.php';

use Google\Cloud\Storage\StorageClient;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $regno = $_POST['regno'];
    $category = $_POST['category'];
    $file = $_FILES['file'];

    // Upload file to Firebase Storage
    $storage = new StorageClient();
    $bucket = $storage->bucket('your-bucket-name');
    $objectName = $file['name'];
    $object = $bucket->upload(
        fopen($file['tmp_name'], 'r'),
        [
            'name' => $objectName,
            'metadata' => [
                'name' => $name,
                'regno' => $regno,
                'category' => $category,
            ]
        ]
    );

    header('Location: index.php');
    exit;
}
?>
