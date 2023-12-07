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

        session_start();
        if (!isset($_SESSION['Name'])) {
          header("Location:FastTravelLogin.php");
          exit();
          // Now you can use $userName in this file
      } else {
          $Name = $_SESSION['Name'];
      }



        $conn = mysqli_connect("localhost", "root", "mysql", "Accounts");

        $total = $_POST['total'];
         
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }


        foreach ($_SESSION['tours'] as $index => $tour){
            $sql = "INSERT INTO UserTours (Name,Tours,Numtravelers,Total)  VALUES ('$Name','$tour[0]','$tour[3]',$total)";

            if(mysqli_query($conn, $sql)){
                echo "You succesfully enroleld into the travel tour ";
                header("Location:FastTravelMenu.php");
            } else{
                echo "ERROR:$sql. "
                    . mysqli_error($conn);
            }

            $sql2 = "UPDATE Tours SET registerednum = registerednum + $tour[3] WHERE Location = '$tour[0]'";
            if(mysqli_query($conn, $sql2)){
                echo "You have successfuly enrolled ";
            } else{
                echo "ERROR:$sq2. "
                    . mysqli_error($conn);
            }
        }
        // Close connection
        mysqli_close($conn);
        ?>
</body>
 
</html>