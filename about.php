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
    <title>About Trudes Bay Beach Resort</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!--swiper link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="about-skins.css">
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
                        <h2>About Us</h2>
                        <p>Welcome to Trudes Bay Beach Resort, your ideal escape in Patnanungan, Quezon. </p>
                        <p>Whether you stay in our cozy rooms or beachfront cottages, comfort and relaxation are just steps <br> from the shore. Celebrate special moments in our versatile event hall, perfect for any occasion. Dive into <br> adventure with activities like swimming, island hopping, and snorkeling amidst stunning natural beauty.</p>
                        <p>We can’t wait to welcome you!</p>
                        <a href="reservation.html" class="cta-button">Book Now</a>
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="hero-controls">
                <button onclick="changeSlide(-1)">&#10094;</button>
                <button onclick="changeSlide(1)">&#10095;</button>
            </div>
        </section>

        <section class="history-section">
          <div class="containers">
              <h2>History</h2>
              <div class="contents">
                  <div class="image-sections">
                      <img src="Images/owner.jpg" alt="Owner's photo">
                      <p>Ronnie A. Barrera</p>
                      <p>Owner of Trudes Bay Beach Resort</p>
                  </div>

                  <div class="middle-line"></div>

                  <div class="text-sections">
                      <p>
                      Trudes Bay's story started unexpectedly when my eldest daughter wanted to celebrate her 18th birthday at a nearby beach resort. 
                      Instead, I suggested hosting the event at our own undeveloped beach, promising to create a resort-like experience for her special day. 
                      She agreed, and after the celebration, we realized we had uncovered a hidden gem. That moment marked the beginning of Trudes Bay, 
                      a peaceful getaway we now enjoy sharing with others. Today, visitors from all over come to Trudes Bay, drawn to its inviting atmosphere 
                      and relaxing escape from the hectic mainland.</p>
                  </div>
              </div>
          </div>
      </section>

      <section class="start-section">
            <div class="content-wrapper">
                <div class="image-container">
                    <img src="Images/room2.jpg" alt="Aerial view of villa and beach" width="230" height="270">
                </div>
                <div class="text-container">
                    <h3>Community</h3>
                    <p>We are proud to be supported by the Municipal Tourism Office of Patnanungan, Quezon, 
                      which helps<br> us promote the beauty  and charm of our region. This partnership enables us 
                      to provide our guests with<br> an authentic local experience, showcasing the rich culture and 
                      natural wonders of Patnanungan. <br>Together,we aim to ensure that your visit to Trudes Bay is 
                      not only enjoyable but also deeply connected to <br>the vibrant community that surrounds us. We 
                      look forward to sharing the warmth and hospitality of our town with you!</p>
                </div>
            </div>

          
      
            <div class="content-wrapper">
                <div class="text-rightcontainer">
                    <h3>Amenities and Facilities</h3>
                    <p> Experience the charm of Trudes Bay with our unique accommodations tailored to <br>meet your every need. 
                      Whether you're looking for a cozy beachfront cottage,<br>an enchanting treehouse stay, or the stylish comfort 
                      of our A-frame cabins, your time <br>here will be nothing short of unforgettable. Planning a larger event? 
                      Our spacious<br> function hall is perfect for family reunions, weddings, or any special celebration. <br>Whatever 
                      your occasion, Trudes Bay is the perfect backdrop for creating lasting <br>memories in a serene, welcoming 
                      environment. Your relaxing escape awaits!</p>
                      <a href="amenities.php" class="btn-learn-more">Learn more</a>
                </div>

                <div class="image-container">
                    <img src="Images/room3.jpg" alt="Aerial view of villa and beach" width="230" height="270">
                </div>
            </div>

            <div class="content-wrapper">
              <div class="image-container">
                  <img src="Images/hero home page3.jpg" alt="Aerial view of villa and beach" width="230" height="270">
              </div>
              <div class="text-container">
                  <h3>Activities</h3>
                  <p>At Trudes Bay, adventure and relaxation await you! Dive into the crystal-clear waters for an exhilarating<br> snorkeling experience, 
                  where vibrant marine life will captivate your senses. Enjoy a leisurely swim in our<br> inviting ocean, or gather friends for a friendly 
                  game of beach volleyball under the warm sun. For those <br>seeking exploration, embark on an unforgettable island-hopping adventure to 
                  discover hidden treasures.<br> With a perfect blend of excitement and tranquility, Trudes Bay offers activities that cater to every<br> adventurer,
                  ensuring your stay is filled with fun and unforgettable memories!</p>
                  <a href="activities.php" class="btn-learn-more">Learn more</a>
              </div>
          </div>

      </section>


      <div class="contact-title">
            <h1> Our Location</h1>
            <p>Trudes Bay boasts a breathtaking beachfront featuring golden sands and crystal-clear waters, creating an ideal setting for both relaxation and adventure. 
                    Patnanungan, Quezon, is renowned for its unspoiled natural beauty, with lush landscapes and picturesque coastal views that invite exploration. Whether '
                    you're looking to unwind by the shore or embark on an adventure to uncover the area's hidden gems, Trudes Bay offers a unique escape where you can connect 
                    with nature and create unforgettable memories.</p>
      </div>
        
      <section class="contact-us">
    <div class="container-contact">
        <div class="contact-info">
            <h2>Contact Us</h2>
            <p><strong>How to get in touch with us.</strong></p>
            <p>So. Lumong, Brgy. Norte, Patnanungan Quezon</p>

            <!-- PHP Code to Fetch Phone Numbers from Database -->
            <?php
                // Database connection details
                $servername = "localhost";
                $username = "root"; // Adjust username as per your setup
                $password = "";      // Adjust password as per your setup
                $dbname = "db_trudes"; // Replace with your actual database name

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // SQL query to fetch the phone numbers from the about_contacts table
                $sql = "SELECT phone FROM about_contacts";
                $result = $conn->query($sql);

                // Display the phone numbers
                if ($result->num_rows > 0) {
                    echo "<p><strong>Contact Numbers:</strong></p><ul>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<li>Cel. No: " . $row['phone'] . "</li>";
                    }
                    echo "</ul>";
                } else {
                    echo "<p>Cel. No: Not available</p>";
                }

                // Close connection
                $conn->close();
            ?>

            <ul>
                <li><strong>Email Us</strong></li>
                <li><a href="mailto:kathleenadriennes@gmail.com">Email: kathleenadriennes@gmail.com</a></li>
            </ul>

            <ul>
                <li><strong>Social Media</strong></li>
                <li><a href="https://www.facebook.com/profile.php?id=100091917166769">Facebook: Trudes Bay</a></li>
            </ul>

            <p>For hotel inquiries, please visit our <a href="#">hotel contact page</a>. It’s designed to help our valued guests find their ideal Shangri-La experience.</p>
        </div>

        <div class="image-section">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21201.550995618716!2d122.15762482756506!3d14.782341274415069!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3399ad5f88f06829%3A0x536081142478c829!2sPatnanungan%20Norte%2C%20Patnanungan%2C%20Quezon!5e0!3m2!1sfil!2sph!4v1729017253699!5m2!1sfil!2sph" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>


  
      



        
         

         
        
    
    </main>


    <script src="index-scripts.js"></script>
    <script src="about-script.js"></script>
    <?php include('includes/footer.php'); ?>
</body>
</html>
