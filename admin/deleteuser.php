<?php   
 $con=mysqli_connect("localhost","root","","project");  
 if(isset($_GET['id'])) {  
      $id = $_GET['id'];  
      $query = "DELETE FROM register WHERE id = '$id'";  
      $run = mysqli_query($con,$query);  
      if ($run) {  
          
           header('location:manage-users.php');  
      }else{  
           echo "Error: ".mysqli_error($conn); 
           header('location:manage-users.php'); 
      }  
 }
?>