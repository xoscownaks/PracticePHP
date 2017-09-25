<?php
  $과일배열 = array("바나나","딸기","사과","망고","포도","키위");
  foreach ($과일배열 as $과일) {
    # code...
    echo "<p>$과일</p>";
  }
  $과일배열2 = array("바나나"=>100,"딸기"=>200,"사과"=>300,"망고"=>500,"포도"=>250,"키위"=>600);
  echo "<table>";
  foreach ($과일배열2 as $과일명 => $과일값) {
    # code...
    echo "<tr>";
    echo "<td>";
    echo "<th>$과일명</th>";
    echo "</td>";
    echo "<td>$과일값</td>";
    echo "</tr>";
  }
  echo "</table>";
?>
