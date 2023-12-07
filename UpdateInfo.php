<?php 
$conn = mysqli_connect("localhost", "root", "mysql", "Accounts");

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$newEmail = $_POST['NewEmail'];
$newPassword = $_POST['newpassword'];
$email = $_POST['email'];

$hashedPassword =  password_hash($newPassword, PASSWORD_DEFAULT);




if ($newEmail != ""){
    $sql = "UPDATE Users SET Email = '$newEmail' WHERE Email = '$email'";

    if(mysqli_query($conn, $sql)){
        header("Location:Profile.php");
    } else{
        echo "ERROR: $sql. " . mysqli_error($conn);
    }

}

if ($newPassword != ""){
    $sql2 = "UPDATE Users SET Password = '$hashedPassword' WHERE Email = '$email'";
    if(mysqli_query($conn, $sql2)){
        header("Location:FastTravelLogin.php");
    } else{
        echo "ERROR: $sql2. " . mysqli_error($conn);
    }
}
// Close connection
mysqli_close($conn);
?>