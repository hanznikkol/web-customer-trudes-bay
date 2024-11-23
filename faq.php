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

// Fetch FAQs
$sql = "SELECT id, question, answer FROM faqs";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trudes Bay FAQ's</title>
    <link rel="stylesheet" href="faqs-skins.css?ver=<?php echo time();?>">
    <link rel="stylesheet" href="assets/css/footer-style.css">
    <link rel="website icon" type="png" href="Images/Trudes Bay_Final.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--boxicons link-->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    <header>
        <img src="Images/Trudes Bay Strip logo.png" alt="Trudes Bay Beach Resort">
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
                <a href="room-booking.php">Room Booking</a>
                <a href="event-booking.php">Event Booking</a>
                <a href="special-packages.php">Special Packages</a>
            </div>
        </div>
        <div class="dropdown">
            <a href="amenities.php" class="dropbtn">Amenities & Facilities</a>
            <div class="dropdown-content">
                <a href="rooms.php">Rooms</a>
                <a href="cottages.php">Cottages</a>
                <a href="event-hall.php">Event Hall</a>
                <a href="transient-house.php">Transient House</a>
                <a href="beach.html">Beach</a>
                <a href="snorkeling.php">Snorkeling</a>
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
                        <h2>Frequently Asked Questions</h2>
                        <p>Find answers to the most commonly asked questions about Trudes Bay Beach Resort.</p>
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="hero-controls">
                <button onclick="changeSlide(-1)">&#10094;</button>
                <button onclick="changeSlide(1)">&#10095;</button>
            </div>
        </section>
    
        <div class="content">
            <div class="faq">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="question" data-id="<?= $row['id'] ?>" onclick="toggleAnswer(this)">
                        <h3><?= htmlspecialchars($row['question']) ?><img class="toggle-icon" src="Images/Arrow.png" alt="toggle"></h3>
                        <p><?= htmlspecialchars($row['answer']) ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </main>

    <?php include('includes/footer.php'); ?> 
    </section>
    <script src="faq-script.js"></script> <!-- Link to footer script -->
    <script src="index-scripts.js"></script>
</body>
</html>
