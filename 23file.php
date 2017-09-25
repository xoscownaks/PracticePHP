<?php
  //1)파일 열기 -fopen()
  //파일핸들 = fopen(파일명,여는옵션);
  //여는옵션
  //  -r : 파일 읽기모드
  //  -w : 파일 쓰기모드(기존에 파일이있으면 덮어쓴다,기존의것은 초기화)
  //  -a : 파일 추가모드(파일 포인터가 EOF(End Of File)로 이동)
  //  -r+,w+ : 읽고 쓰기 모드(포인터가 파일 가장 앞에있다)
  //반환값 : 파일핸들
  $handler_r = fopen("old.txt","r");
  $handler_w = fopen("new1.txt","w");
  //2)파일 사용 : 파일핸들을 사용
  //feof 파일의 포인터가 EOF인지 확인, 끝이 아니면 반복
  while(!feof($handler_r)){
    //파일의 포인터에서 라인을 받아온다, 문자형반환
    $line = fgets($handler_r);
    //str_replace(기존내용,바꿀내용,쓸곳)
    $line = str_replace("old@","new@",$line);
    //바이트의 개수를 반환
    fwrite($handler_w,$line);

  }
  //3)파일 닫기
  fclose($handler_r);
  fclose($handler_w);
  echo "파일처리완료";
?>
