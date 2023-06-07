<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Uploaded Files</title>
  <style>
    .file-list {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      margin: 0;
      padding: 0;
      list-style: none;
    }
    .file-item {
      display: inline-block;
      margin: 10px;
      padding: 10px;
      background-color: #f0f0f0;
      border-radius: 5px;
      text-align: center;
    }
    .file-item a {
      text-decoration: none;
      color: #333;
      font-weight: bold;
    }
    .file-item a:hover {
      color: #00a0d2;
    }
  </style>
</head>
<body>
  <h1>Uploaded Files</h1>
  <ul class="file-list">
    <?php
      // Initialize Firebase
      require_once 'autoload.php';
      use Kreait\Firebase\Factory;
      use Kreait\Firebase\ServiceAccount;

      $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'staffroom-ba24d-firebase-adminsdk-ebdut-7b8a9d69ad.json');
      $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->create();
      $storage = $firebase->getStorage();
      $bucket = $storage->getBucket('gs://staffroom-ba24d.appspot.com');
      
      // Get a list of all files in the Firebase Storage bucket
      $files = $bucket->objects();
      foreach ($files as $file) {
        // Retrieve the download URL of the file
        $url = $file->signedUrl(new \DateTime('tomorrow'));
        // Create a new HTML element to display the file
        echo '<li class="file-item"><a href="'.$url.'" target="_blank">'.$file->name().'</a></li>';
      }
    ?>
  </ul>
</body>
</html>
