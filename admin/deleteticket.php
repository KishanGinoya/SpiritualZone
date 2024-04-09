<?php
$con = mysqli_connect("localhost", "root", "", "project");
if(isset($_GET['id'])) {
     $id = $_GET['id'];
     $deletebook = "DELETE FROM book WHERE id = '$id'";
     $deleteticket = "DELETE FROM ticket WHERE id = '$id'";
     $bookrun = mysqli_query($con, $deletebook);
     $ticketrun = mysqli_query($con, $deleteticket);
     if ($bookrun && $ticketrun) {
          header('location:ticket-details.php');
     } else {
          echo "Error: " . mysqli_error($conn);
          header('location:ticket-details.php');
     }
}
?>