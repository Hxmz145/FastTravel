<!DOCTYPE html>
<html>
 
<head>
    <title>FastTravel</title>
</head>
 
<body>
    <?php
 
        // servername => localhost
        // username => root
        // password => empty
        // database name => staff
        $conn = mysqli_connect("localhost", "root", "mysql", "Accounts");
         
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
         
        // Taking all 5 values from the form data(input)
        $first_name =  $_POST['name'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
         
        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO Users (name,email,password)  VALUES ('$first_name','$email','$hashedPassword')";
         
        if(mysqli_query($conn, $sql)){
            echo "<h3>data stored in a database successfully."
                . " Please browse your localhost php my admin"
                . " to view the updated data</h3>"; 
            header("Location:FastTravelLogin.php");
            
 
            echo nl2br("\n$first_name\n $last_name\n "
                . "$gender\n $address\n $email");
        } else{
            echo "ERROR:$sql. "
                . mysqli_error($conn);
        }
         
        // Close connection
        mysqli_close($conn);
        ?>
</body>
 
</html>