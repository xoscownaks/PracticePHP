<?php

  //$_FILES[속성들] 파일의 정보
  //<input name="upfile" type="file">
  //1)$_FILES['upfile']['name']
  //  -> 클라이언트 로부터 받은 파일명
  //  -> 클라이언트 컴퓨터상의 파일명
  //2)$_FILES['upfile']['type']
  //  -> 업로드된 파일을 MIME타입(신용이 불가능)
  //3)$_FILES['upfile']['size']
  //  -> 업로드된 파일의 크기(BYTE)
  //4)$_FILES['upfile']['tmp_name']
  //  -> 업로드된 파일이 보존되어 있는 임시파일명(서버 측)
  //5)$_FILES['upfile']['error']
  //  -> 업로드시에 발생한 에러를 저장
  //__FILE__  파일의 경로
  if(isset($_FILES['upfile'])){
    saveFileFunc();
  }else{
    showForm();
  }

  function showForm(){
    $script = $_SERVER['SCRIPT_NAME'];
    $maxSize = 3*1024*1024; //3m byte제한
    echo <<<UPLOADFORM
    <form action="$script" method="POST" enctype="multipart/form-data">
    파일업로드:<br>
    <input type="hidden" name="MAX_FILE_SIZE" value="$maxSize">
    <!--MAX_FILE_SIZE을 생략하고 싶으먄 php.ini에서 upload_max_filesize를 설정
        최대업로드 파일크기를 설정-->
    <input type="file" name="upfile"><br>
    <input type="submit" value="업로드">
    </form>
UPLOADFORM;
}
  function saveFileFunc(){
    $tmp_file = $_FILES['upfile']['tmp_name'];
    $upload_filename = $_FILES['upfile']['name'];
    $save_filename = dirname(__FILE__)."/".$upload_filename;
    //echo $save_filename;
    if(!is_uploaded_file($tmp_file)){
      echo "업로드 실패";
      exit;
    }
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $type=finfo_file($finfo,$tmp_file);
    //$type=$_FILES['upfile']['type'];

    if($type == 'image/jpeg'){
      echo "업로드파일을 jpg다";
    }else{
      echo "업로드 파일은 jpg가 아니다";
    }
    if(!move_uploaded_file($tmp_file,$save_filename) ){
      echo "업로드 성공";
      exit;
    }
    echo "<h1>업로드에 성공</h1>";
    $uploadfileurl = "http://127.0.0.1/myphp/".$upload_filename;
    echo "<a href='$uploadfileurl'>파일보내기</a>";
  }
?>
