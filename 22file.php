<?php
  // [파일 쓰기]
  // 1)지정한 경로에 파일 쓰기가 가능한지 조사
  // 2)파일이 이미 존재하는지 조사
  // 3)파일 쓰기가 가능한지 조사
  // 4)파일쓰기
  // [파일 읽기]
  // 1)파일존재 여부 검사
  // 2)파일이 읽을 수 있는 파일인지 조사
  // 3)파일일기
  $target_dir = dirname(__FILE__);
  $target_file = $target_dir."/test.txt";

  if(!is_writable($target_dir)){
    echo "이 경로에는 파일쓰기가 불가능 : $target_dir";
    exit;
  }
  if(file_exists($target_file)){
    if(!is_writable($target_file)){
      echo "파일은 존재하지만 쓰기는 불가능 : $target_file";
      exit;
    }
  }
  file_put_contents($target_file,"세월을 아껴");
  if(!file_exists($target_file)){
    echo "파일이 존재하지 않습니다. : $target_file";
    exit;
  }
  if(!is_readable($target_file)){
    echo "파일을 읽을 수 없습니다. : $target_file";
    exit;
  }
  $result = file_get_contents($target_file);
  echo "읽으 내용 : $result";

?>
