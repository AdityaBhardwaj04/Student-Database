<?php
    @include 'config.php';
    
    session_start();
    
    if(!isset($_SESSION['admin_name'])){
        header('location:login_form.php');
    }
    
    $query = "SELECT * FROM user_form";
    $result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin page</title>
    
    <!-- custom css file link  -->
    <link rel="stylesheet" href="/css/admin.css">
    
</head>
<body>
    <div class="container">
    
        <div class="content">
            <h3>hi, <span>admin</span></h3>
            <h1>welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
            <p>this is an admin page</p>
            <a href="login_form.php" class="btn">login</a>
            <a href="register_form.php" class="btn">register</a>
            <a href="logout.php" class="btn">logout</a>
        </div>
    
        <div class="table-container">
            <h2>User Data</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Roll No</th>
                        <th>DOB</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>User Type</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($result)) {?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['roll_no']; ?></td>
                            <td><?php echo $row['dob']; ?></td>
                            <td><?php echo $row['gender']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td><?php echo $row['phone_no']; ?></td>
                            <td><?php echo $row['user_type']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    
    </div>
    
</body>
</html>
