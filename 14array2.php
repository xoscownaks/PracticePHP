<?php
  $a = array();
  $a[0] = "호박";
  $a[1] = "감";
  $a[2] = "레몬";
  $a[3] = "수박";
  echo $a[2]."<br>";

  $b = array("호박","감","레몬","수박");
  foreach ($b as $value) {
    echo $value;
  }
  //인덱스 => 값
  $moon1 = array(1=>"1월",2=>"2월",3=>"3월",4=>"4월",5=>"5월",6=>"6월",
                7=>"7월",8=>"8월",9=>"9월",10=>"10월",11=>"11월",12=>"12월");

  echo $moon1[11]."<br>";
  $moon2 = array("1월"=>1,"2월"=>2,"3월"=>3,"4월"=>4,"5월"=>5,"6월"=>6,
                "7월"=>7,"8월"=>8,"9월"=>9,"10월"=>10,"11월"=>11,"12월"=>12);
  echo $moon2["8월"];              
?>
