<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>반복문 테스트</title>
    <style media="screen">
      body{
        font-size: 25px;
        background-color: #cccccc;
      }
    </style>
  </head>
  <body>
    <form>
      <select name="year">
        <option>생년 입력</option>
        <?php
          $this_year = date('Y');
          //date("m"), date("d")
          //date("h:m:s")
          $end_year = $this_year-100;
          $y = $this_year;
          for(;$y>=$end_year;$y--){
            echo "<option value='$y'>서기{$y}년</option>";
          }
        ?>
      </select>
      <input type="submit" value="계산">
    </form>
    <?php
      if(isset($_GET["year"])){
        echo "올해".($this_year-intval($_GET["year"]))."세입니다.";
      }
    ?>


  </body>
</html>
