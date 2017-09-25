<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>비만도, 체질량 계산</title>
    <style media="screen">
      body{
        font-size: 25px;
      }
    </style>
  </head>
  <body>
    <div>

    </div>

    <?php
      if(isset($_POST['height']) && isset($_POST['weight'])){
        $mTocm = 0.01;
        $height = $_POST['height']*$mTocm;
        $weight = $_POST['weight'];
        $bmi = ceil($weight/pow($height,2));

        echo "당신의 BMI는 ={$bmi}입니다.";
      }else{
        $self = $_SERVER["SCRIPT_NAME"];
        echo "<form action='$self' method='POST'>";
        echo "키 입력<input type='text' name='height'/><br>";
        echo "체중 입력<input type='text' name='weight'/>";
        echo "<input type='submit' value='계산'/>";
        echo "</form>";
      }
    ?>
  </body>
</html>
