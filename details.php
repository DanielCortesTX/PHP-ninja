<?php 

  include('config/db_connect.php');

  if(isset($_POST['delete'])){

    $stmt = $conn->prepare("DELETE FROM pizzas WHERE id=:id");
    $stmt->bindParam(':id', $_POST['id_to_delete']);
    $stmt->execute();

    header('Location: index.php');

    $conn = null;
  }

  //check GET request id parameter
  if(isset($_GET['id'])){

    $stmt = $conn->prepare("SELECT * FROM pizzas WHERE id=:id");
    $stmt->bindParam(':id', $_GET['id']);
    // $stmt->execute(['id' => $_GET['id']]);
    $stmt->execute();
    $pizza = $stmt->fetch();

    $conn = null;
  }

?>

<!DOCTYPE html>
<html>
  <?php include('templates/header.php')?>

  <div class="container center">
  
    <?php if($pizza):?>

      <h4><?php echo htmlspecialchars($pizza['title']); ?></h4>
      <p>Created by: <?php echo htmlspecialchars($pizza['email']); ?></p>
      <p><?php echo date($pizza['created_at']); ?></p>
      <h5>Ingredients: </h5>
      <p><?php echo htmlspecialchars($pizza['ingredients'])?></p>

      <!-- DELETE FORM -->
      <form action="details.php" method="POST">
        <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id']?>">

        <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
      </form>
    <?php else: ?>

      <h5>No such pizza exists</h5>

    <?php endif; ?>
  
  </div>

  <?php include('templates/footer.php')?>
</html>