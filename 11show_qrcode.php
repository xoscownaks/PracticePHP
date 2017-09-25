<!--http://chart.apis.google.com/chart?cht=qr&chs=350x350&chl={담고싶은 문자열 정보} -->
<?php
  $param = "";
  if(isset($_GET["param"])){
    $param = $_GET["param"];
  }
  switch ($param) {
    case "big-qr":
      # code...
      show_qrcode(300);
      break;
    case 'small-qr':
      show_qrcode(150);
      break;
    default:
      show_form();
      break;
  }

  function show_form(){
    //html 코드를 작성가능
    echo <<<END_FORM
    <form>
    <h3>QR코드로 변환 하고싶은 문자열과 이미지크기 변경</h3>
    <input type="text" name="url"/>
    <select name="param">
      <option value= "big-qr">크게</option>
      <option value= "small-qr">작게</option>
    </select>
    <input type="submit" value="qr코드 생성"/>
    </form>
END_FORM;
//here document
}
  function show_qrcode($size){
    //url을 인코드해서 한글도 가능하게한다. 보통적으로 사용
    $url = urlencode($_GET["url"]);
    $api = "http://chart.apis.google.com/chart?cht=qr&";
    $src = $api."chs={$size}x{$size}&chl={$url}";
    echo "<img src='$src'>";
  }
?>
