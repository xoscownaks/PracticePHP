<!--php는 변수의 선언이 없다
    바로 정의하여 사용
    변수이름 앞에 $가 붙는다-->
<?php
  $price=100;
  echo $price;

  $a=100;
  $b=200;
  echo "<br />";
  echo $a;
  echo "<br />";
  $a=$b+1;
  echo "<br />";
  echo $a;
  echo "<br />";
  $a=300;
  echo "<br />";
  echo $a;

  $msg = "haha";
  echo $msg."hoho";
  //변수명앞에(_)가능
  $_ss = 12;
  echo $_ss;
  //한글가능
  $사과값 = 1600;
  $사과갯수 = 3;
  $세율 = 0.07;
  $값 = $사과값*$사과갯수;
  $세금 = $값 * $세율;
  $총금액 = $값 + $세금;

  echo "지불값 ={$총금액}"

  $str ='3.14';
  $v = 2*$str;
  echo $v;

?>
<?php
  $name = "임한기";
  $age = 23;
  $hobby = "basketBall";
  $image = "http://blog.jinbo.net/attach/615/200937431.jpg";

  echo "<html><body style='font-size:26px;'>";
  echo "<h3>자기소개</h3>";
  //변수가 언제끝나는지 모르기때문에 {}사용
  echo "<img src='$image' width='300'/><br/>";
  echo "<ul>";
  echo "<li>이름 : {$name}</li>";
  echo "<li>나이 : {$age}</li>";
  echo "<li>취미 : {$hobby}</li>";
  echo "</ul>";
  echo "</body></html>";
?>
