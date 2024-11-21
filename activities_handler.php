<?php
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

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT id, activity_title, description, image_data, image_type FROM activities";
    $result = $conn->query($sql);

    $activities = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $activities[] = [
                'id' => $row['id'],
                'activity_title' => $row['activity_title'],
                'description' => $row['description'],
                'image_data' => base64_encode($row['image_data']),
                'image_type' => $row['image_type']
            ];

            // Debugging: Check the image data and type
            if ($row['image_data']) {
                // Log the length of the image data for debugging
                error_log("Image ID: " . $row['id'] . " | Type: " . $row['image_type'] . " | Length: " . strlen($row['image_data']));
            } else {
                error_log("Image ID: " . $row['id'] . " has no image data.");
            }
        }
    }

    header('Content-Type: application/json'); // Set header for JSON response
    echo json_encode($activities);
}

?>