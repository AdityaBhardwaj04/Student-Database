<!DOCTYPE html>
<html>
    <head>
        <style>
            #register-link {
                position: absolute;
                top: 10px;
                right: 10px;
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
        </style>
    </head>
    <body>
        <h1>Welcome to the database `lavabul bitches`!!!</h1>

        <?php
        session_start();

        // initializing variables
        $roll = "";
        $errors = array();

        // connect to the database
        $db = mysqli_connect('localhost', 'root', '', 'project');

        if (!$db) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // check if user is logged in
        if (isset($_SESSION['roll'])) {
            $roll = $_SESSION['roll'];
            $user_check_query = "SELECT * FROM users WHERE roll='$roll' LIMIT 1";
            $result = mysqli_query($db, $user_check_query);

            if (!$result) {
                die("Query failed: " . mysqli_error($db));
            }

            $user = mysqli_fetch_assoc($result);

            // if user is an admin, show whole database
            if ($user['user_type'] === 'admin') {
                $sql = "SELECT name, roll, phone, cgpa, email, address FROM users ORDER BY roll";
            } else {
                // if user is not an admin, show only their data
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
            } else {
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