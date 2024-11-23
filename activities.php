<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Trudes Bay Beach Resort</title>

    <link rel="stylesheet" href="activity-styles.css?ver=<?php echo time();?>">
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
      
      
            <section class="start-section">
            <div class="section-intro">
                <h2>Beach Activities</h2>
                <p>Allow us to introduce the main highlights of the beach which are the white sands and refreshing waves crashing down ashore <br> that gives you thrill to feel the vibes of summer vacation.</p>
            </div>
            
            <div id="activity-list"></div> <!-- Container for dynamically loaded activities -->

        </section>


    </main>
    <?php include('includes/footer.php'); ?>

    <script src="activities-script.js"> </script>
</body>
</html>
