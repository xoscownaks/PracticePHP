<!--해당하는 월의 일들을 가져온다-->
<?php
  $year = 2016;
  $mon = 2;
  $cur = strtotime("$year-$mon-1");
  //무한루프
  for(;;){
    $cur_mon = intval(date("m",$cur));
    $d = date("d",$cur);
    if($cur_mon>$mon)break;
    echo $d."<br>";
    $cur += 24*60*60;
  }
?>
<h3>8월 계획</h3>
<?php
  showStyleTag();
  $schedule = array(13 => "조별문화체험",14=>"조별문화체험",15=>"조별문화체험",29=>"기업견학");
  showCalender(2016,8,$schedule);
  function showCalender($year,$month,$scd){
    $daysarray = array("일","월","화","수","목","금","토");
    $colorarray = array(0=>"#fff0f0",6=>"#000fff");
    $cur = strtotime("$year-$month-1");
    echo "<table>";
    for(;;){
      //월번호 구하기
      $cur_mon = intval(date("m",$cur));
      if($cur_mon>$month)break;
      //일자 구하기
      $d = date("d",$cur);
      //요일값 구하기
      $w = date("w",$cur);

      $daysname = $daysarray[$w];
      $color = isset($colorarray[$w])?$colorarray[$w]:"white";

      $i = intval($d);
      $strarray = isset($scd[$i])?$scd[$i]:"없음";

      echo "<tr style='background-color:$color'>";
      echo "<td>$d</td><td>$daysname</td><td>$strarray";
      echo "</tr>";

      $cur += 24*60*60;
    }
    echo "</table>";
  }
  function showStyleTag(){
    echo <<<MYSTYLE
    <style>
      table{
        border-top:solid 1px Black;
        border-collapse:collapse;
        border-spacing:0;
      }
      td{
        border-bottom:solid 1px Black;
        padding:6px;
        margin:0;

      }
    </style>
MYSTYLE;
}
?>

<?php
  $cur = strtotime("2016-8-1");
  echo "<br>해당월의 마지막날 ".date("t",$cur);

  $y = 2020;
  echo date("L",strtotime("$y-1-1"))==1?"<br>윤년":"<br>평소년";
?>
