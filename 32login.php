<link rel="stylesheet" href="form.css" type="text/css">
<?php
//1)사용자명과 패스워드조사
//2)로그인 상태를 세션에 저장
//3)로그인 상태인지 조사하여 웹콘텐츠를 표시
//4)로그아웃
//echo sha1("test")."<br>";
//echo sha1("qwer")."<br>";
//echo sha1("wd2j");

$users = array(
  "yjc"=>"a94a8fe5ccb19ba61c4c0873d391e987982fbbd3",
  "xmas"=>"1161e6ffd3637b302a5cd74076283a7bd1fc20d3",
  "jiral"=>"50f4cb857bde1d3bc7b5e93c19f3a3eb126f6e80"
);
$script = $_SERVER['SCRIPT_NAME'];
session_start();
if(isset($_SESSION['login'])){
  show_after_login_contents();
  exit;
}
if(isset($_POST['user'])){
  check_login();
}
else{
  show_login_form();
}
function show_login_form(){
  global $script;
  echo <<<LOGINFORM
  <div id="loginform">
  <form action='$script' method='POST'>
  <h3>로그인하세요</h3>
  <label>사용자명</label><input type="text" name="user">
  <label>패스워드</label><input type="password" name="password">
  <button type="submit">로그인</button>
  </form>
  </div>
LOGINFORM;
}
function check_login(){
  global $script, $users;
  if(empty($_POST['password'])){
    echo "비밀번호를 입력하세요";
    exit;
  }
  if(empty($_POST['user'])){
    echo "사용자명을 입력하세요";
    exit;
  }
  $realpass = $users[$_POST['user']];
  if(sha1($_POST['password'])!=$realpass){
    echo "패스워드가 들렸습니다.";
    exit;
  }
  $_SESSION['login']=array('user'=>$_POST['user']);
  echo "<a href='$script'>로그인성공</a>";
}
function show_after_login_contents(){
  $user = $_SESSION['login']['user'];
  echo "<h1>안녕하세요{$user}님</h1>";
  echo "<p>로그인 하기 힘들다</p>";
  unset($_SESSION['login']);
}
?>
