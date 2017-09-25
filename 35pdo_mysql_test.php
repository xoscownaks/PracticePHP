<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>sql테스트</title>
    <style>
      body{
        background-color:#f0f0f0;
      }
    </style>
  </head>
  <body>

    <?php
    //PDO : PHP Data Object
    //가볍고 성능이 좋은 DB라이브러리
    //$DB객체명 = new PDO(접속문자열,[사용자명],[패스워드],[옵션]);
    //$결과 = $DB객체명->exec(sql문장);   반환값 int형
    //$결과(PDOstatement) = $DB객체명->query(sql문장);
    $query = isset($_GET['query'])?$_GET['query']:"";
    //쿼리를 html객체로 만든다
    $q_html = htmlspecialchars($query);
    echo <<<QUERYFORM
      <form>
        <div>
          SQL문장 기술:
        </div>
        <textarea name='query' rows='7' cols='80'></textarea>
        <div>
          <input type="submit" value="실행">
        </div>
      </form>
QUERYFORM;
//include_once php파일  해당 파일을 포함한다
if($query=""){
  $host = "127.0.0.1";
  $db_name = "phptest";
  $user = 'root'; //사용자 id
  $pass = "node"; //사용자 비밀번호

  try {
    $db = new PDO(
      //mysql 서버의 주소와 db명을 지정
      "mysql:host=$host;dbname=$db_name",
      $user,
      $pass,
      //MYSQL_ATTR_INIT_COMMAND 예약 상수
      //초기화하는 명령
      //utf8로 설정하여 접속하는 옵션
      array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8")
    );
    //접속한 PDO속성 ERROR가 발생시 예외만 발생
    //ATTR_ERRMODE에러 리포팅 ERRMODE_EXCEPTION예외로 던짐
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (Exception $e) {
    echo $e->getMessage();
  }
  try {
    $html = $head = "";
    //배열형태
    foreach ($db->query($query,PDO::FETCH_ASSOC) as $row) {
      if($head==""){
        //row는 연관배열
        $keys=array_keys($row);
        $head .= "<tr>";  //$head=$head."<tr>"
        foreach ($keys as $c) {
          $c_html = htmlspecialchars($c);
          $head.="<th>{$c_html}</th>";
          //<tr><th>user_id</th>
          // <th>name</th>
          // <th>email</th>
          // <th>memo</th>
          //</tr>
        }
        $head.="</tr>";
      }
      $html.="<tr>";
      foreach ($row as $c) {
        $c_html = htmlspecialchars($c);
        $html .= "<td>{$c_html}</td>";
      }
      $html.="</tr>";
    }
    echo "<p style='font-weight:bold; color:blue'>실행완료</p>";
    echo "<table border='1' bgcolor='#fff' cellpadding='4'>";
    echo $head.$html;
    echo "</table>";
  } catch (Exception $e) {
    echo "<div style='color:red'>{$e->getMessage()}</div>";
  }

}
?>
  </body>
</html>
