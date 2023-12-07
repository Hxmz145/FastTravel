<?php 
   
   session_start();

   if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $removedTour = $_POST['location'];

      foreach ($_SESSION['tours'] as $key => $tour) {
        if ($tour[0] === $removedTour) {
            unset($_SESSION['tours'][$key]);
            break; 
        }
      }

      header('Location: Cart.php');
      exit();
   }
?>