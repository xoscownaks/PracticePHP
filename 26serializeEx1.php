<?php
  //현재 php 파일이 있는경로에 를 저장하고 bbslog.txt라는 파일을 만든다
  $savefile = dirname(__FILE__)."./bbslog.txt";
  //mode는 현재 write인지 확인한다
  //처음 입력받을때는 "show"가 mode에 맞게되고 후에 write가들어간다
  $mode = isset($_GET['mode'])?$_GET['mode']:"show";
  switch ($mode) {
    case "show":
      # code...
      show();
      break;
    case "write":
      write();
      break;
    case "reset":
      reset_body();
      break;
    default:
      show();
      # code...
      break;
  }
  function reset_body(){
    //내용이 비어있는 배열을 보낸다
    save_data(array());
    $self = $_SERVER["SCRIPT_NAME"];
    echo "<a href='$self'>초기화 완료";
  }
  function show(){
    show_form();
    //보드 내용 표시
    $log = load_data();
    echo "<ul>";
    //log를 처음부터 끝까지 돌린다.
    foreach($log as $item){
      # code...
      //파일에서 특수기호등도 표시될 수 있게 htmlspecialchars을 사용
      $name = htmlspecialchars($item['namae']);
      $body = htmlspecialchars($item['body']);
      echo "<li><b style='color:red;'>$name</b>: $body</li>";
    };
    echo "</ul>";
  }

  function write(){
      //이름과 내용을 전부 적으면 if문스킵
      if($_GET['namae']=="" || $_GET['body']==""){
        echo "이름이나 본문이 비었다.";
        exit;
      }
      $log = load_data();
      //$_GET으로 가져온 값들을 $log라는 배열의 앞에 첨가한다.
      array_unshift($log,$_GET);
      //
      save_data($log);
      $self = $_SERVER['SCRIPT_NAME'];
      echo "<a href='$self'>저장함</a>";
  }
  function save_data($savedata){
    global $savefile;
    //php값을 문자열 스트링으로 직렬화
    $txt = serialize($savedata);
    //savefile의 경로에 $txt를 스트링으로 저장
    file_put_contents($savefile,$txt);
  }
  function load_data(){
    //$savefile을 전역변수로 선언된것을 가져와 사용가능
    global $savefile;
    $log = array();
    //파일이 존재하는지 확인
    if(file_exists($savefile)){
      //파일이있으면 그 파일을 문자열을 가져온다
      $txt = file_get_contents($savefile);
      //문자열이 들어간 파일을 직렬화를 해제해준다 스트링문자열 -> php값
      $log = unserialize($txt);
    }
    //php값이 있는 log리턴
    return $log;
  }

  function show_form(){
    echo <<<FORM
    <form>
      ★이름 : <input type="text" name="namae" size="8">
      ★본문 : <input type="text" name="body" size="30">
      <input type="submit" value="쓰기">
      <input type="hidden" name="mode" value="write">
    </form>
    <form>
      <input type="submit" value="초기화">
      <input type="hidden" name="mode" value="reset">
    </form>
    <hr>
FORM;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <script type="text/javascript">
      function reset_body(){
        alert("<?echo reset_body();?>")
      }
    </script>
  </head>
  <body>

  </body>
</html>
