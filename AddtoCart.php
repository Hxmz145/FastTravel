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

if (count($_POST) > 0) {
    $isSuccess = 0;
    $conn = mysqli_connect("localhost", "root", "mysql", "Accounts");

    if ($conn === false) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $Location = $_POST["Location"];
    $Numtravelers = $_POST["numtravelers"];
    $available = $_POST["available"];
    $sql = "SELECT * FROM Tours WHERE Location=?";
    $statement = $conn->prepare($sql);
    $statement->bind_param('s', $Location);
    $statement->execute();
    $result = $statement->get_result();
    while ($row = $result->fetch_assoc()) {
        $Location = $row["Location"];
        $Date = $row["Date"];
        $capacity = $row["Capacity"];
        $Price = $row["Price"];
        $registerednum = $row["registerednum"];
    };
    $statement->close();
    $conn->close();
    if ($Numtravelers > $available){
        echo "<h1>Unfortunately the number of travelers is greater then the avilable seats we have<h1>
            <a href='AvailableTours.php'>Click here to go back to Available tours</a>
        ";
    } else {
        $tour = [$Location, $Date, $capacity, $Numtravelers,$Price];
        if (!isset($_SESSION['tours'])){
            $_SESSION['tours'] = array();
        }
        $_SESSION['tours'][] = $tour;
        header("Location:Cart.php");
    }
    exit;
}
?>

</body>
 
</html>