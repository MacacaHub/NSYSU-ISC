<?php
session_start();
include_once("navbar.php");

$msg = "";

if ($_SESSION['username'] != 'admin') {
  die('You are not the admin!');
}

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  $msg = "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  $msg = "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $msg = "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="js/fileValidation.js"></script>
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
  <form action="fileUpload.php" method="post" enctype="multipart/form-data">
    <?php
      echo $msg;
    ?>
    <input type="file" id="fileToUpload" name="fileToUpload" onchange="return fileValidation()">
    <input type="submit" value="Upload Image" name="submit">
  </form>
</body>

</html>
