<?php 

  $ninjas = ['shaun', 'ryu', 'yoshi'];

  // for($i = 0; $i < count($ninjas); $i++){
  //   echo $ninjas[$i] . '<br />';
  // }

  // foreach($ninjas as $ninja){
  //   echo $ninja . '<br />';
  // }
?>

<!DOCTYPE html>
<html>
<head>
  <title>My first php file</title>
</head>
<body>
  <h1>Ninjas</h1>
  <ul>
    <?php foreach($ninjas as $ninja) { ?>
      <h3><?php echo $ninja; ?></h3>
    <?php } ?>
  </ul>
</body>
</html>