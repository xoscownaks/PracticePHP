<?php
  //세션
  session_start();
  //unset($_SESSION["변수명"]); 세션 정보지우기
  //

  $list = array(
    "금가방"=>300,
    "은지갑"=>200,
    "진주피어스"=>120,
    "다이아반지"=>250
  );
  echo "<h3>상품리스트</h3><ul>";
  $self = $_SERVER['SCRIPT_NAME'];
  foreach ($list as $key => $value) {
    //한글을(문자열)을 주소열에 인코딩할때 사용
    //$list에 있는 key값이 한글이기 때문에 사용
    $p = urlencode($key);
    echo "<li><a href='$self?p=$p'>$key({$value})만원</a></li>";
  }
  echo "</ul>";
  if(isset($_GET['p'])){
    $item = $_GET['p'];
    if(!isset($list[$item])){
      echo "해당 상품은 구매불가";
      exit;
    }
    $history = array();
    if(isset($_SESSION['history'])){
      $history = $_SESSION['history'];
    }
    $history[] = array("item"=>$item,"time"=>time());
    //$history[$i]=>item:item명,"time"=:시간
    $_SESSION['history']=$history;
    echo "<h2>구매상품: $item</h2>";
  }
  if(isset($_SESSION['history'])){
    echo "<h3>구매이력</h3>";
    $history = $_SESSION['history'];
    foreach ($history as $value) {
      $name = $value["item"];
      $time = date("m/d H:i:s",$value["time"]);
      $price = $list[$name];
      echo "<li>$time: $name({$price}만원)구매</li>";
    }
    echo "</ul>";
  }

?>
