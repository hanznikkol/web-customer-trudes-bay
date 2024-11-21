<?php
define ("DB_SERVER", "localhost");
define ("DB_USERNAME", "root");
define ("DB_PASSWORD", "");
define ("DB_DATABASE", "db_trudes");

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

if(!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

// Fetch amenities
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT * FROM amenities";
    $result = $conn->query($sql);
    $amenities = [];

    while ($row = $result->fetch_assoc()) {
        $row['image'] = base64_encode($row['image']); // This is correct
        $amenities[] = $row;
    }
    
    echo json_encode($amenities);
    exit;
}

?>
