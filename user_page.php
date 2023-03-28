<?php
@include 'config.php';
session_start();
if(!isset($_SESSION['user_name'])){
    header('location:login_form.php');
}

// Fetch user data from the database
$select = "SELECT name, dob, roll_no, gender, address, phone_number FROM user_form WHERE email = '{$_SESSION['user_email']}'";
$result = mysqli_query($conn, $select);
$user_data = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <h3>Hi, <span>User</span></h3>
            <h1>Welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
            <p>This is the user page</p>
            <a href="logout.php" class="btn">Logout</a>
        </div>

        <div class="user-data">
            <h2>Your Information:</h2>
            <table>
                <tr>
                    <td>Name:</td>
                    <td><?php echo $user_data['name']; ?></td>
                </tr>
                <tr>
                    <td>Date of Birth:</td>
                    <td><?php echo $user_data['dob']; ?></td>
                </tr>
                <tr>
                    <td>Roll No:</td>
                    <td><?php echo $user_data['roll_no']; ?></td>
                </tr>
                <tr>
                    <td>Gender:</td>
                    <td><?php echo $user_data['gender']; ?></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td><?php echo $user_data['address']; ?></td>
                </tr>
                <tr>
                    <td>Phone Number:</td>
                    <td><?php echo $user_data['phone_number']; ?></td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
