<div style="font-size:30px;">
  <?php
    $no = rand(1,5);
    switch ($no) {
      case 1:
        $msg = "love you";
        break;
      case 2:
        $msg = "thank you";
        break;
      case 3:
        $msg = "like this";
        break;
      case 4:
        $msg = "so happy";
        break;
      default:
        $msg = "welcome";
        break;
    }
    echo $msg;

    $no = rand(1,3);
    switch ($no) {
      case 1:
        $file = "http://japan-magazine.jnto.go.jp/jnto2wm/wp-content/uploads/1502_hirosaki_main.jpg";
        break;
      case 2:
        $file = "http://japan-magazine.jnto.go.jp/jnto2wm/wp-content/uploads/1508_autumnfoliage_main.jpg";
        break;
      case 3:
        $file = "http://cfile2.uf.tistory.com/image/2410873C561791CA0E3EC8";
        break;
    }
    echo "<img src='{$file}'>";
  ?>
</div>
