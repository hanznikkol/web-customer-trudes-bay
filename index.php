<?php
// Database connection
$servername = "localhost"; // or your server name
$username = "root"; // replace with your database username
$password = ""; // replace with your database password
$dbname = "db_trudes"; // replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch images from the database
function fetchImages($conn) {
    $sql = "SELECT image_data, image_type FROM dashboard_upload";
    $result = $conn->query($sql);
    $images = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $images[] = [
                'data' => $row['image_data'], // Use raw data instead of base64_encode
                'type' => $row['image_type']
            ];
        }
    }
    return $images;
}


$images = fetchImages($conn);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trudes Bay Beach Resort</title>
    <link rel="stylesheet" href="indexs-style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!--swiper link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    <section class="hero"> 
            <?php foreach ($images as $index => $image): ?>
                <div class="hero-slide <?php echo $index === 0 ? 'active' : ''; ?>">
                    <img src="data:<?php echo $image['type']; ?>;base64,<?php echo $image['data']; ?>" alt="Uploaded Image <?php echo $index + 1; ?>">
                    <div class="hero-text">
                        <h2>Welcome to Trudes Bay Beach Resort</h2>
                        <p>Discover the tranquility of our resort with pristine beaches and luxury amenities.</p>
                        <a href="reservation.html" class="cta-button">Book Now</a>
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="hero-controls">
                <button onclick="changeSlide(-1)">&#10094;</button>
                <button onclick="changeSlide(1)">&#10095;</button>
            </div>
        </section>

        <section class="start-section">
          <div class="content-wrapper">
              <div class="image-container">
                  <img src="Images/Resort.jpg" alt="Aerial view of villa and beach" width="270" height="320">
              </div>
              <div class="text-container">
                  <h3>About Us</h3>
                  <p>Welcome to Trudes Bay Beach Resort, your ideal escape in Patnanungan, Quezon. </p>
                  <p>Whether you stay in our cozy rooms or beachfront cottages, comfort and relaxation are just steps <br> from the shore. Celebrate special moments in our versatile event hall, perfect for any occasion. Dive into <br> adventure with activities like swimming, island hopping, and snorkeling amidst stunning natural beauty.</p>
                  <p>We can’t wait to welcome you!</p>
                  <a href="about.php" class="btn-learn-more">Learn more</a>
              </div>
          </div>
        </section>

        
        <div class="amenities-title"> 
            <h2>Amenities and Facilities</h2>
            <p> Experience the charm of Trudes Bay with our unique accommodations tailored to meet your every need. Whether you're looking for a cozy beachfront cottage, 
                an enchanting treehouse stay, or the stylish comfort of our A-frame cabins, your time here will be nothing short of unforgettable. Planning a larger event? 
                Our spacious function hall is perfect for family reunions, weddings, or any special celebration. Whatever your occasion, Trudes Bay is the perfect backdrop 
                for creating lasting memories in a serene, welcoming environment. Your relaxing escape awaits!</p>
            </div>

            <div class="container swiper">
            <div class="card-wrapper"> 
                <ul class="card-list swiper-wrapper">
                <li class="card-item swiper-slide">
                    <a href="amenities.php" class="card-link">
                    <img src="Images/room3.jpg" alt="card-image" width="200" height="130">
                    <p class="badge designer">Room</p>
                    <h2 class="card-title"> Explore Our Premium Accommodations and Facilities</h2>
                    
                    </a>
                </li>

                <li class="card-item swiper-slide">
                    <a href="amenities.php" class="card-link">
                    <img src="Images/cottage6.jpg" alt="card-image" width="200" height="130">
                    <p class="badge developer"> Cottage</p>
                    <h2 class="card-title">Explore Our Premium Accommodations and Facilities </h2>
                    
                    </a>
                </li>

                <li class="card-item swiper-slide">
                    <a href="amenities.php" class="card-link">
                    <img src="Images/EVENTHALL.jpg" alt="card-image" width="200" height="130">
                    <p class="badge marketer"> Event Hall</p>
                    <h2 class="card-title">Explore Our Premium Accommodations and Facilities </h2>
                    
                    </a>
                </li>

                <li class="card-item swiper-slide">
                    <a href="amenities.php" class="card-link">
                    <img src="Images/tent.jpg" alt="card-image" width="200" height="130">
                    <p class="badge gamer"> Tent</p>
                    <h2 class="card-title">Explore Our Premium Accommodations and Facilities </h2>
                    
                    </a>
                </li>

                </ul>

                <div class="swiper-pagination"></div>
                <div class="swiper-slide-button swiper-button-prev"></div>
                <div class="swiper-slide-button swiper-button-next"></div>
            </div>
            </div>          
    

        <section class="start-section">
            <div class="section-intro">
                <h2>Activities</h2>
                <p>Learn more about how we started our story and how we've grown into the serene getaway that guests love today.</p>
            </div>
        
            <div class="content-wrapper">
                <div class="image-container">
                    <img src="Images/sand.jpg" alt="Aerial view of villa and beach" width="230" height="270">
                </div>
                <div class="text-container">
                    <h3>Swimming</h3>
                    <p>Welcome to Trudes Bay Beach Resort, your ideal escape in Patnanungan, Quezon. </p>
                    <h3>Snorkeling</h3>
                    <p>Welcome to Trudes Bay Beach Resort, your ideal escape in Patnanungan, Quezon. </p>
                    <h3>island hopping</h3>
                    <p>Welcome to Trudes Bay Beach Resort, your ideal escape in Patnanungan, Quezon. </p>
                    <h3>Beach Volleyball</h3>
                    <p>Welcome to Trudes Bay Beach Resort, your ideal escape in Patnanungan, Quezon. </p>
                    
                    <a href="activities.php" class="btn-learn-more">learn more</a>
                </div>
            </div>
        </section>
    </main>

    <?php include('includes/footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="about-script.js"></script>
    <script src="index-scripts.js"></script>
</body>
</html>
