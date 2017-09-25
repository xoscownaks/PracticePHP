<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>폼태그 예</title>
  <style>
     body{
       font-size: 20px;
     }
  </style>
</head>
<body>
<?php
  //클라이언트가 GET방식으로 요청시
  //클라이언트의 요청정보를 저장한 배열
  //연관배열 키와 값이 쌍으로 들어간다.
  //포스트 $_POST[]
  $q = $_GET["q"];

  //특수문자를 html엔티티로 변환, 태그도 화면에 표시하고 싶을때도 사용(가능한 사용)
  $q_html = htmlspecialchars($q);

  echo "<div>{$q}씨, 안녕하세요.</div>"
?>
</body>
</html>
