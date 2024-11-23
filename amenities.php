<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trudes Bay Amenities</title>
    <link rel="stylesheet" href="amenity-styles.css?ver=<?php echo time(); ?>">
    <link rel="stylesheet" href="assets/css/footer-style.css">
    <link rel="website icon" type="png" href="Images/Trudes Bay_Final.png" />
</head>
<body>
    <header>
        <img src="Images/Trudes Bay Strip logo.png" alt="Trudes Bay Beach Resort">
        <!-- For mobile purpose nav-->
        <svg class="svg-hamburger" onclick="toggleNavigation()" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M7.5 42.5H52.5M7.5 30H52.5M7.5 17.5H52.5" stroke="white" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <script>
            function toggleNavigation() {
                const navMenu = document.querySelector('nav'); // Select the nav element
                navMenu.classList.toggle('active'); // Toggle the 'active' class
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
        <div class="content">
            <h2>Amenities & Facilities</h2>
            <p>Explore our wide range of amenities and facilities to make your stay unforgettable.</p>
            
            <form id="amenities-form">
                <label for="beach-checkbox">
                    <input type="checkbox" id="beach-checkbox" name="amenities" value="Beach">
                    <span></span> Beach
                </label>
                <label for="rooms-checkbox">
                    <input type="checkbox" id="rooms-checkbox" name="amenities" value="Rooms">
                    <span></span> Rooms
                </label>
                <label for="cottages-checkbox">
                    <input type="checkbox" id="cottages-checkbox" name="amenities" value="Cottages">
                    <span></span> Cottages
                </label>
                <label for="event-hall-checkbox">
                    <input type="checkbox" id="event-hall-checkbox" name="amenities" value="Event Hall">
                    <span></span> Event Hall
                </label>
                <label for="transient-house-checkbox">
                    <input type="checkbox" id="transient-house-checkbox" name="amenities" value="Transient House">
                    <span></span> Transient House
                </label>
            </form>

            <div id="selected-amenities" class="amenities-container"></div>

            </div>
        </div>
    </main>
    <?php include('includes/footer.php'); ?>

    <script src="amenities-script.js"> </script>

</body>
</html>
