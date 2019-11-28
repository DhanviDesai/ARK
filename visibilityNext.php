<?php

  $needed = $id+1;
  $sql = "SELECT * FROM ark.product where prod_id = '$needed'";
  $result = mysqli_query($db,$sql);
  $count = mysqli_num_rows($result);
  if($count == 1){
    echo 'visible';
  }
  else{
    echo 'hidden';
  }

 ?>
