<?php 

  $blogs = [
    ['title' => 'mario party', 'author' => 'mario', 'content' => 'lorem ipsum', 'likes' => 30],
    ['title' => 'Mario kart cheats', 'author' => 'toad', 'content' => 'lorem ipsumvv', 'likes' => 25],
    ['title' => 'Zelda hidden chests', 'author' => 'link', 'content' => 'lorem ipsumvv', 'likes' => 55]

  ];

  
  $blogs[] = ['title' => 'castle party', 'author' => 'peach', 'content' => 'lorem', 'likes' => 100];
  echo $blogs[2]['author'];
  echo count($blogs);
  print_r($blogs);
  $popped = array_pop($blogs);
  print_r($popped);
  // print_r($blogs);
  // print_r($blogs[1]);
  // print_r($blogs[1][1]);
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