
<!-- <!DOCTYPE html> -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Form </title>
</head>
<body>

    
    <div class="wrapper">
    <header>
        <h1>Create Profile</h1>
        <!-- <span>ID: 5988014</span> -->
    </header>
    
    <div class="ways">
        <ul>
        <li class="active">
            submit
        </li>
        </ul>
    </div>
    
    <div class="sections">
        
        <section class="active">
            
        <form action="index.php" method="post" enctype="multipart/form-data">

            <input type="text" placeholder="Enter Your Name" id="name" name="name"/>
            <input type="email" name="email" id="email" placeholder="Enter Your Email">
            <div class="images">
                <input type="file" name="image" id="image">
            </div>

            <footer>
                <ul>
                <!-- <li><span id="reset" action="test.php">Show Data</span></li> -->
                <li>
                    <input type="submit" value="Submit">
                </li>
                </ul>
            </footer> 

        </form>
        
        <form action="test.php" method="get" enctype="multipart/form-data">
            <footer>
                <ul>
                <!-- <li><input class="button" type="submit" id="reset">Show Data</input></li> -->
                <li>
                    <input type="submit" class="button" value="Show Data">
                </li>
                </ul>
            </footer>
        </form>
        
        
        </section>

        <section>
        <input type="text" placeholder="Topic" id="topic"/>
        <textarea placeholder="something..." id="msg"></textarea>
        </section>
    
    </div>
    
    
    </div>
    <div class="notification"></div>
    <footer>
    <p>Copyright 2001 &copy; : All Rights Reserverd</p>
    </footer>
</body>
</html>


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
    }else {
        echo "Connection Successful !";
    }
    // Taking all 5 values from the form data(input)
    $name =  $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $img = $_REQUEST['img'];
    
    // echo "$name \n $email \n $img";
    // Performing insert query execution
    // here our table name is college
    // $sql = "INSERT INTO formResponse  VALUES ('$name','$email', '$img')";
    $sql = "INSERT INTO formRespons  VALUES ('$name', '$email' , '$img')";
    
    if(mysqli_query($conn, $sql)){
        echo "<h3>data stored in a database successfully."
            . " Please browse your localhost php my admin"
            . " to view the updated data</h3>";

        echo nl2br("\n$name\n  "
            . "\n $email \n $img ");
    } else{
        echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
    }
    
    // Close connection
    mysqli_close($conn);


?>
