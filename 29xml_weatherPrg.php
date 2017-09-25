<style media="screen">
  h3{
    background-color:red;
    color:white;
    padding:8px;
  }
</style>
<?php
  $weatherUrl = "http://weather.livedoor.com/forecast/rss/area/400010.xml";
  $saveFile = "comment.log";
  $m = isset($_GET['m'])?$_GET['m']:"";
  if($m == "write"){
    writeComment();
  }else{
    display();
  }
  function display(){
      global $weatherUrl;
      $info = load_log();
      $tag = date("Y-m-d");
      if(empty($info[$tag])){
        $s = trim(@file_get_contents($weatherUrl));
        $xml = simplexml_load_string($s);
        $list = array();
        foreach ($xml->channel->item as $val) {
          $list[] = strval($val->title);
        }
        $info[$tag] = array("yohou"=>$list);
        save_log($info);
      }
      //화면출력
      $info = array_reverse($info);
      $self = $_SERVER['SCRIPT_NAME'];

      foreach ($info as $key => $value) {
        //implode문자열을 배열 원소에 포함
        $yohou_h = htmlspecialchars(implode("\n",$value["yohou"]));
        echo "<h3>$key</h3>";
        echo "<pre>$yohou_h</pre>";
        echo "<form action='$self'>";
        echo "<input type='hidden' name='m' value='write'>";
        echo "<input type='hidden' name='tag' value='$key'>";
        echo "코멘트 : ";
        echo "<input type='text' name='memo' value=''>";
        echo "<input type='submit' value='쓰기'>";
        echo "</form>";

        $comment = isset($value["comment"])?$value["comment"]:array();
        foreach ($comment as $row) {
          $row_h = htmlspecialchars($row);
          echo "<div>->{$row_h}</div>";
        }
      }
   }

   function load_log(){
     global $saveFile;
     $info = array();
     if(file_exists($saveFile)){
       //파일을 문자열로 불어들이고 직렬화 푼다
       $info = unserialize(file_get_contents($saveFile));
     }
     return $info;
   }
   function save_log($info){
     global $saveFile;
     file_put_contents($saveFile,serialize($info));
   }
   function writeComment(){
     $info = load_log();
     $tag = isset($_GET["$tag"])?$_GET["$tag"]:"";
     $memo = isset($_GET["$memo"])?$_GET["$memo"]:"";

     if(empty($info[$tag]["comment"])){
       $info[$tag]["comment"] = array();
     }
     $info[$tag]["comment"][] = $memo;
     save_log($info);

     header("location:".$_SERVER['SCRIPT_NAME']);
   }

?>
