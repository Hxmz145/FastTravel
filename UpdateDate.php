<?php 
$conn = mysqli_connect("localhost", "root", "mysql", "Accounts");

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$date = $_POST['date'];
$Location = $_POST['location'];

// Wrap the date value in single quotes
$sql = "UPDATE Tours SET Date = '$date' WHERE Location = '$Location'";

if(mysqli_query($conn, $sql)){
    echo "You have successfully updated the date.";
    header("Location:AdminPortal.php");
} else{
    echo "ERROR: $sql. " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>