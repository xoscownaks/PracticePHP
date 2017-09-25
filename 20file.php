<?php
  //파일을 읽어온다.
  $pass = file_get_contents("./pw.txt");
  //hash코드값으로 만든다.
  $hassged_pw = sha1($pass);
  echo "<br>$pass";
  echo "<br>$hassged_pw";
  $salt="eetaowisdkfjkja";
  //암호와 자신이 만든 암호를 함쳐서 비교
  $pass_salt = $pass.$salt;
  $hashed_pw2 = hash("sha512",$pass_salt);
  echo "<br>$hashed_pw2";
?>
