<?php 

include('config/db_connect.php');

$title = $email = $ingredients = '';

$errors = array('email'=>'', 'title'=>'', 'ingredients'=>'', 'existing'=>'');

  if(isset($_POST['submit'])){
    // check email
    if(empty($_POST['email'])){
      $errors['email'] = 'An email is required <br />';
    } else {
      $email = $_POST['email'];
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = 'Email must be valid email address.';
      }
      // echo htmlspecialchars($_POST['email']);
    }

    //check title
    if(empty($_POST['title'])){
      $errors['title'] = 'A title is required <br />';
    } else {
      $title = $_POST['title'];
      if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
        $errors['title'] = 'Title must be letters and spaces only';
      }
      // echo htmlspecialchars($_POST['title']);
    }

    // check ingredients
    if(empty($_POST['ingredients'])){
      $errors['ingredients'] = 'An ingredient is required <br />';
    } else {
      $ingredients = $_POST['ingredients'];
      if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
        $errors['ingredients'] = 'Ingredients must be a comma separated list';
      }
      // echo htmlspecialchars($_POST['ingredients']);
    }

    if(array_filter($errors)){
      // echo 'errors in the form';
    } else {
      // create query then bind the variables
      
        $stmt = $conn->prepare("INSERT INTO pizzas (title, email, ingredients) VALUES (:title, :email, :ingredients)");
        $stmt->bindParam(':title', $_POST['title']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':ingredients', $_POST['ingredients']);
        
        $stmt->execute();
        header('Location: index.php');
    }
  }

?>

<!DOCTYPE html>
<html>
  <?php include('templates/header.php')?>

  <section class="container grey-text">
    <h4 class="center">Add a Pizza</h4>
    <form action="add.php" method="POST" class="white">
      <label for="">Your Email:</label>
      <input type="text" name="email" value="<?php echo htmlspecialchars($email)?>">
      <div class="red-text"><?php echo $errors['email'];?></div>
      <label for="">Pizza Title:</label>
      <input type="text" name="title" value="<?php echo htmlspecialchars($title)?>">
      <div class="red-text"><?php echo $errors['title'];?></div>
      <div class="red-text"><?php echo $errors['existing'];?></div>
      <label for="">Ingredients (comma separated):</label>
      <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients)?>">
      <div class="red-text"><?php echo $errors['ingredients'];?></div>
      <div class="center">
        <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
      </div>
    </form>
  </section>

  <?php include('templates/footer.php')?>
</html>