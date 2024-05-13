<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lodge Reservations</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Icons -->
    <link rel="stylesheet" href="Styles/styles_Res.css"> <!-- Link to CSS -->
    <script>
        function calculatePrice() {
            var roomSize = document.getElementById("room_size").value;
            var numberOfGuestsSelect = document.getElementById("number_of_guests");
            var additionalGuestsPrice = 5; // Price per additional guest
            var activitiesPrices = {
                "Kayaking": 30,
                "Hiking": 50,
                "Whale": 120,
                "Scuba": 150
            }; // Prices for activities

            var basePrice = 115; // Default base price
            if (roomSize === "2") {
                basePrice *= 1.5;
            } else if (roomSize === "3") {
                basePrice *= 1.5 * 1.5;
            } else if (roomSize === "4") {
                basePrice *= 1.5 * 1.5 * 1.5;
            }

            // Calculate total price based on number of guests
            var numberOfGuests = parseInt(numberOfGuestsSelect.value);
            var totalPrice = basePrice + (additionalGuestsPrice * (numberOfGuests - 1));

            // Add prices for selected activities
            var selectedActivities = document.querySelectorAll('input[name="activities[]"]:checked');
            selectedActivities.forEach(function(activity) {
                totalPrice += activitiesPrices[activity.value];
            });

            // Display the total price
            document.getElementById("total_price").innerText = "$" + totalPrice;

            document.getElementById("selected_guests").value = numberOfGuests;
        }

        // JavaScript function to validate check-in and check-out dates
        function validateDates() {
            var checkInDate = new Date(document.getElementById("check_in_date").value);
            var checkOutDate = new Date(document.getElementById("check_out_date").value);

            // Get today's date
            var today = new Date();
            today.setHours(0, 0, 0, 0);

            // Check if check-in date is today or later
            if (checkInDate < today) {
                alert("Check-in date must be today or later.");
                return false;
            }

            // Check if check-out date is the day after or later than check-in date
            if (checkOutDate <= checkInDate) {
                alert("Check-out date must be the day after or later than the check-in date.");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <div class="header">
        <img src="Images/logo.png" alt="Logo" />
        <h1>Reservation</h1>
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
        <?php include 'user_status.php'; ?>
    </div>

    <div class="form-wrapper">
        <!-- Room Reservation Form -->
        <div class="reservation-form">
            <?php if (isset($_SESSION['username'])): ?>
                <!-- Display reservation form if the user is logged in -->
                <h2>Room Reservation</h2>
                <form action="capture_form_data.php" method="post" onsubmit="return validateDates() && validateForm()">
                    <label for="room_size">Room Size:</label>
                    <select id="room_size" name="room_size" onchange="calculatePrice()">
                        <option value="1">Double Full Beds</option>
                        <option value="2">Queen</option>
                        <option value="3">Double Queen Beds</option>
                        <option value="4">King</option>
                    </select><br><br>

                    <label for="number_of_guests">Number of Guests:</label>
                    <select id="number_of_guests" name="number_of_guests" onchange="calculatePrice()">
                        <option value="1">1 ($115)</option>
                        <option value="2">2 ($120)</option>
                        <option value="3">3 ($125)</option>
                        <option value="4">4 ($130)</option>
                        <option value="5">5 ($135)</option>
                    </select><br><br>

                    <!-- Hidden input field to capture the selected number of guests -->
                    <input type="hidden" id="selected_guests" name="selected_guests">

                    <p>Total Price: <span id="total_price">$115</span></p>

                    <label for="check_in_date">Check-in Date:</label>
                    <input type="date" id="check_in_date" name="check_in_date" onchange="calculatePrice()"><br><br>

                    <label for="check_out_date">Check-out Date:</label>
                    <input type="date" id="check_out_date" name="check_out_date" onchange="calculatePrice()"><br><br>

                    <!-- Activities that selected by checkboxes-->
                    <section style="white-space: nowrap;">
                        <p> We offer a selection of activities. Check all desired selections by clicking the boxes
                            below.
                        </p>
                        <input type="checkbox" id="activities1" name="activities[]" value="Kayaking" onchange="calculatePrice()">
                        <label for="activities1"> Kayaking - $30</label><br><br>
                        <input type="checkbox" id="activities2" name="activities[]" value="Hiking" onchange="calculatePrice()">
                        <label for="activities2"> Hiking Permit - $50</label><br><br>
                        <input type="checkbox" id="activities3" name="activities[]" value="Whale" onchange="calculatePrice()">
                        <label for="activities3"> Whale Watching - $120</label><br><br>
                        <input type="checkbox" id="activities4" name="activities[]" value="Scuba" onchange="calculatePrice()">
                        <label for="activities4"> Scuba Diving- $150</label><br><br>
                        <p>*Note* Selections are scheduled on the day of your arrival. </p>
                    </section>

                    <label for="additional_info">Additional Information:</label>
                    <input type="text" id="additional_info" name="additional_info" placeholder="Additional comments"><br><br>

                    <input type="submit" value="Submit">
                </form>
            <?php endif; ?>
        </div>

        <!-- Room Images on the Right -->
        <div class="room-images">
            <img src="Images/resIMG.jpg" alt="allRes" class="room-image">
        </div>
    </div>

    <div class="footer">
        <footer>&copy; 2024 Moffat Bay Lodge. All rights reserved.</footer>
    </div>
</body>
</html>

