<?php

include('config.php');
if(isset($_GET['prod_id']) and isset($_GET['uid'])){
  $uid = $_GET['uid'];
  $prod_id = $_GET['prod_id'];
  $sql = "DELETE FROM account_util where uid = '$uid' and prod_id='$prod_id'";
  $result = mysqli_query($db,$sql);
  header('Location: account.php?uid='.$uid);
}else{
  echo "hi";
}


 ?>
