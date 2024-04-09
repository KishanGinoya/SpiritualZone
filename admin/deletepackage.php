<?php   
 $con=mysqli_connect("localhost","root","","project");  
 if(isset($_GET['id'])) {  
      $id = $_GET['id'];  
      $query = "DELETE FROM package WHERE id = '$id'";  
      $run = mysqli_query($con,$query);  
      if ($run) {  
        
           header('location:manage-packages.php');  
      }else{  
           echo "Error: ".mysqli_error($conn); 
           header('location:manage-packages.php'); 
      }  
 }
?>