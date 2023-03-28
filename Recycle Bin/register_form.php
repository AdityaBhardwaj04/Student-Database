<?php
@include 'config.php';

if(isset($_POST['submit'])){
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $roll_no = mysqli_real_escape_string($conn, $_POST['roll_no']);
   $dob = mysqli_real_escape_string($conn, $_POST['dob']);
   $gender = mysqli_real_escape_string($conn, $_POST['gender']);
   $address = mysqli_real_escape_string($conn, $_POST['address']);
   $phone = mysqli_real_escape_string($conn, $_POST['phone']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = "SELECT * FROM user_form WHERE email = '$email'";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $error[] = 'user already exists!';
   }else{
      if($pass != $cpass){
         $error[] = 'passwords do not match!';
      }else{
         $insert = "INSERT INTO user_form(name, roll_no, dob, gender, address, phone, email, password, user_type)
         VALUES('$name', '$roll_no', '$dob', '$gender', '$address', '$phone', '$email', '$pass', '$user_type')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register form</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<div class="form-container">
    <form action="" method="post">
        <h3>register now</h3>
        <?php
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            };
        };
        ?>
        <input type="text" name="name" required placeholder="enter your name">
        <input type="text" name="roll_no" required placeholder="enter your roll no">
        <input type="date" name="dob" required placeholder="enter your date of birth">
        <select name="gender">
            <option value="male">male</option>
            <option value="female">female</option>
            <option value="other">other</option>
        </select>
        <input type="text" name="address" required placeholder="enter your address">
        <input type="tel" name="phone" required placeholder="enter your phone number">
        <input type="email" name="email" required placeholder="enter your email">
        <input type="password" name="password" required placeholder="enter your password">
        <input type="password" name="cpassword" required placeholder="confirm your password">
        <select name="user_type">
            <option value="user">user</option>
            <option value="admin">admin</option>
        </select>
        <input type="submit" name="submit" value="register now" class="form-btn">
        <p>already have an account? <a href="login_form.php">login now</a></p>
    </form>

</div>

</body>
</html>
