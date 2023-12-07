<?php 
$conn = mysqli_connect("localhost", "root", "mysql", "Accounts");

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$capacity = $_POST['capacity'];
$Location = $_POST['location'];

// Wrap the date value in single quotes
$sql = "UPDATE Tours SET Capacity = '$capacity' WHERE Location = '$Location'";

if(mysqli_query($conn, $sql)){
    echo "You have successfully updated the date.";
} else{
    echo "ERROR: $sql. " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>