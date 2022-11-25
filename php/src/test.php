

<?php 
$host = 'db';

// Database use name
    $user = 'root';

//database user password
    $pass = 'MYSQL_ROOT_PASSWORD';

// check the MySQL connection status
    $conn = new mysqli($host, $user, $pass, 'imgUpload');
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

    // foreach ($users as $user1) {
    //     echo "<br>";
    //     echo $user1->name . "    " . $user1->email . "    " . $user1->img;
    //     echo "<br>";
    // }
?>


<html>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
 
    <body>
    <table class="table table-bordered">  
                     <tr>  
                          <th>Image</th>  
                     </tr>  
                <?php  
                $query = "SELECT * FROM formRespons";  
                $result = mysqli_query($conn, $query);  
                $row = mysqli_fetch_array($result);  
                while($row)
                {  
                     echo '  
                          <tr>  
                               <td>  
                                    
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="200" width="200" class="img-thumnail" />  
                               </td>  
                          </tr>  
                     ';  
                }  
                ?>  
    </table>
    </body>

</html>
