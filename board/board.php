<link rel="stylesheet" href="board_css.css" type="text/css">
<?php
  session_start();
  show_insert_form();
  function show_insert_form(){
    echo <<<BOARDFORM
    <div id="writespace">
    <form class="ff">
    <label>닉네임</label>
    <input type="text"><p>
    <label>내용</label>
    <input type="text">
    <input type="submit" value="전송">
    </form>
    </div>
BOARDFORM;
}
?>
