<?php 

  $peopleOne = ['shaun', 'crystal', 'ryu'];

  $peopleTwo = array('ken', 'chun-li');
  echo $peopleTwo[1];

  $ages = array(20,30,40,50);
  $ages[1] = 25;
  $ages[] = 60;

  array_push($ages, 70);
  // print_r($ages)

  echo count($ages);

  $peopeThree = array_merge($peopleOne, $peopleTwo);

  // print_r($peopeThree)
  $ninjasOne = ['shaun'=>'black', 'mario'=>'orange', 'luigi'=>'brown'];
  echo $ninjasOne['mario'];

  // print_r($ninjasOne);
  $ninjasTwo = array('bowser'=>'green', 'peach'=>'yellow');
  // print_r($ninjasTwo);
  $ninjasTwo['peach'] = 'pink';
  print_r($ninjasTwo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>My first php file</title>
</head>
<body>
  <h1>User Profile page</h1> 
</body>
</html>