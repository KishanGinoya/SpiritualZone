<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="Free HTML Templates" name="keywords">
<meta content="Free HTML Templates" name="description">

<!-- Favicon -->
<link href="img/bus.png" rel="icon">

<!-- Google Web Fonts -->
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<!-- Customized Bootstrap Stylesheet -->
<link href="css/style.css" rel="stylesheet">
<style>
  .dropdown-menu {
        border: 2px solid wheat; /* Border color and width */
        border-radius: 8px; /* Border radius */
        padding: 10px; /* Padding inside the dropdown menu */
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2); /* Optional: Box shadow */
      
           
        
    }

    .dropdown-menu a.dropdown-item:hover {
        /* background-color: lightgrey;  */
        color: black; 

    }

    .dropdown{
        width: 200px;   
    }

    
</style>
<!-- ... Previous code ... -->

<div class="container-fluid bg-light pt-3 d-none d-lg-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                    <a href="" class="navbar-brand">
                        <img src="img/logo2.png" alt="Spiritual Zone Logo" height="50" width="280">
                    </a>
                </div>
            </div>
            <div class="col-lg-5 pt-3  ">
                <!-- Social media links... -->
                <a class="text-primary px-3" href="https://www.facebook.com/login">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a class="text-primary px-3" href="https://www.twitter.com/login">
                    <i class="fab fa-twitter"></i>
                </a>
                <a class="text-primary px-3" href="https://www.linkedin.com/login">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a class="text-primary px-3" href="https://www.instagram.com/accounts/login">
                    <i class="fab fa-instagram"></i>
                </a>
                <a class="text-primary pl-3" href="https://www.youtube.com/account">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
            <div class="col-lg-3 text-center text-lg-right">
                <?php
                if (isset($_SESSION['usernm'])) {
                    // Display dropdown menu for authenticated users
                    ?>
                    <div class="dropdown">
                        <button style="background-color: white;  border: 1px solid black;  border-radius: 28px; width: 150px;" class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <!-- <img src="admin/images/user.png" width="50px" height="50px" alt=""> -->
                            <i class='far fa-user-circle' style='margin-top: 5px; font-size:24px; color: black;'></i>
                            <span style="display: inline-block; margin-left: 10px; margin-bottom: 5px; color: #012558; font-weight: bold;"><?php echo $_SESSION['usernm']; ?></span>
                        </button>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton" style="background-color: white; color: cornsilk;" >
                            <a class="dropdown-item" href="change-password.php"><b>Setting</b></a>
                            <a class="dropdown-item" href="logout.php"><b>Logout</b></a>
                        </div>
                    </div>

                    </div>
                    <?php
                } else {
                    // Display sign up and sign in buttons for non-authenticated users
                    ?>
                    <div class="d-flex pt-2">
    <a class="pl-5" href="register.php">
        <button class="btn btn-primary" type="submit" style="width: 100px;">Sign Up</button>
    </a>
    <a class="pl-2" href="login.php">
        <button class="btn btn-primary" type="submit" style="width: 100px;">Sign In</button>
    </a>
</div>

                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->
