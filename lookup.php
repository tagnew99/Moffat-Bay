<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Lookup</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="Styles/styles_LU.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('form').submit(function(event){
                event.preventDefault(); // Prevent the form from submitting normally
                
                var formData = $(this).serialize(); // Serialize form data
                
                $.ajax({
                    type: 'GET',
                    url: 'reservation_lookup.php',
                    data: formData,
                    success: function(response){
                        $('#lookup-results').html(response); // Display response from user input
                    }
                });
            });
        });
    </script>
</head>

<body>
   <div class="header">
    <img src="Images/logo.png" alt="Logo" /> 
    <h1>Check Your Reservation</h1> 
</div>

    <div class="navbar">
        <a class="nav-item" href="HMP2.php"> <i class="fa-solid fa-house"></i> Home</a>
        <a class="nav-item" href="AP.php"> <i class="fa-solid fa-book"></i> About Us</a>
        <div class="dropdown nav-item">
            <a class="nav-item" href="#"> <i class="fa-solid fa-check"></i> Reservations</a>
            <div class="dropdown-content">
                <a class="dropdown-item" href="reservation.php">Make a Reservation</a>
                <a class="dropdown-item" href="attractions.php">Explore</a>
                <a class="dropdown-item" href="lookup.php">Reservation Confirmation</a>
                <a class="dropdown-item" href="reservationsummary.php">Reservation Summary</a>
            </div>
        </div>
            <?php
                include 'user_status.php';
            ?>
    </div>

    <div class="container">
        <h3>Reservation Lookup</h3>
        <form>
            <input type="text" name="search" placeholder="Enter Reservation ID or Email Address">
            <input type="submit" value="Search">
        </form>
        <div id="lookup-results"></div> <!-- This awesome object will display the results using the dark arts lol-->
    </div>

    <div class="footer">
      <footer>&copy; 2024 Moffat Bay Lodge. All rights reserved.</footer>
    </div>

</body>
</html>
