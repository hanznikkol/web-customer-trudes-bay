<?php
require_once("dbcon.php");

    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $middle_name = $_POST["middle_name"];
    $address = $_POST["address"];
    $contact_number = $_POST["contact_number"];
    $email = $_POST["email"];
    $note = $_POST["note"];
    if (isset($_POST['reservation-type'])) {
        $reservation_type = $_POST['reservation-type'];
    } else {
        $reservation_type = ''; // Or some default value if needed
    }
    $select_cottage = $_POST["selected-cottage"] ?? '';
    $select_room = $_POST["selected-room"] ?? '';
    $tent_quantity = $_POST["tent_quantity"];
    $eventhell_select = $_POST["eventhall_select"];
    $check_in_date = $_POST["check_in_date"];
    $check_out_date = $_POST["check_out_date"];
    $check_in = $_POST["check_in"];
    $check_out = $_POST["check_out"];
    $guests = $_POST["guests"];
    $reference = $_POST["reference"];
    
    $sql = "INSERT INTO reservations (first_name, last_name, middle_name, address, contact_number, email, note, reservation_type, select_cottage, tent_quantity, eventhall_select, check_in_date, check_out_date, check_in, check_out, guests, select_room, reference) VALUES ('$first_name', '$last_name', '$middle_name', '$address', '$contact_number', '$email', '$note', '$reservation_type', '$select_cottage', '$tent_quantity','$eventhell_select', '$check_in_date', '$check_out_date', '$check_in', '$check_out', '$guests','$select_room', '$reference')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trudes Bay Reservation</title>
    <link rel="stylesheet" href="reservations-styles.css">
    <link rel="stylesheet" href="assets/css/footer-style.css">
    <link rel="website icon" type="png" href="Images/Trudes Bay_Final.png" />
</head>
<body>
    <header>
        <img src="Images/Trudes Bay Strip logo.png" alt="Trudes Bay Beach Resort">
    </header>
    <nav>
        <a href="index.php">Home</a>
        <div class="dropdown">
            <a href="main-reservation.php" class="dropbtn">Reservation</a>
            <div class="dropdown-content">

            </div>
        </div>
        <div class="dropdown">
            <a href="amenities.php" class="dropbtn">Amenities & Facilities</a>
            <div class="dropdown-content">
               
            </div>
        </div>
        <a href="activities.php">Activities</a>
        <a href="about.php">About</a>
        <a href="faq.php">FAQ's</a>
    </nav>

    <main>
    <div class="container">
        <h1>Registration</h1>

        <form action=""  method="POST" id="reservation_form">

            
          <div class="form first">
            <div class="details Address">
                <span class="title">Personal Information</span>
                <div class="fields">
                      <div class="input-fields">
                        <label>First Name</label>
                        <input type="text" id="summary-first-name" name="first_name" placeholder="Enter First Name" required oninput="validateName(this)">
                      </div>
                      <div class="input-fields">
                        <label>Last Name</label>
                        <input type="text" id="summary-last-name" name="last_name" placeholder="Enter Last Name" required oninput="validateName(this)">
                      </div>
                      <div class="input-fields">
                        <label>Middle Name</label>
                        <input type="text" id="summary-middle-name" name="middle_name" placeholder="Enter Middle Name" required oninput="validateName(this)">
                      </div>
                      <div class="input-fields">
                        <label>Address</label>
                        <input type="text" id="summary-address" name="address" placeholder="Enter your Address" required>
                      </div>
                      <div class="input-fields">
                        <label>Contact Number</label>
                        <input type="text" id="summary-contact" name="contact_number" placeholder="Enter your Contact Number" required oninput="validateContactNumber(this)">
                      </div>
                      <div class="input-fields">
                          <label>Email</label>
                          <input type="email" id="summary-email" name="email" placeholder="Enter your Email" required>
                      </div>
                </div>
            </div>

            <div class="details family">
                <span class="title"></span>
                  <div class="fields">
                      <div class="input-notefields">
                          <label>Note</label>
                          <textarea id="summary-note" name="note" placeholder="Please add Note" required></textarea>
                      </div>
                  </div>

                  <button class="nextBtn">
                      <span class="btnText">Next</span>
                      <i class="uil uil-navigator"></i>
                  </button>
            </div>

          </div>

          <div class="form second">
            <div class="details ID">
                <span class="title">Reservation Details</span>

                <div class="reservation-type">
                    <div class="option">
                        <input type="radio" id="cottage" name="reservation-type" value="Cottage">
                        <label for="cottage">
                            <img src="Images/Resort.jpg" alt="Cottage">
                            Cottage
                        </label>
                    </div>
                    <div class="option">
                        <input type="radio" id="room" name="reservation-type" value="Room">
                        <label for="room">
                            <img src="Images/Resort.jpg" alt="Room">
                            Room
                        </label>
                    </div>
                    <div class="option">
                        <input type="radio" id="tent" name="reservation-type" value="Tent">
                        <label for="tent">
                            <img src="Images/Resort.jpg" alt="Event Hall">
                            Tent
                        </label>
                    </div>

                    <div class="option">
                        <input type="radio" id="event-hall" name="reservation-type" value="Event Hall">
                        <label for="event-hall">
                            <img src="Images/Resort.jpg" alt="Event Hall">
                            Event Hall
                        </label>
                    </div>
                </div>

                <!-- Cottage Number Selection -->
                <div class="cottage-selection">
                    <label for="cottage-select">Select Cottage No.:</label>
                    <div>
                    <select id="cottage-select" name="selected-cottage" class="cottage-select">
                        <option value="">Select a cottage</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                    </div>
                </div>

                <!-- Room Number Selection -->
                <div class="room-selection" style="display: none;">
                    <label for="room-select">Select Room No.:</label>
                    <div>
                    <select id="room-select" name="selected-room" class="room-select">
                        <option value="">Select a room</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                    </div>
                </div>

                <!-- Tent Quantity Selection -->
                <div class="tent-selection" style="display: none;">
                    <label>Tent Quantity:</label>
                    <div class="tent-options">
                        <input type="text" class="tent-checkbox" name="tent_quantity" placeholder="Enter Tent Quantity">
                    </div>
                </div>

                <!-- Event Hall Quantity Selection -->
                <div class="event-hall-selection" style="display: none;">
                    <label>Event Hall Quantity:</label>
                    <div class="event-hall-options">
                      <select id="event-select" name="eventhall_select" class="room-select">
                        <option value="">Select a room</option>
                        <option value="1">Main Event Hall</option>
                    </select>
                    </div>
                </div>


                <div class="fields">
                    <div class="input-secondfields">
                      <label>Check-in Date</label>
                      <input type="date" name="check_in_date" placeholder="Enter Check-in Date" min="<?php echo date('Y-m-d'); ?>" id="summary-checkindate" required>
                    </div>
                    <div class="input-secondfields">
                      <label>Check-out Date</label>
                      <input type="date" name="check_out_date" placeholder="Enter Check-out Date" min="<?php echo date('Y-m-d'); ?>" id="summary-checkoutdate" required>
                    </div>
                    <div class="input-secondfields">
                      <label>Check-in</label>
                      <input type="time" name="check_in" placeholder="Enter Check-in time" id="summary-check-in" required>
                    </div>
                    <div class="input-secondfields">
                      <label>Check-out</label>
                      <input type="time" name="check_out" placeholder="Enter Check-out time" id="summary-check-out" required>
                    </div>
                    <div class="input-secondfields">
                      <label>Guest</label>
                      <input type="number" name="guests" placeholder="₱30 per Guest" id="summary-guests" required oninput="validateGuestInput(this)">
                    </div>
                </div>

                <div class="buttons">
                    <div class="backBtn">
                        <span class="btnText">Back</span>
                        <i class="uil uil-navigator"></i>
                    </div>
                    
                    <button id="open-modal" class="nextBtn" onclick="openModal(event)">
                        <span class="btnText">Next</span>
                        <i class="uil uil-navigator"></i>
                    </button>
                  
                </div>
            </div>
        </div>
    </div>



    <div id="summary-modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Summary of Your Information</h2>
            <div class="modal-details">
                <h3>Personal Information</h3>
                <div class="modal-row">
                    <p><strong>First Name:</strong></p><span id="modal-first-name"></span>
                </div>
                <div class="modal-row">
                    <p><strong>Last Name:</strong></p><span id="modal-last-name"></span>
                </div>
                <div class="modal-row">
                    <p><strong>Middle Name:</strong></p><span id="modal-middle-name"></span>
                </div>
                <div class="modal-row">
                    <p><strong>Address:</strong></p><span id="modal-address"></span>
                </div>
                <div class="modal-row">
                    <p><strong>Contact Number:</strong></p><span id="modal-contact"></span>
                </div>
                <div class="modal-row">
                    <p><strong>Email:</strong></p><span id="modal-email"></span>
                </div>
                <div class="modal-row">
                    <p><strong>Note:</strong></p><span id="modal-note"></span>
                </div>

                <h3>Reservation Details</h3>
                <div class="modal-row">
                    <p><strong>Reservation Type:</strong></p><span id="modal-reservation-type"></span>
                </div>
                <div class="modal-row">
                    <p><strong>Selected Number:</strong></p><span id="modal-selected-number"></span>
                </div>
                <div class="modal-row">
                    <p><strong>Check-in Date:</strong></p><span id="modal-Check-indate"></span>
                </div>
                <div class="modal-row">
                    <p><strong>Check-out Date:</strong></p><span id="modal-Check-outdate"></span>
                </div>
                <div class="modal-row">
                    <p><strong>Check-in:</strong></p><span id="modal-check-in"></span>
                </div>
                <div class="modal-row">
                    <p><strong>Check-out:</strong></p><span id="modal-check-out"></span>
                </div>
                <div class="modal-row">
                    <p><strong>Guests:</strong></p><span id="modal-guests"></span>
                </div>

                <!-- QR Code and Payment Information -->
                <h3>Payment Information</h3>
                <div class="modal-row">
                    <p><strong>Scan to Pay (QR Code):</strong></p>
                    <div class="qr-container">
                        <img src="Images/gcash.jpg" alt="QR Code" id="qr-code-image">
                    </div>
                </div>
                <div class="modal-row">
                    <p><strong>Contact Number for Payment:</strong></p><span>09156847296</span>
                </div>

                <div class="notice-text">
                    <p>note* Once the down payment is made, it is non-refundable. Thank you for your understanding.</p>
                </div>

                <!-- Gcash Reference Number Input -->
                <div class="input-fields">
                    <label for="summe">Gcash Reference Number</label>
                    <input type="number" id="summe" name="reference" placeholder="Please enter the reference number" required>
                </div>

                <!-- Buttons -->
                <button id="confirm-button" onclick="confirmReservation()">Confirm</button>
                <button class="closebtn" onclick="closeModal()">Cancel</button>
            </div>
        </div>
    </div>

            
        </form>
    </div>






    </main>
    <?php include('includes/footer.php'); ?>
    <script src="reservation-scripts.js"></script>
</body>
</html>


