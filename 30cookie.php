<?php
  //문자를 지시한대로 나타내기

  //자신을 참조하는 변수
  $self = $_SERVER['SCRIPT_NAME'];
  //
  if(isset($_GET['size'])){
    $size = intval($_GET['size']);
    if($size < 12 || $size > 72){
      echo "사이즈의 지정범위 밖";
      exit;
    }
    //setcookie(변수명,값,[유효기간],[경로],[도메인],[보안],[http만 사용여부])
    //[]는 생략해도 가능한것

    //1년후의 시간을 저장 유효기간
    $expire = time()+(24*60*60)*365;
    //쿠키저장
    setcookie("size",$size,$expire);

    //setcookie(변수명,"",time()-3600(과거)); 쿠키삭제
    //쿠키 특징
    //1.4096 bytes만 기록가능
    //2.저장가능 쿠키 정보 갯수 제한
    //3.보안에 취약(위조가능성 있음)

    //f5와 비슷한 효과
    header("location:".$self);
    exit;
  }
  $size=26;
  if(isset($_COOKIE['size'])){
    $size = intval($_COOKIE['size']);
  }
  echo <<<FORM
  <html>
  <body style='font-size:$size'>
    <div style='background-color:yellow; text-align:right;'>
    문자크기 : [<a href='$self?size=70'>대</a>]
              [<a href='$self?size=40'>중</a>]
              [<a href='$self?size=12'>소</a>]
    </div>
FORM;
?>
<p>안녕하세요 여러분, 좋은아침입니다</p>
<p>오늘같이 좋은날에는 모두같이 밖으로 여행을 떠나야겠죠</p>
<p>다 같이 짐을 싸고 공기좋고 물좋으며 신기한 친구들이많은 협곡으로 갑시다</p>


</body>
</html>
