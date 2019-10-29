<?php 

include('config/db_connect.php');

// write query for all pizzas *

$stmt = $conn->prepare("SELECT * FROM pizzas ORDER BY created_at");
$stmt->execute();

// set the resulting aray to associative and establish pizza variable
$pizzas = $stmt->fetchAll(PDO::FETCH_ASSOC);

$conn = null;

?>

<!DOCTYPE html>
<html>
  <?php include('templates/header.php')?>

  <h4 class="center grey-text">Pizzas</h4>
  <div class="container">
    <div class="row">
      <?php foreach($pizzas as $pizza) :?>
        <div class="col s6 md3">
          <div class="card z-depth-0">
            <div class="card-content center">
              <h6><?php echo htmlspecialchars($pizza['title']) ;?></h6>
              <ul>
                <?php foreach(explode(',', $pizza['ingredients']) as $ing):?>
                  <li><?php echo htmlspecialchars($ing);?></li>
                <?php endforeach;?>
              </ul>
            </div>
            <div class="card-action right-align">
              <a href="details.php?id=<?php echo $pizza['id'] ;?>" class="brand-text">More Info</a>
            </div>
          </div>
        </div>
      <?php endforeach;?>
      <?php if(count($pizzas) >= 2 ) :?>
        <p>there are 2 or more pizzas</p>
      <?php  else: ?>
        <p>There are less than 2 pizzas</p>
      <?php endif;?>
    </div>
  </div>

  <?php include('templates/footer.php')?>
</html>