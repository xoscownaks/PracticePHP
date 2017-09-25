<?php
  //현재 PHP파일의 경로를 갖는 상수 __FILE__
  echo "<br>".__FILE__;
  //부모 디렉토리 경로
  echo "<br>".dirname(__FILE__);
  $target_dir = dirname(__FILE__);
  //target_dir경로에 test.txt파일이 만들어진다
  $target_file = $target_dir."/test.txt";
  //file_get_contents(경로, 내용)
  file_put_contents($target_file,"넌 이미 죽어있다 단지 아직 깨닫지 못했을 뿐");
  $str = file_get_contents($target_file);
  echo "<br>쉔의 명언 :".$str;

  //old.txt파일읽기
  $txt = file_get_contents("old.txt");
  echo "<br>$txt";
  //앞의 적은 문장을 뒤의 문장으로 바꾼다.
  $txt = str_replace("old@yjc.ac.kr","new@yjc.ac.kr",$txt);
  echo "<br>$txt";
  file_put_contents("new.txt",$txt);
  echo "<br>ok!!!";
?>
