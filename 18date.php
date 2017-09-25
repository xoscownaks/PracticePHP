  <!--
  date_default_timezone_set("Asia/Seoul");
  //php.ini파일 내의 [Date]항목
  //date.timezon = Asia/Seoul로 설정되어 있으면 생략가능
  //현재시간을 UNIX Epoch(POSIX)시간으로 알아내기
  $now = time();
  echo $now/7/24/60/60;
  //date('서식'[,타임스탬프]);
  function show_div($color,$str){
    $str = htmlspecialchars($str);
    echo "<div style='color:$color;'>$str</div>";
  }
  show_div('red',date("Y/m/d",$now));
  show_div('blue',date("H:i:s",$now));
  show_div('green',date("Y-m-d",$now));
  show_div('cyan',date("Y/m/d l",$now));
  show_div("yellow",date("c",$now));  //국제표준규격
  show_div("yellow",date("r",$now));
  //strfrime (서식[,타임스탬프])
  echo date("Y-m-d H:i:s")."<br>";
  echo strftime("%Y-%m-%d %H:%M:%S");*/
-->
<?php
  $targetdate = mktime(0,0,0,07,31,2016);
  echo $targetdate."<br>";

  $now = time();
  echo $now."<br>";

  $chai = $targetdate - $now;
  echo "일본가기까지 ".date("d",$chai)."일 남았습니다"."<br>";
?>
<?php
  $today = time();
  $result = $today+3*24*60*60;
  echo "오늘은".date("Y년m월d일",$today)."<br>";
  echo "삼일후는".date("Y년m월d일",$result),"<br>";

  //mktime(시,분,초,월,일,년);
  $name = '현지학기 출발일';
  $schedule = strtotime("2016-07-31");
  $today = time();

  $interval = $schedule - $today;

  $days = $interval/(24*60*60);
  echo ceil($days);

  $t = strtotime("next monday",time());
  echo date($t);
?>
