<?php
session_start();
$roll = "";
$name = "";
$email = "";
$phone = "";
$cgpa = "";
$address = "";
$user_type = "";
$errors = array(); 
$db = mysqli_connect('localhost', 'root', '', 'project');

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['reg_user'])) {
    $roll = mysqli_real_escape_string($db, $_POST['roll']);
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $cgpa = mysqli_real_escape_string($db, $_POST['cgpa']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    $user_type = mysqli_real_escape_string($db, $_POST['user_type']);

    if (empty($roll)) { 
        array_push($errors, "Roll number is required"); 
    }
    if (empty($name)) { 
        array_push($errors, "Name is required"); 
    }
    if (empty($email)) { 
        array_push($errors, "Email is required"); 
    }
    if (empty($phone)) { 
        array_push($errors, "Phone number is required"); 
    }
    if (empty($cgpa)) { 
        array_push($errors, "CGPA is required"); 
    }
    if (empty($address)) { 
        array_push($errors, "Address is required"); 
    }
    if (empty($password_1)) { 
        array_push($errors, "Password is required"); 
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    $user_check_query = "SELECT * FROM users WHERE roll='$roll' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);

    if (!$result) {
        die("Query failed: " . mysqli_error($db));
    }

    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['roll'] === $roll) {
            array_push($errors, "Roll number already exists");
        }
    }

    if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database

        $query = "INSERT INTO users (roll, name, email, phone, cgpa, address, password, user_type) 
            VALUES('$roll', '$name', '$email', '$phone', '$cgpa', '$address', '$password', '$user_type')";
        mysqli_query($db, $query);
        $_SESSION['roll'] = $roll;
        $_SESSION['success'] = "You are now registered and logged in";
        header('location: index.php');
    }
}

if (isset($_POST['login_user'])) {
    $roll = mysqli_real_escape_string($db, $_POST['roll']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($roll)) {
        array_push($errors, "Roll number is required");
    }
    if (isset($_POST['login_user'])) {
      $roll = mysqli_real_escape_string($db, $_POST['roll']);
      $password = mysqli_real_escape_string($db, $_POST['password']);
  
      if (empty($roll)) {
          array_push($errors, "Roll number is required");
      }
      if (empty($password)) {
          array_push($errors, "Password is required");
      }
  
      if (count($errors) == 0) {
          $password = md5($password);
          $query = "SELECT * FROM users WHERE roll='$roll' AND password='$password'";
          $results = mysqli_query($db, $query);
          if (mysqli_num_rows($results) == 1) {
              $_SESSION['roll'] = $roll;
              $_SESSION['success'] = "You are now logged in";
              header('location: index.php');
          } else {
              array_push($errors, "Wrong roll number/password combination");
          }
      }
  }
}  
