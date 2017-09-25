<?php
  $weatherDataUrl = "http://weather.livedoor.com/forecast/rss/area/400010.xml";
  //양옆의 공백을 제거한다.
  //@는 에러가 발생하여도 오류 메시지를 표시하지 않는다.
  $s = trim(@file_get_contents($weatherDataUrl));
  //문자열로 나열된것을 xml형식으로 보이게한다.
  $xml = simplexml_load_string($s);
  //변수에 대한 정보를 사람이 읽을 수 있게 보여준다.
  //print_r($xml);
  //php에서 xml 객체에 요소 접근
  //$xml 객체명->엘리먼트명->엘리먼트명
  $title = $xml->channel->title;
  foreach ($xml->channel->item as $val) {
    $val_title = strval($val->title);
    echo "  -  $val_title<br>";
  }
?>
