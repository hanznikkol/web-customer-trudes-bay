<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Trudes Bay Beach Resort</title>

    <link rel="stylesheet" href="activity-styles.css">
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
