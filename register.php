<?php
include('server.php');
// initializing variables
$roll = "";
$name = "";
$phone = "";
$cgpa = "";
$email = "";
$address = "";
$user_type = "";
$errors = array(); 

// check if the form has been submitted
if (isset($_POST['reg_user'])) {
  // update the values of the form fields with the submitted values
  $roll = $_POST['roll'];
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $cgpa = $_POST['cgpa'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $user_type = $_POST['user_type'];
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
    <h2>Register</h2>
  </div>
   
  <form method="post" action="register.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
      <label>Roll</label>
      <input type="text" name="roll" value="<?php echo $roll; ?>">
    </div>
    <div class="input-group">
      <label>Name</label>
      <input type="text" name="name" value="<?php echo $name; ?>">
    </div>
    <div class="input-group">
      <label>Phone</label>
      <input type="text" name="phone" value="<?php echo $phone; ?>">
    </div>
    <div class="input-group">
      <label>User Type</label>
      <select name="user_type" id="user_type">
        <option value=""></option>
        <option value="user"<?php if ($user_type == 'user') echo ' selected="selected"'; ?>>User</option>
        <option value="admin"<?php if ($user_type == 'admin') echo ' selected="selected"'; ?>>Admin</option>
      </select>
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password_1">
    </div>
    <div class="input-group">
      <label>Confirm password</label>
      <input type="password" name="password_2">
    </div>
    <div class="input-group">
      <label>CGPA</label>
      <input type="text" name="cgpa" value="<?php echo $cgpa; ?>">
    </div>
    <div class="input-group">
      <label>Email</label>
      <input type="email" name="email" value="<?php echo $email; ?>">
    </div>
    <div class="input-group">
      <label>Address</label>
      <input type="text" name="address" value="<?php echo $address; ?>">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="reg_user">Register</button>
    </div>
  </form>
</body>
</html>
