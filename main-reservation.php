<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trudes Bay FAQ's</title>
    <link rel="stylesheet" href="main-Reserv-style.css?ver=<?php echo time(); ?>">
    <link rel="stylesheet" href="assets/css/footer-style.css">
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link rel="website icon" type="png" href="Images/Trudes Bay_Final.png" />
</head>
<body>
    <header>
        <img src="Images/Trudes Bay Strip logo.png" alt="Trudes Bay Beach Resort">
        <svg class="svg-hamburger" onclick="toggleNavigation()" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M7.5 42.5H52.5M7.5 30H52.5M7.5 17.5H52.5" stroke="white" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <script>
            function toggleNavigation() {
                const navMenu = document.querySelector('nav');
                navMenu.classList.toggle('active');
            }
        </script>
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
        <!-- New Booking Section -->
        <section class="section__container header__container">
            <div class="header__image__container">
                <div class="header__content">
                    <h1>Enjoy Your Dream Vacation</h1>
                    <p>Book Hotels, Flights, and Stay Packages at the Lowest Price.</p>
                    <a href="reservation.php" class="book-now-btn">Book Now</a>
                </div>
                <div class="booking__container">
                    <form action="" method="POST">
                        <div class="form__group">
                            <div class="input__group">
                                <label for="checkInDate">Enter Check-In Date</label>
                                <input type="date" id="checkInDate" name="check_in_date" min="<?php echo date('Y-m-d'); ?>" required>
                            </div>
                        </div>

                        <div class="form__group">
                            <div class="input__group">
                                <label for="checkOutDate">Enter Check-Out Date</label>
                                <input type="date" id="checkOutDate" name="check_out_date" min="<?php echo date('Y-m-d'); ?>" required>
                            </div>
                        </div>

                        <div class="form__group">
                            <div class="input__group">
                                <label for="reservation_type">Reservation Type</label>
                                <select name="reservation_type" id="reservationType" required>
                                    <option value="Room">Room</option>
                                    <option value="Cottage">Cottage</option>
                                    <option value="Tent">Tent</option>
                                    <option value="Event Hall">Event Hall</option>
                                </select>
                            </div>
                        </div>
                    </form>
                    <button class="find-btn">Find Availability</button>
                </div>
            </div>

            <!-- Pop-up Result Box -->
            <div id="popup" class="popup" style="display:none;">
                <div class="popup-content">
                    <span id="closePopup" class="close-btn">&times;</span>
                    <p></p>
                </div>
            </div>
        </section>



        <section class="pricing-section">
            <h2>Pricing</h2>
            <p>Choose the perfect reservation for you</p>
   
            <div class="pricing-cards">
              <div class="card basic-plan">
                <img src="Images/cottage6.jpg" alt="card-image" class="card-image">
                <h3>Cottage</h3>
                <p class="price">₱250</p>
                <ul>
                  <li>Beachfront room</li>
                  <li>Complimentary breakfast</li>
                  <li>Access to pool and spa facilities</li>
                </ul>
              </div>
          
              <div class="card business-plan">
                <img src="Images/room3.jpg" alt="card-image" class="card-image">
                <h3>Room</h3>
                <p class="price">₱350</p>
                <ul>
                  <li>Ocean view suite</li>
                  <li>Private balcony</li>
                  <li>24-hour room service</li>
                  <li>Feature text goes here</li>

                </ul>
              </div>
          
              <div class="card enterprise-plan">
                <img src="Images/EVENTHALL.jpg" alt="card-image" class="card-image">
                <h3>Event Hall</h3>
                <p class="price">₱400</p>
                <ul>
                  <li>Luxury villa with private pool</li>
                  <li>Personal butler service</li>
                  <li>Feature text goes here</li>
                  <li>Feature text goes here</li>
                </ul>
              </div>
            </div>
          </section>

    </main>

    <?php include('includes/footer.php'); ?>
    <script src="main-reservation-script.js"></script>

</body>

</html>
