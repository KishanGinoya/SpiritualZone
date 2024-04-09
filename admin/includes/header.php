
<header>
            <h2 style="padding: 10px;">
                <label for="nav-toggle">
                    <span class="las la-bars"> </span>
                </label>

                <b>Dashboard</b>
            </h2>

            

            <div class="user-wrapper">
                <img src="images/user.png" width="50px" height="50px" alt="">
                <div class="user-info">
                    <b>
                        <h4>Welcome</h4>
                        <small><?php echo $_SESSION['nm']; ?></small>
                    </b>
                </div>
                <div class="dropdown">
                    <div class="dropdown-trigger">
                        <span class="las la-angle-down"></span>
                    </div>
                    <div class="dropdown-menu">
                        <!-- <a class="dropdown-item" href="#">Profile</a> -->
                        <a class="dropdown-item" href="change-password.php">Settings</a>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </div>
            </div>

</header>