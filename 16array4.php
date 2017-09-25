<?php
  show_header();
  show_form();
  show_footer();
  function show_header(){
    $color = "#ffffff";
    if(isset($_GET["color"])){
      $color = htmlspecialchars($_GET["color"]);
    }
    //htmlspecialchars($_GET["color"]):"#ffffff";
    echo "<html><body bgcolor='$color'>";
  }
  function show_footer(){
    //copyrighter
    echo "</body></html>";
  }
  function show_form(){
    $colorarray = array("붉은색"=>"#ff0000", "녹색"=>"#00ff00","푸른색"=>"#0000ff","흰색"=>"#ffffff");
    echo "<form>";
    foreach ($colorarray as $colorname => $colorcode) {
      # code...
      echo make_radio_btn($colorname,$colorcode);
    }
    echo "<input type='submit' value='색변경'>";
    echo "</form>";
  }
  function make_radio_btn($cname,$cvalue){
    return <<<RADIO
    <input type="radio" id="$cname" name="color" value="$cvalue">
    <lable form="$cname">$cname</label>
RADIO;
}
?>
