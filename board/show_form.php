<link rel="stylesheet" href="form.css" type="text/css">
<?php
$self = $_SERVER['SCRIPT_NAME'];
//12345 => 8cb2237d0679ca88db6464eac60da96345513964
//456 => 51eac6b471a284d3341d8c0c63d0f1a286262a18
$userArray = array();

session_start();

show_form();
if(isset($_POST['mode'])){
  $mode = $_POST['mode'];
}

if($mode=="join"){
  new_join();
}else{

}


function new_join(){
  global $userArray;
  if(empty($_POST['id'])){
    echo("<script>alert('ID를 입력하세요');</script>");
    exit;
  }
  if(empty($_POST['pw'])){
    echo("<script>alert('PASSWORD를 입력하세요');</script>");
    exit;
  }

  {
    $id = $_POST['id'];
    $pw = $_POST['pw'];
    array_push($userArray,$id,$pw);
  }
}

function show_form(){
  global $self;
  echo <<<LOGINFORM
  <div id="loginform">
  <form action="$self" method='POST'>
  <h3>로그인</h3>
  <label>ID:</label><input type="text" name="id">
  <label>PW:</label><input type="password" name="pw">
  <input type="submit" value="로그인">
  <input type="hidden" name="mode" value="login">
  </form>
  <form method='POST'>
    <input type="submit" value="회원가입">
    <input type="hidden" name="mode" value="join">
  </form>
  </div>
LOGINFORM;
}
?>
