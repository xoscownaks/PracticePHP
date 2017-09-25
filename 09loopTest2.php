<?php
  echo "<form>";
  for($i = 1;$i <= 100;$i++){
    echo "<input type='submit' name='btn' value='{$i}' style='width:48px;'/>";
  }
  echo "</form>";
  if(isset($_GET["btn"])){
    $btn = $_GET["btn"];
    echo "<p>{$btn}번 버튼 클릭</p>";
  }
?>
