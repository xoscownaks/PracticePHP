<?php
  $i = 2;
  if($i == 1)
    echo "1"."입니다";
  if($i == 2)
    echo "2"."입니다";

  $v = 102;
  if($v % 2 == 0 && $v % 3 == 0){
    echo "<br>{$v}는 2의 배수이고 3의 배수 입니다.";
  }
  $v = 50;
  $v = $v + 20;
  echo "<br>{$v}";
  $v = 50;
  //계산시 {}는 사용 불가 echo {$v}+20;
  $point = 12;
  $point++;
  echo "<br>{$point}";

  $a = 30;
  echo "<br>".++$a;

  $a = 6;
  $a*= 2; //$a = %a * 2;
  echo "<br>".$a;

?>
