<?php
  function myAdd($a,$b){
    $c = $a + $b;
    return $c;
  }
  echo myAdd(4,5)."<br>";
  echo myAdd(6,15)."<br>";

  function set_cvalue(){
    $c=30;
  }
  $c=10;
  set_cvalue();
  echo $c."<br>";

  function set_cvalue2(){
    //전역변수로 사용
    global $c;
    $c=30;
  }
  $c=25;
  set_cvalue2();
  echo $c."<br>";
?>
