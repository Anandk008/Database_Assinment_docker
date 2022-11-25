
<!-- <!DOCTYPE html> -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />   -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" href="style.css">
    <title>Form </title>
</head>
<body>

    
    <div class="wrapper">
    <header>
        <h1>Create Profile</h1>
        <!-- <span>ID: 5988014</span> -->
     </header>
    
    <!-- <div class="ways">
        <ul>
        <li class="active">
            submit
        </li>
        </ul>
    </div> -->
    
    <div class="sections">
        
        <section class="active">
            
        <form action="index.php" method="post" enctype="multipart/form-data">

            <input type="text" placeholder="Enter Your Name" id="name" name="name"/>
            <input type="email" name="email" id="email" placeholder="Enter Your Email">
            <div class="images">
                <input type="file" name="img" id="img">
            </div>

            <footer>
                <ul>
                <!-- <li><span id="reset" aSELECT * FROM `formRespons` WHERE 1ction="test.php">Show Data</span></li> -->
                <li>
                    <input type="submit" value="Submit" id="insert">
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

<script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#img').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#img').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#img').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script>




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
    }else {
        echo "Connection Successful !";
    }

    // Taking all 3 values from the form data(input)
    $name =  $_REQUEST['name'];
    $email = $_REQUEST['email'];
    // $img = $_REQUEST['img'];
    $image = $_FILES['img'] ;
    // $image = addslashes(file_get_contents($_FILES['image']['tmp_name'])) ;
    // $img = file_get_contents($image);

    // $data = base64_encode($img);
    echo "$name \n $email \n $img";
    // Performing insert query execution
    // here our table name is college
    // $sql = "INSERT INTO formResponse  VALUES ('$name','$email', '$img')";

    $sql = "select imgUpload";
    $sql1 = "INSERT INTO formRespons  VALUES ('$name', '$email' , '$image')";
    echo mysqli_query($conn, $sql);

    if(mysqli_query($conn, $sql1)){
        echo "<h3>Data stored in a database successfully."
            . " Please browse your localhost php my admin"
            . " to view the updated data</h3>";

        echo nl2br("\n$name\n  "
            . "\n $email \n $image ");
    } else{
        echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
    }
    
    // Close connection
    mysqli_close($conn);
?>
