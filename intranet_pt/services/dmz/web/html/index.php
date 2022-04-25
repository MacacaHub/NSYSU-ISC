<?php
session_start();
include_once("navbar.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">WebSite</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="/index.php">Home</a></li>
        <li><a>Welcome <?php echo $_SESSION['username']; ?> </a></li>
        <?php
        if (isset($_SESSION['username'])) {
          echo '<li><a href="/logout.php">logout</a></li>';
        } else {
          echo '<li><a href="/login.php">login</a></li>';
        }
        ?>
        <li><a href="/fileUpload.php">fileUpload</a></li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <?php
    $imagesDirectory = "uploads/";

    if (is_dir($imagesDirectory)) {
      $opendirectory = opendir($imagesDirectory);

      while (($image = readdir($opendirectory)) !== false) {
        if (($image == '.') || ($image == '..')) {
          continue;
        }

        $imgFileType = pathinfo($image, PATHINFO_EXTENSION);

        if (($imgFileType == 'jpg') || ($imgFileType == 'jpeg') || ($imgFileType == 'jfif') || ($imgFileType == 'png')) {
          echo "<img src='uploads/" . $image . "' width='200'> ";
        }
      }

      closedir($opendirectory);
    }
    ?>
  </div>

</body>

</html>