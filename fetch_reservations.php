<?php
// Database connection
require_once("dbcon.php");

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Decode the input data
    $data = json_decode(file_get_contents("php://input"), true);
    $check_in_date = $data['check_in_date'];
    $check_out_date = $data['check_out_date'];
    $reservation_type = $data['reservation_type'];

    // Initialize the response array
    $response = array();

    // Arrays to hold reserved cottages and rooms
    $reserved_cottages = [];
    $reserved_rooms = [];
    $reserved_tents = 0; // Track reserved tents
    $event_hall_reserved = 0; // Event hall is either reserved or not (1 or 0)

    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "db_trudes");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query for reserved cottages
    if ($reservation_type == "Cottage" || $reservation_type == "Both") {
        $sql = "SELECT select_cottage FROM reservations WHERE reservation_type = 'Cottage' AND (
                    (check_in_date BETWEEN '$check_in_date' AND '$check_out_date') OR
                    (check_out_date BETWEEN '$check_in_date' AND '$check_out_date')
                )";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $reserved_cottages[] = $row['select_cottage'];  // Store reserved cottages
        }
        $response['reserved_cottages'] = $reserved_cottages;
    }

    // Query for reserved rooms
    if ($reservation_type == "Room" || $reservation_type == "Both") {
        $sql = "SELECT select_room FROM reservations WHERE reservation_type = 'Room' AND (
                    (check_in_date BETWEEN '$check_in_date' AND '$check_out_date') OR
                    (check_out_date BETWEEN '$check_in_date' AND '$check_out_date')
                )";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $reserved_rooms[] = $row['select_room'];  // Store reserved rooms
        }
        $response['reserved_rooms'] = $reserved_rooms;
    }


    // Query for reserved tents
    if ($reservation_type == "Tent" || $reservation_type == "Both") {
        $sql = "SELECT tent_quantity FROM reservations WHERE reservation_type = 'Tent' AND (
                    (check_in_date BETWEEN '$check_in_date' AND '$check_out_date') OR
                    (check_out_date BETWEEN '$check_in_date' AND '$check_out_date')
                )";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $reserved_tents += $row['tent_quantity'];  // Add the reserved tent quantities
        }
        $response['reserved_tents'] = $reserved_tents;
    }

    // Query for event hall reservation (only one event hall, so 1 means reserved, 0 means not)
    if ($reservation_type == "Event Hall" || $reservation_type == "Both") {
        $sql = "SELECT eventhall_select FROM reservations WHERE reservation_type = 'Event Hall' AND (
            (check_in_date BETWEEN '$check_in_date' AND '$check_out_date') OR
            (check_out_date BETWEEN '$check_in_date' AND '$check_out_date')
        )";
        $result = $conn->query($sql);
    
         while ($row = $result->fetch_assoc()) {
            $event_hall_reserved += $row['eventhall_select'];  // Add the reserved tent quantities
        }
        $response['event_hall_reserved'] = $event_hall_reserved;
    }
    
    
    $total_eventhall = 1;  // Total number of event halls   
    $available_eventhall = max(0, $total_eventhall - $event_hall_reserved);  
    $response['available_eventhall'] = $available_eventhall;  


    // Calculate available cottages (assuming cottage numbers are 1 to 6)
    $all_cottages = [1, 2, 3, 4, 5, 6];  // List of all cottages
    $available_cottages = array_diff($all_cottages, $reserved_cottages);  // Get available cottages
    $response['available_cottages'] = array_values($available_cottages);  // Reset array indices

    // Calculate available rooms (assuming room numbers are 1 to 4)
    $all_rooms = [1, 2, 3, 4];  // List of all rooms
    $available_rooms = array_diff($all_rooms, $reserved_rooms);  // Get available rooms
    $response['available_rooms'] = array_values($available_rooms);  // Reset array indices

    // Calculate available tents (assuming there are 5 tents in total)
    $total_tents = 5;
    $available_tents = max(0, $total_tents - $reserved_tents);  // Ensure it doesn't go below 0
    $response['available_tents'] = $available_tents;




    // Respond with the available data
    echo json_encode($response);

    // Close the connection
    $conn->close();
}
?>
