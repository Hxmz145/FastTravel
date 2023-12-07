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
        $Location =  $_POST['location'];
        $date = $_POST['date'];
        $capacity = $_POST['capacity'];
        $price = $_POST['price'];
         
        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO Tours (Location,Date,Capacity,registerednum,Price)  VALUES ('$Location','$date','$capacity','0','$price')";
         
        if(mysqli_query($conn, $sql)){
            header("Location:AdminPortal.php");
        } else{
            echo "ERROR:$sql. "
                . mysqli_error($conn);
        }
         
        // Close connection
        mysqli_close($conn);
        ?>
</body>
 
</html>