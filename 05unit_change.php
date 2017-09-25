<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>inch -> cm</title>
    <style media="screen">
      body{
        font-size: 25px;
        background-color: #cccccc;
      }
    </style>
  </head>
  <body>
    <h1>인치에서 센치로 변환 프로그램</h1>

    <?php
      //isset은 변수가 설정되어있는지 확인한다.
      if(isset($_POST['inch'])){
        $inch = $_POST["inch"];
        //floatval은 float값만 져온다.
        $inch = floatval($inch);
        $cm = 2.54*$inch;
        echo "<div>(결과){$inch}인치 = {$cm}센치미터</div>";
      }else{
        //SCRIPT_NAME은 현재 소스코드 파일의
        //URL 주소를 가져온다.
        //결국 자기자신을 가져온다.
        $self = $_SERVER["SCRIPT_NAME"];

        echo "<form action='$self' method='POST'>";
        echo "<input type='text' name='inch' value='' />";
        echo "<input type='submit' value='계산' />";
        echo "</form>";
      }
    ?>
  </body>
</html>
