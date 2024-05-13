<?php

session_start();

if(isset($_SESSION["username"])) {
    // If user is logged in, display username and logout link
    echo '<div class="dropdown nav-item">
            <a class="nav-item" href="#"><i class="fa fa-user"></i> ' . $_SESSION["username"] . '</a>
            <div class="dropdown-content">
                <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
          </div>';
} else {
    // If user is not logged in, display login/register links
    echo '<div class="dropdown nav-item">
            <a class="nav-item" href="#"><i class="fa fa-user"></i> Login/Register</a>
            <div class="dropdown-content">
                <a class="dropdown-item" href="login.php">Login</a>
                <a class="dropdown-item" href="Reg.php">Register</a>
            </div>
          </div>';
}
?>
