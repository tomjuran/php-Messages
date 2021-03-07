<?php

  include('config/db_connect.php');

  $sname = $email = $messages = '';

  $errors = array('email' => '', 'sname' => '', 'messages' => '');

  if(isset($_POST['submit'])){

    // check name
    if(empty($_POST['sname'])){
       $errors['sname'] = 'A name is required <br />';
    } else {
        $sname = $_POST['sname'];
        if(!preg_match('/^[a-zA-Z\s]+$/', $sname)){
            $errors['sname'] = 'Name must be letters and spaces only';
        }
    }

    // check email
    if(empty($_POST['email'])){
        $errors['email'] = 'an email is required <br />';
      } else {
       $email = $_POST['email'];
       if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
          $errors['email'] = 'Email must be a valid email address';
       }
    }

    // check message
    if(empty($_POST['messages'])){
        $errors['messages'] = 'a message is required';
    } 
    if(array_filter($errors)){

    } else {
        $sname = mysqli_real_escape_string($conn, $_POST['sname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $messages = mysqli_real_escape_string($conn, $_POST['messages']);

        $sql = "INSERT INTO writter(sname,email,messages) VALUES('$sname', '$email', '$messages')";

        if(mysqli_query($conn, $sql)){

        } else {
            echo 'query error: ' . mysqli_error($conn);
        }
        header('Location: index.php');
    }
    }

  

?>

<!DOCTYPE html>
<html>
<?php include('templates/header.php') ?>
<section>
  <h4 class="center">Create a Message</h4>
  <form class="white" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <label>Name: </label>
    <input type="text" name="sname" value="<?php echo htmlspecialchars($sname) ?>">
    <div class="red-text"><?php echo $errors['sname'] ?></div>

    <label>Email: </label>
    <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
    <div class="red-text"><?php echo $errors['email'] ?></div>

    <label>Message: </label>
    <input type="text" name="messages" value="<?php echo htmlspecialchars($messages) ?>">
    <div class="red-text"><?php echo $errors['messages'] ?></div>


    <div class="center">
     <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
   </div>
  </form>


</section>
<?php include('templates/footer.php') ?>
</html>