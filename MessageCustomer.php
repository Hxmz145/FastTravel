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
         

        $sender = "Admin";
        $receiver = "Customer";
        $message = $_POST['message'];

 
        $sql = "INSERT INTO ContactMailBox (sender,Receiver,Message)  VALUES ('$sender','$receiver','$message')";
         
        if(mysqli_query($conn, $sql)){
            echo "<h3>data stored in a database successfully."
                . " Please browse your localhost php my admin"
                . " to view the updated data</h3>"; 
            header("Location:ContactCustomer.php");
            
        } else{
            echo "ERROR:$sql. "
                . mysqli_error($conn);
        }
         
        // Close connection
        mysqli_close($conn);
        ?>
</body>
 
</html>