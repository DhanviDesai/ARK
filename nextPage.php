<?php
include(config.php);
if(isset($_GET['prod_id'])){
  $id = $_GET['prod_id'];
  $id++;
  header("Location: detailed.php?prod_id=".$id);
}

 ?>
