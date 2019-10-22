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
      // // filter for malicious code
      // $email = mysqli_real_escape_string($conn, $_POST['email']);
      // $title = mysqli_real_escape_string($conn, $_POST['title']);
      // $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);


      

      // create sql, insert ^ with => values
      // $sql = "INSERT INTO pizzas(title, email, ingredients) VALUES ('$title', '$email', '$ingredients')";
      
        $stmt = $conn->prepare("INSERT INTO pizzas (title, email, ingredients) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $_POST['title'], $_POST['email'], $_POST['ingredients']);
        $stmt->execute();
        $stmt->close();
        if($stmt->affected_rows > 0){
          header('Location: index.php');
        } else {
          $errors['existing'] = 'Title must be unique.';
        }
      
      

      // save to db and check
      // if(mysqli_query($conn, $sql)){
      //   // success
      //   header('Location: index.php');
      // } else {
      //   echo 'query error: ' . msqli_error($conn);
      // }
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