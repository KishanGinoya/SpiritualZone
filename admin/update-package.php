<?php
    session_start();

    if(!isset($_SESSION['nm'])){
        header("location:index.php");
    }
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>Update Package</title>
    <link href="images/bus.png" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

        :root {
            --main-color: #012558;
            --color-dark: #1D2231;
            --text-grey: #8390A2;
        }

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            list-style-type: none;
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
        }

        .sidebar {
            width: 300px;
            position: fixed;
            left: 0;
            top: 0;
            height: 100%;
            background: var(--main-color);
            z-index: 100;
            transition: width 300ms;
        }

        .sidebar-brand {
            height: 90px;
            padding: 1rem 0rem 1rem 2rem;
            color: #fff;

        }

        .sidebar-brand span {
            display: inline-block;
            padding-right: 1rem;
        }

        .sidebar-menu {
            margin-top: 1rem;
        }

        .sidebar-menu li {
            width: 100%;
            margin-bottom: 1.7rem;
            padding-left: 2rem;
        }

        .sidebar-menu ul {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            list-style-type: none;
            /* Remove bullet points from the list */
        }

        .sidebar-menu a {
            padding-left: 1rem;
            display: block;
            width: 83%;
            color: #fff;
            font-size: 1.1rem;
            text-decoration: none;
        }

        .sidebar-menu a.active {
            background: #fff;
            padding-top: 1rem;
            padding-bottom: 1rem;
            color: var(--main-color);
            border-radius: 30px;
            text-decoration: none;
            font-weight: bold;
        }

        .sidebar-menu a span:first-child {
            font-size: 1.5rem;
            padding-right: 1rem;
        }

        #nav-toggle:checked~.sidebar {
            width: 80px;
        }

        #nav-toggle:checked~.sidebar .sidebar-brand {
            padding-left: 1rem;
            text-align: center;
            justify-content: center;
            /* Center horizontally */
        }

        #nav-toggle:checked~.sidebar .sidebar-brand h2 span,
        #nav-toggle:checked~.sidebar li {
            padding-left: 1rem;
            text-align: center;
        }

        #nav-toggle:checked~.sidebar li a {
            padding-left: 0rem;
        }

        #nav-toggle:checked~.sidebar .sidebar-brand h2 span:last-child,
        #nav-toggle:checked~.sidebar li a span:last-child {
            display: none;
        }

        #nav-toggle:checked~.main-content {
            margin-left: 80px;
        }

        #nav-toggle:checked~.main-content header {
            width: calc(100% - 70px);
            left: 80px;
        }

        .main-content {
            /* Add a margin at the top */
            margin-left: 300px;
            /* Initial margin value */
            transition: margin-left 300ms;
            /* Apply transition to margin-left with a duration of 300ms */
            padding-top: 10px;
            /* Add some padding at the top */
            /* Calculate height based on viewport height minus header height and padding */
            background-color: #f1f5f9;

        }


        header {
            display: flex;
            height: 100px;
            justify-content: space-between;
            padding: 1rem;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
            background: #fff;
            position: fixed;
            left: 300px;
            width: calc(100% - 300px);
            top: 20;
            z-index: 100;
            transition: width 300ms;
        }

        #nav-toggle {
            display: none;
        }

        header h2 {
            color: #222;
        }

        header label span {
            font-size: 1.7rem;
            padding-right: 1rem;
        }

        /* search bar css*/

        .search-wrapper {
            border: 1px solid #ccc;
            border-radius: 30px;
            height: 50px;
            display: flex;
            align-items: center;
            overflow-x: hidden;
            margin-top: 5px;
            /* Add margin to the top */
            padding: 0 15px;
            /* Add padding to the left and right */

        }

        .search-wrapper span {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0rem 1rem;
            font-size: 1.5rem;
            background: #2697FF;
            width: 50px;
            /* Adjust the width as needed */
            height: 100%;
            text-align: center;
            color: #fff;
            /* Add text color */
            cursor: pointer;
            /* Add cursor style */
        }

        .search-wrapper input {
            height: 100%;
            width: 80%;
            /* Adjust the width as needed */
            padding: 0.5rem;
            border: none;
            outline: none;
            font-size: 1rem;
            /* Add font size */
        }

        /* Styling for dropdown */
        .user-wrapper {
            display: flex;
            align-items: center;
            border: 1px solid #ccc;
            /* Add a border */
            padding: 10px;
            /* Add some padding for spacing */
            color: blue;
            background: lime;
        }

        .user-info {
            margin-right: 10px;
        }

        .user-info h4,
        .user-info small {
            margin: 0;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-trigger {
            cursor: pointer;
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            /* Center horizontally */
            display: none;
            background-color: #081D45;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .dropdown-item {
            padding: 10px 20px;
            display: block;
            color: #fff;
            text-decoration: none;
        }

        .user-wrapper {
            display: flex;
            align-items: center;
            margin-right: 110px;
        }

        .user-wrapper img {
            border-radius: 50%;
            margin-right: 1rem;
        }

        .user-wrapper h4 {
            margin-right: 50px;
        }

        .user-wrapper small {
            display: inline-block;
            color: #FF2400;


        }

        main {
            padding-top: 130px;
            background-color: #f1f5f9;
            min-height: calc(100vh - 100px);

        }


        .cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-template-rows: 1fr;
            grid-gap: 2rem;
            margin-top: 1rem;

        }

        .card-single {
            margin-left: 5px;
            display: flex;
            justify-content: space-between;
            background: #fff;
            padding: 2rem;
            border-radius: 2px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            height: 150px;
            /* Adjust the height as needed */
            width: 275px;
        }

        /* card font-size span increase*/
        .card-single span {
            font-size: 1.2rem;
            /* Adjust the font size as needed */
            font-weight: bold;
        }

        /* icon color */

        .card-single .las {
            color: #ffffff;
            /* White color */
            font-size: 3rem;
        }

        /* crad background-color */
        .card-single:nth-child(1) {
            background: #BF2c34;

        }

        .card-single:nth-child(2) {
            background: #1C05B3;
        }

        .card-single:nth-child(3) {
            background: #006400;
        }

        .card-single div:first-child span {
            color: #fff;
            /* Change text color to white */
        }

        .card-single:last-child {
            background: red;
        }

        /*
        .card-single div:last-child span{
            font-size: 3rem;
            color: var(--main-color);
        }*/
        /*
        .card-single div:first-child span{
            color: var(--text-grey);
        }*/



        .card-single:last-child,
        .card-single:last-child div:last-child span,
        .card-single:last-child div:first-child span {
            color: #fff;
        }

        .recent-grid {
            margin-top: 3.5rem;
            display: grid;
            grid-template-columns: 67% auto;
            grid-gap: 2rem;
        }

        .card {
            background: #fff;
            border-radius: 5px;
        }

        .card-header,
        .card-body {
            padding: 1rem;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #f0f0f0;
        }

        .card-header button {
            background: var(--main-color);
            border-radius: 10px;
            color: #fff;
            font-size: .8rem;
            padding: .5rem 1rem;
            border: 1px solid var(--main-color);
        }


        @media only screen and (max-width: 1200px) {
            .cards {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                grid-gap: 2rem;
            }

            .card-single {
                width: 200;
                /* Adjust width and gap */
                height: auto;
                /* Reset the height */
                min-height: 150px;
                /* Set a minimum height */
            }

            .sidebar {
                width: 80px;

            }

            .sidebar .sidebar-brand,
            .sidebar li {
                padding-left: 1rem;
                text-align: center;
            }

            .sidebar li a {
                padding-left: 0rem;
            }

            .sidebar .sidebar-brand h2 span:last-child,
            .sidebar li a span:last-child {
                display: none;
            }

            .main-content {
                margin-left: 80px;

            }

            .main-content header {
                width: calc(100% - 70px);
                left: 80px;
            }

            /*
        .sidebar:hover {
            width: 300px;
            z-index: 200;
        }

        .sidebar:hover .sidebar-brand,
        .sidebar:hover li {
            padding-left: 2rem;
            text-align: left;
        }

        .sidebar:hover li a{
            padding-left: 1rem;
        }

        .sidebar:hover .sidebar-brand h2 span:last-child,
        .sidebar:hover li a span:last-child {
            display: inline;
        }

        */

            #nav-toggle:checked~.sidebar {
                left: 0 !important;
                z-index: 100;
                width: 345px;
            }

            #nav-toggle:checked~.sidebar .sidebar-brand,
            #nav-toggle:checked~.sidebar li {
                padding-left: 2rem;
                text-align: left;
            }

            #nav-toggle:checked~.sidebar li a {
                padding-left: 1rem;
            }

            #nav-toggle:checked~.sidebar .sidebar-brand h2 span:last-child,
            #nav-toggle:checked~.sidebar li a span:last-child {
                display: inline;
            }

            #nav-toggle:checked~.main-content {
                margin-left: 345px !important;
            }

            #nav-toggle:checked~.main-content header {
                width: calc(100% - 345px) !important;
                left: 345px;
            }

        }

        @media only screen and (max-width: 960px) {


            .cards {
                grid-template-columns: repeat(3, 1fr);
                /* Display three columns of cards */

            }

            .card-single {
                width: 300px;
                /* Adjust width and gap */
                height: auto;
                /* Reset the height */
            }

            .recent-grid {
                grid-template-columns: 60% 40%;
            }

            #nav-toggle:checked~.sidebar {
                left: 0 !important;
                z-index: 100;
                width: 345px;
            }

            #nav-toggle:checked~.sidebar .sidebar-brand,
            #nav-toggle:checked~.sidebar li {
                padding-left: 2rem;
                text-align: left;
            }

            #nav-toggle:checked~.sidebar li a {
                padding-left: 1rem;
            }

            #nav-toggle:checked~.sidebar .sidebar-brand h2 span:last-child,
            #nav-toggle:checked~.sidebar li a span:last-child {
                display: inline;
            }


            #nav-toggle:checked~.main-content {
                margin-left: 345px !important;
            }

            #nav-toggle:checked~.main-content header {
                width: calc(100% - 345px) !important;
                left: 345px;
            }

            .search-wrapper {
                display: none;
                /* Hide the search bar */
            }

        }

        @media only screen and (max-width: 768px) {
            .cards {
                grid-template-columns: repeat(2, 1fr);
                /* Display three columns of cards */

            }

            .card-single {
                width: 300px;
                /* Adjust width and gap */
                height: auto;
                /* Reset the height */
            }

            .recent-grid {
                grid-template-columns: 60% 40%;
            }

            #nav-toggle:checked~.sidebar {
                left: 0 !important;
                z-index: 100;
                width: 345px;
            }

            #nav-toggle:checked~.sidebar .sidebar-brand,
            #nav-toggle:checked~.sidebar li {
                padding-left: 2rem;
                text-align: left;
            }

            #nav-toggle:checked~.sidebar li a {
                padding-left: 1rem;
            }

            #nav-toggle:checked~.sidebar .sidebar-brand h2 span:last-child,
            #nav-toggle:checked~.sidebar li a span:last-child {
                display: inline;
            }

            #nav-toggle:checked~.main-content {
                margin-left: 345px !important;
            }

            #nav-toggle:checked~.main-content header {
                width: calc(100% - 345px) !important;
                left: 345px;
            }

            .search-wrapper {
                display: none;
                /* Hide the search bar */
            }


        }

        @media only screen and (max-width: 568px) {
            .cards {
                display: flex;
                flex-direction: column;
                align-items: center;
                /* Center horizontally */
                justify-content: center;
                /* Center vertically */
            }

            .card-single {
                width: 300px;
                /* Adjust width and gap */
                height: auto;
                /* Reset the height */
            }

            .recent-grid {
                grid-template-columns: 60% 40%;
            }

            #nav-toggle:checked~.sidebar {
                left: 0 !important;
                z-index: 100;
                width: 345px;
            }

            #nav-toggle:checked~.sidebar .sidebar-brand,
            #nav-toggle:checked~.sidebar li {
                padding-left: 2rem;
                text-align: left;
            }

            #nav-toggle:checked~.sidebar li a {
                padding-left: 1rem;
            }

            #nav-toggle:checked~.sidebar .sidebar-brand h2 span:last-child,
            #nav-toggle:checked~.sidebar li a span:last-child {
                display: inline;
            }

            #nav-toggle:checked~.main-content {
                margin-left: 345px !important;
            }

            #nav-toggle:checked~.main-content header {
                width: calc(100% - 345px) !important;
                left: 345px;
            }

            .search-wrapper {
                display: none;
                /* Hide the search bar */
            }



        }


        .custom-link {
            display: flex;
            align-items: center;
            background-color: aqua;
            padding: 10px 20px;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 20px;
            height: 10%;
            font-size: 20px;
        }

        .custom-link a {
            display: inline-block;
            vertical-align: middle;
            margin-right: 10px;
            color: blue;
        }

        .custom-link i {
            font-size: 20px;
            /* Adjust the font size as needed */
            vertical-align: middle;
        }

        .custom-link {
            font-weight: bold;
        }

        .heading {
            text-align: center;
            color: #0437F2;
            margin-bottom: 20px;
        }

        /* General Styling */
        body {
            font-family: Arial, sans-serif;
        }

        .container-fluid {
            margin-top: 20px;
        }

        .form-control {
            border-radius: 5px;
            margin-bottom: 15px;
            padding: 10px;
            width: 100%;
            /* Set form controls to 100% width */
        }

        form {
            background: #FBFBF9;
            padding: 20px;
            border-radius: 5px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
            font-size: 18px;
        }

        .form-input {
            border-radius: 5px;
            padding: 10px;
            width: 100%;
            border: 1px solid #ccc;
            transition: border-color 0.3s;
        }

        .form-input:focus {
            outline: none;
            border-color: #007bff;
        }

        /* Form Styling */
        .form-group label {
            font-weight: bold;
            margin-bottom: 10px;
            /* Add margin below labels */
        }

        /* Submit Button Styling */

        .btn-success {
            border: none;
            border-radius: 5px;
            color: #fff;
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        /* Hover state */
        .btn-success:hover {
            background-color: #0056b3;
        }

        /* Focus state */
        .btn-success:focus {
            background-color: #0056b3;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
        }


        .btn-container {
            text-align: left;
        }

        .btn-success {
            margin-right: 10px;
        }
    </style>

</head>



<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2>
                <img style="height: 40px; width: 200px; margin-top: 15px;" src="images/logo.png" alt="Spiritual Logo">
            </h2>
        </div>


        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="dashboard.php"><span class="las la-igloo"></span>
                        <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="manage-packages.php" class="active"><span class="las la-route"></span>
                        <span>Tour Packages</span></a>
                </li>
                <li>
                    <a href="manage-users.php"><span class="las la-users"></span>
                        <span>Manage Users</span></a>
                </li>
                <li>
                    <a href="manage-bookings.php"><span class="las la-book"></span>
                        <span>Manage Booking</span></a>
                </li>
                <li>
                    <a href="ticket-details.php"><span class="las la-file-invoice-dollar"></span>
                        <span>Ticket Details</span></a>
                </li>
                <li>
                    <a href="manage-feedback.php"><span class="las la-comments"></span>
                        <span>User Feedback</span></a>
                </li>

            </ul>
        </div>
    </div>


    <div class="main-content">
    <?php include 'includes/header.php'; ?>

        <main>
            <div class="custom-link">
                <a href="dashboard.php">Home</a>
                <i class="fa fa-angle-right"></i> &nbsp;<span style="color: red;"><b>Update Package</b></span>
            </div>


            <div class="container-fluid mt-4">
                <div class="row">
                    <div class="col-md-12">

                        <form action="" method="POST" enctype="multipart/form-data">



                            <b>
                                <h2 class="heading">Update Package</h2>
                            </b>
                            <?php
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                            } else {
                                // Handle the case where id is not set, such as redirecting the user or showing an error message.
                                // For example:
                                echo "ID parameter is missing.";
                                exit; // Stop further execution
                            }

                            $con = mysqli_connect("localhost", "root", "", "project");
                            if (mysqli_connect_errno()) {
                                echo "Failed to connection..." . mysqli_connect_errno();
                            }

                            $query = "select * from package where id='$id'";

                            $select = mysqli_query($con, $query);

                            $row = mysqli_fetch_assoc($select);



                            ?>
                            <div class="form-group row">
                                <label for="packagename" class="col-sm-3 col-form-label form-label">Package Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-input" id="packagename" name="name" autocomplete="off" value='<?php echo $row['name']; ?>' placeholder="Create / Add Package" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="packagetype" class="col-sm-3 col-form-label form-label">Package Type</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-input" id="packagetype" name="type" autocomplete="off" value='<?php echo $row['type']; ?>' placeholder="Package Type eg- Family Package / Couple Package" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="packagelocation" class="col-sm-3 col-form-label form-label">Package Location</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-input" id="packagelocation" name="location" autocomplete="off" value='<?php echo $row['location']; ?>'' placeholder="Package Location" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="packageprice" class="col-sm-3 col-form-label form-label">Package Price</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-input" id="packageprice" name="price" autocomplete="off" value=' <?php echo $row['price']; ?>' placeholder="Package Price" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="packageprice" class="col-sm-3 col-form-label form-label">Package Features</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-input" id="packagefeatures" name="feature" autocomplete="off" value='<?php echo $row['feature']; ?>' placeholder="Package Features" required>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="packagedetails" class="col-sm-3 col-form-label form-label">Package Details</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control form-input" id="packagedetails" name="detail" autocomplete="off" placeholder="detail of packages" required rows="5" cols="50"><?php echo $row['detail']; ?></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="packageimage" class="col-sm-3 col-form-label form-label">Package Image</label>
                                <div class="col-sm-8">
                                    <img src="packageimages/<?php echo $row['image']; ?>" width="200">&nbsp;&nbsp;&nbsp;
                                    <input type="file" name="image" id="packageimage">
                                </div>
                                <div class="col-sm-8">

                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-sm-8 offset-sm-4 btn-container">
                                    <button type="submit" name="submit" class="btn btn-success"><b>Update</b></button>
                                </div>
                            </div>



                        </form>

                    </div>
                </div>
            </div>
        </main>
        <?php
        if (isset($_POST['submit'])) {
            $packageName = $_POST['name'];
            $packageType = $_POST['type'];
            $location = $_POST['location'];
            $price = $_POST['price'];
            $feature = $_POST['feature'];
            $detail = $_POST['detail'];
            $imageName = $_FILES['image']['name'];

            if (isset($_FILES['image']['name']) && ($_FILES['image']['name'] != "")) {
                $size = $_FILES['image']['size'];
                $temp = $_FILES['image']['tmp_name'];
                $type = $_FILES['image']['type'];
                $imageName = $_FILES['image']['name'];

                move_uploaded_file($temp, "packageimages/$imageName");
                $update = "UPDATE package SET name='$packageName', type='$packageType', location='$location', price='$price', feature='$feature', detail='$detail', image='$imageName' WHERE id='$id'";
            } else {
                $update = "UPDATE package SET name='$packageName', type='$packageType', location='$location', price='$price', feature='$feature', detail='$detail' WHERE id='$id'";
            }

            //$update = "UPDATE package SET name='$packageName', type='$packageType', location='$location', price='$price', feature='$feature', detail='$detail', image='$imageName' WHERE id='$id'";
            $result = mysqli_query($con, $update);

            if ($result) {
                echo  "<script>alert('Record updated successfully')</script>";
                echo "<script>window.location.href = 'manage-packages.php';</script>";
        ?>
                <!-- <meta http-equiv="refresh" content="0;url=http://localhost/travel%20project/admin/manage-packages.php"> -->
        <?php
            } else {
                echo  "<script>alert('Record not updated successfully')</script>";
            }
        }


        ?>
        <?php include 'includes/footer.php'; ?>
    </div>

</body>

</html>