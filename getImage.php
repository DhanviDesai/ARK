<?php
include("config.php");

  $id = $_GET['id'];
echo $id
  // do some validation here to ensure id is safe
  $sql = "SELECT image FROM prouct WHERE id=$id";
  $result = mysqli_query("$db,$sql");
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  mysql_close($link);

  header("Content-type: image/jpeg");
  echo $row['image'];
?>
