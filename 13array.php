<?php
  $goods = array("치약","충전기","수건","우산","여권","전원어댑터","멀티탭","공유기","개념","돈");
  if(isset($_GET["goods"])){
    show_item();
  }else{
    show_form();
  }
  function show_form(){
    global $goods;
    $options="";
    foreach($goods as $value){
      $options .= "<option value='$value'>$value</option>";
    }
    echo <<<EF
    <form>
      <select name="goods">
      <option>구매희망상품</option>
      {$options}
      </select>
      <input type="submit" value="구매"/>
    </form>
EF;
};
function show_item(){
  //지역변수
  $goods = $_GET["goods"];
  $goods_html = htmlspecialchars($goods);
  echo "상품<{$goods_html}을 구매함";
}
?>
