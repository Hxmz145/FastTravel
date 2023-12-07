<?php 
    session_start();

?>



<!DOCTYPE html>
<html>
 
<head>
    <title>FastTravel</title>
</head>
 
<body>
<?php
$message = "";

if (count($_POST) > 0) {
    $isSuccess = 0;
    $conn = mysqli_connect("localhost", "root", "mysql", "Accounts");

    if ($conn === false) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $userName = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM Admin WHERE Email=?";
    $statement = $conn->prepare($sql);
    $statement->bind_param('s', $userName);
    $statement->execute();

    $result = $statement->get_result();
    while ($row = $result->fetch_assoc()) {
        $hashedPassword = $row["Password"];
        $Name = $row["Name"];
        if (password_verify($password, $hashedPassword)) {
            $isSuccess=1; } 
    }

    $statement->close();
    echo "SQL Query: " . $isSuccess;
    $conn->close();

    if ($isSuccess == 0) {
        echo " <h1>Username or password does not match please try again</h1>";
        echo "<Button>Go back to login</button";
        //header("Location:FastTravelLogin.php");
    } else {
        $_SESSION['Admin_email'] = $userName;
        $_SESSION['Admin_Name'] = $Name;
        header("Location:AdminPortal.php");
        exit;
    }
}
?>

</body>
 
</html>