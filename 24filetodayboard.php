<?php

$master_pw = 'imgo';
$savefile = dirname(__FILE__)."/msg.txt";
if(isset($_POST['msg'])){
  $pass = isset($_POST['pass'])?$_POST['pass']:"";
  if($pass != $master_pw){
    echo "패스워드가 틀림";
    exit;
  }
  file_put_contents($savefile,$_POST['msg']);
  header('Location: http://127.0.0.1/myphp/25filetodayboard_read.php/');
}
else{
  //현재 파일 경로
  $self = $_SERVER['SCRIPT_NAME'];
  echo <<<FORM
  <form method="POST" action"$self">
    <textarea name="msg" cols="60" rows="10">
    메시지 입력
    </textarea><br>
    패스워드 : <input type="password" name="pass" value="">
    <input type="submit" value="기록">
  </form>
FORM;
}
?>
