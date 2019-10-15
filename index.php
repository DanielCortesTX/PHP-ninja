<?php 

// connect to database
$conn = mysqli_connect('localhost', 'ninjapizza', 'test123', 'ninja_pizza');

//check connection
if(!$conn){
  echo 'Connection error: ' . mysqli_connect_error() ;
}

// write query for all pizzas *
$sql = 'SELECT title, ingredients, id FROM pizzas';

// make query and get result
$result = mysqli_query($conn, $sql);

// free result from memory
mysqli_free_result($result);

// close connection
mysqli_close($conn);

// fetch the resulting rows as an array
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

print_r($pizzas);

?>

<!DOCTYPE html>
<html>
  <?php include('templates/header.php')?>
  <?php include('templates/footer.php')?>
</html>