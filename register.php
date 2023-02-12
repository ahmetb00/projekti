<?php
session_start();
include "db_conn.php";

$username = "";
$email    = "";
$errors = array();

if(isset($_POST['reg_user'])) {
    // Pranon gjithe vlerat e input nga forma
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

    //ketu mund te mundesojme zgjedhjen e role si admin ose user permes tagut select
    //$role = mysqli_real_escape_string($conn, $_POST['role']);


    //forma validimit: siguron qe forma te jet e kompletuar saktesisht
    //ne duke shtuar arraypush() kjo do te mbledh errora
    if(empty($name)){array_push($errors, "Emri eshte i nevojshem");}
    if (empty($username)) { array_push($errors, "Username eshte i nevojshem"); }
    if (empty($email)) { array_push($errors, "Email eshte i nevojshem"); }
    if (empty($password_1)) { array_push($errors, "Password eshte i nevojshem"); }
    if ($password_1 != $password_2) {
      array_push($errors, "Password-at nuk jane te ngjashem");
    }
    //ketu mund te mundesojme zgjedhjen e role si admin ose user permes tagut select
    //if($role === "Zgjedh rolin"){array_push($errors, "Duhet te zgjidhni rolin");}

    //Tani shikojme nese te dhenat ne databaze jane ne rregull
    //Nje user tani nuk mund te ekzistoj me nje username te njejte ose email.

    $user_check_query = "SELECT * FROM users WHERE username = '$username' OR email = '$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
  if ($user) { // nese user ekziston
      if ($user['username'] === $username) {
        array_push($errors, "Username already exists");
      }
  
      if ($user['email'] === $email) {
        array_push($errors, "email already exists");
      }
  }
  
    // Tani ne fund shikojme nese ka ndonje error ne formen ton nese nuk ka ateher user regjistrohet
  if (count($errors) == 0) {
      $password = md5($password_1);//passwordi enkriptohen ne kod para se te hyje ne databaze
      $id = rand(100,999).$username;//id merr nje numer 3 shifror random si vlere
      $role = "User";
    
      $query = "INSERT INTO users (id, username, name, email, password, role) 
                VALUES('$id', '$username', '$name', '$email', '$password', '$role')";
      mysqli_query($conn, $query);
      $_SESSION['username'] = $username;
      $_SESSION['password'] = $password_1;
      $_SESSION['role'] = $role;
      header("location: dashboard.php");
      exit();
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Registration</title>
  <link rel="stylesheet" type="text/css" href="regStyle.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form action="register.php" method="POST">
  <?php include('errors.php'); ?>
    <div class="input-group">
      <label>Name</label>
      <input type="text" name="name">
    </div>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
    <!--Kjo eshte nje mundesi per te regjistruar nje person si admin ose user i thjesht nga tagu select-->
    <!--<div class="input-group">
      <select name="role">
        <option value="Zgjedh rolin">Zgjedh rolin</option>
        <option value="Admin">Admin</option>
        <option value="User">User</option>
      </select>
    </div>-->
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>Keni nje llogari te hapur? <a href="login.php">Sign in</a></p>
  </form>
</body>
</html>