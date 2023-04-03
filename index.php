<!DOCTYPE html>
<html>
    <head>
        <style>
            #logout{
                position: absolute;
                bottom: 10px;
                right: 10px;
                background-color: orange;
                font-size: 1.4rem;
            }
            #register-link {
                position: absolute;
                top: 10px;
                right: 10px;
                background-color: Burlywood;
                font-size: 1.4rem;
            }
            table {
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
                width: 100%;
            }
            th{
                background-color: rgb(95,158,160);
            }
            td{
                background-color: rgb(204, 255, 255);
                padding: 3px;
                text-align: center;
            }
            h1{
                text-align: center;
            }
            body{
                background-color: rgb(216, 238, 165);
            }
            a:link{
                text-decoration: none;
                color: black;
            }
        </style>
    </head>
    <body>
        <h1>Welcome to the Database!!!</h1>

        <?php
        session_start();

        $roll = "";
        $errors = array();

        $db = mysqli_connect('localhost', 'root', '', 'project');

        if (!$db) {
            die("Connection failed: " . mysqli_connect_error());
        }

        if (isset($_SESSION['roll'])) {
            $roll = $_SESSION['roll'];
            $user_check_query = "SELECT * FROM users WHERE roll='$roll' LIMIT 1";
            $result = mysqli_query($db, $user_check_query);

            if (!$result) {
                die("Query failed: " . mysqli_error($db));
            }

            $user = mysqli_fetch_assoc($result);

            if ($user['user_type'] === 'admin') {
                $sql = "SELECT name, roll, phone, cgpa, email, address FROM users ORDER BY roll";
            } else {

                $sql = "SELECT name, roll, phone, cgpa, email, address FROM users ORDER BY roll";
            }

            $result = mysqli_query($db, $sql);

            if (!$result) {
                die("Query failed: " . mysqli_error($db));
            }

            if (mysqli_num_rows($result) > 0) {
                // output data of each row in a table
                echo "<table border='2px'>";
                echo "<tr><th>Name</th><th>Roll</th><th>Phone</th><th>Email Address</th><th>CGPA</th><th>Address</th></tr>";
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr><td>" . $row["name"] . "</td><td>" . $row["roll"] . "</td><td>" . $row["phone"] . "</td><td>" . $row["email"] . "</td><td>" . $row["cgpa"] . "</td><td>" . $row["address"] . "</td></tr>";

                }
                echo "</table>";
                echo"<a id='logout' href='login.php'>Logout</a>";
            }else{
                echo "0 results";
            }
        } else {
            header('location: login.php');
        }

        // display registration link if user is an admin
        if (isset($user) && $user['user_type'] === 'admin') {
            echo "<a id='register-link' href='register.php'>Register new user</a>";
        }

        $db->close();
        ?>

    </body>
</html>
