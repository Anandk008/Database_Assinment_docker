<?php 
$host = 'db';

// Database use name
    $user = 'MYSQL_USER';

//database user password
    $pass = 'MYSQL_PASSWORD';

// check the MySQL connection status
    $conn = new mysqli($host, $user, $pass);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
//     else {
// 	echo "Connection Successful !";
// }

    $sql = 'SELECT * FROM formRespons';

    if ($result = $conn->query($sql)) {
        while ($data = $result->fetch_object()) {
            $users[] = $data;
        }
    }

    foreach ($users as $user) {
        echo "<br>";
        echo $user->name . "    " . $user->email . "    " . $user->img;
        echo "<br>";
    }
?>
