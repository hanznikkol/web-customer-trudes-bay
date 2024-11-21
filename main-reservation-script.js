document.addEventListener("DOMContentLoaded", () => {
    const findBtn = document.querySelector(".find-btn");
    const popup = document.getElementById("popup");
    const closePopup = document.getElementById("closePopup");
    const popupContent = popup ? popup.querySelector("p") : null;

    if (!findBtn || !popup || !popupContent) {
        console.error("Required elements not found in the DOM.");
        return;
    }

    findBtn.addEventListener("click", (e) => {
        e.preventDefault();

        const checkInDate = document.getElementById("checkInDate");
        const checkOutDate = document.getElementById("checkOutDate");
        const reservationType = document.getElementById("reservationType");

        if (!checkInDate || !checkOutDate || !reservationType) {
            console.error("Input elements not found in the DOM.");
            popupContent.textContent = "An error occurred. Please refresh the page.";
            popup.style.display = "flex";
            return;
        }

        const checkInValue = checkInDate.value;
        const checkOutValue = checkOutDate.value;
        const reservationValue = reservationType.value;

        if (!checkInValue || !checkOutValue || !reservationValue) {
            popupContent.textContent = "Please fill in all fields.";
            popup.style.display = "flex";
            return;
        }

        // Fetch availability for the selected reservation type
        fetch("fetch_reservations.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({
                check_in_date: checkInValue,
                check_out_date: checkOutValue,
                reservation_type: reservationValue,
            }),
        })
            .then((response) => response.json())
            .then((data) => {
                console.log("Server Response:", data);  // Debug: Check the server response
            
                // Get the popup and popup-content elements
                let popupContent = document.querySelector('.popup-content');
                let popup = document.querySelector('.popup');
            
                // Check if the popup elements exist before trying to modify them
                if (popupContent && popup) {
                    // Reset the popup content
                    popupContent.innerHTML = "";
            
                    // Check the selected reservation type
                    const reservationType = document.getElementById("reservationType").value;
            
                    if (reservationType === "Cottage") {
                        // Show available cottages
                        if (data.available_cottages && data.available_cottages.length > 0) {
                            popupContent.innerHTML = `
                                <h2>Available Cottages</h2>
                                <p><strong>Available Cottage Numbers:</strong> ${data.available_cottages.join(", ")}</p>
                            `;
                        } else {
                            popupContent.innerHTML = "<p>No cottages available for the selected dates.</p>";
                        }
                    } else if (reservationType === "Room") {
                        // Show available rooms
                        if (data.available_rooms && data.available_rooms.length > 0) {
                            popupContent.innerHTML = `
                                <h2>Available Rooms</h2>
                                <p><strong>Available Room Numbers:</strong> ${data.available_rooms.join(", ")}</p>
                            `;
                        } else {
                            popupContent.innerHTML = "<p>No rooms available for the selected dates.</p>";
                        }
                    } else if (reservationType === "Tent") {
                        // Show available tents
                        if (data.available_tents > 0) {
                            popupContent.innerHTML = `
                                <h2>Available Tents</h2>
                                <p><strong>Available Tents:</strong> ${data.available_tents}</p>
                            `;
                        } else {
                            popupContent.innerHTML = "<p>No tents available for the selected dates.</p>";
                        }
                    } else if (reservationType === "Event Hall") {
                        // Show available tents
                        if (data.available_eventhall > 0) {
                            popupContent.innerHTML = `
                                <h2>Available Event Hall</h2>
                                <p><strong>Available Event Hall:</strong> ${data.available_eventhall}</p>
                            `;
                        } else {
                            popupContent.innerHTML = "<p>No tents available for the selected dates.</p>";
                        }
                    }
                    

                    
                     else {
                        // If neither Cottage, Room, Tent, or Event Hall is selected
                        popupContent.innerHTML = "<p>Please select a valid reservation type.</p>";
                    }
            
                    // Display the popup
                    popup.style.display = "flex";
                } else {
                    console.error("Popup elements not found in the DOM");
                }
            });
            
            
            

    });

    closePopup.addEventListener("click", () => {
        popup.style.display = "none";
    });

    window.addEventListener("click", (event) => {
        if (event.target === popup) {
            popup.style.display = "none";
        }
    });
});
