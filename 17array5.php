<?php
/*
  $변수 = array_shift($배열);
  $배열 = array(1,2,3,4,5);
  $변수 = array_shift($배열);
  //위처럼 하면 $변수에 1이 저장되고 $배열에는 2,3,4,5가 저장
  //배열의 선두내용이 반환된뒤 선두내용 삭제

  array_unshift($배열, 삽입하고싶은값);
  //삽입하고싶은 값이 $배열의 앞부분에 추가

  $변수 = array_pop($배열);
  //$변수에 5가 저장되고 $배열은 1,2,3,4가 된다.

  array_push($배열,삽입하고싶은값);
  //삽입하고싶은값이 $배열 후미에 추가된다

  $배열1 = array_reverse($배열);
  //$배열1에 $배열의 값이 거꾸로 들어간다
  //$배열1은 5,4,3,2,1을 저장

  count($배열);
  //배열 요소 갯수 반환
  print_r($배열)
  //배열 요소를 출력

  shuffle($배열);
  //섞기

  $배열1 = array_slice($배열,자르고싶은위치,갯수);
  //$배열에서 자르고싶은위치부터 갯수만큼 잘라서 $배열1에 저장

  $배열1 = array_splice($배열,자르고싶은위치, 갯수[,$배열2]);
  //배열에서 자르고싶은위치에서 갯수만큼 잘라서
  //반환하고 배열2에 치환
  */
  ?>
  <pre>
<?php
  $a = array(100,101,102);
  array_unshift($a,50,51,52);
  print_r($a);

  $b = array(100,101,102);
  array_push($b,50,51,52);
  print_r($b);
  $b[] = 200;
  $b[] = 201;
  $b[] = 202;
  print_r($b);
?>
