<?php
  $list = array("애플"=>300,"바나나"=>130,"오렌지"=>200);
  //file_put_contents("fruits.txt",$list);
  //$read_list = file_get_contents("fruits.txt");
  //echo $read_list["바나나"];
  //php에서 데이터를 파일에 저장할때는 serialize(직렬화) 해서 저장하고
  //serialize(직렬화)하여 저장한 데이터는 사용하고 싶으면 unserialize해야한다.
  $serial_list = serialize($list);
  //보존데이터 = serialize(원본데이터)
  file_put_contents("fruits.txt",$serial_list);
  $read_list = file_get_contents("fruits.txt");
  //읽을려는 데이터 = unserialize(읽어온 데이터)
  $unserial_list = unserialize($read_list);
  echo "시리얼예제:".$unserial_list["바나나"]."<br>";

  //값이 들어오면 json문자열로 반환
  $json_encode_data = json_encode($list);
  file_put_contents("fruits1.txt",$json_encode_data);
  $readdata = file_get_contents("fruits1.txt");
  $json_decode_data = json_decode($readdata);
  echo "json예제".$json_decode_data->{"바나나"};
?>
