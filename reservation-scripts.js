const form = document.querySelector("form"),
    nextBtn = form.querySelector(".nextBtn"),
    backBtn = form.querySelector(".backBtn"),
    AllInput = form.querySelectorAll(".first input");

nextBtn.addEventListener("click", () => {
    let allFilled = true;
    AllInput.forEach(input => {
        if (input.value === "") {
            allFilled = false;
        }
    });

    if (allFilled) {
        form.classList.add('secActive');
    } else {
        form.classList.remove('secActive');
    }
});

backBtn.addEventListener("click", () => form.classList.remove('secActive'));

// Handle Reservation Type Selection
document.addEventListener("DOMContentLoaded", function () {
    const reservationTypeRadios = document.querySelectorAll('input[name="reservation-type[]"]');
    const tentSelection = document.querySelector('.tent-selection');
    const eventSelection = document.querySelector('.event-hall-selection');
    const cottageSelect = document.querySelector('.cottage-selection');
    const roomSelect = document.querySelector('.room-selection');
    const eventSelect = document.getElementById('event-select');

    // Function to handle radio button changes
    function updateSelections() {

        if (document.getElementById('cottage').checked) {
            cottageSelect.style.display = 'block';
        } 
        else {
            cottageSelect.style.display = 'none';
            document.querySelectorAll('input[name="cottage-type[]"]').forEach(radio => {
                radio.checked = false;
            })
        }
        
        if (document.getElementById('room').checked) {
            roomSelect.style.display = 'block';
        } 
        else {
            roomSelect.style.display = 'none';
            document.querySelectorAll('input[name="room-type[]"]').forEach(radio => {
                radio.checked = false;
            })
        }
        
        if (document.getElementById('tent').checked) {
            tentSelection.style.display = 'block';
        }
        else {
            tentSelection.style.display = 'none';
        }
    }

    // Add event listeners to the radio buttons
    reservationTypeRadios.forEach(radio => {
        radio.addEventListener('change', updateSelections);
    });
});

// Open Modal with updated fields
function openModal(event) {
    event.preventDefault();  // Prevent default form submission

    const modal = document.getElementById("summary-modal");
    modal.style.display = "block";

    // Fill the modal with the form data
    document.getElementById("modal-first-name").innerText = document.getElementById("summary-first-name").value || "N/A";
    document.getElementById("modal-last-name").innerText = document.getElementById("summary-last-name").value || "N/A";
    document.getElementById("modal-middle-name").innerText = document.getElementById("summary-middle-name").value || "N/A";
    document.getElementById("modal-address").innerText = document.getElementById("summary-address").value || "N/A";
    document.getElementById("modal-contact").innerText = document.getElementById("summary-contact").value || "N/A";
    document.getElementById("modal-email").innerText = document.getElementById("summary-email").value || "N/A";
    document.getElementById("modal-note").innerText = document.getElementById("summary-note").value || "N/A";

    const selectedType = document.querySelector('input[name="reservation-type"]:checked');
    document.getElementById("modal-reservation-type").innerText = selectedType ? selectedType.value : "None selected";

    let selectedNumber = "Not selected";
    if (selectedType) {
        if (selectedType.value === "Cottage") {
            selectedNumber = document.getElementById('cottage-select').value || "Not selected";
        } else if (selectedType.value === "Room") {
            selectedNumber = document.getElementById('room-select').value || "Not selected";
        } else if (selectedType.value === "Event Hall") {
            selectedNumber = document.getElementById('event-select').value || "Not selected";
        } else if (selectedType.value === "Tent") {
            selectedNumber = document.querySelector(".tent-checkbox").value || "Not selected";
        }
    }
    document.getElementById("modal-selected-number").innerText = selectedNumber;

    // Dates and times
    document.getElementById("modal-Check-indate").innerText = document.getElementById("summary-checkindate").value || "N/A";
    document.getElementById("modal-Check-outdate").innerText = document.getElementById("summary-checkoutdate").value || "N/A";
    document.getElementById("modal-check-in").innerText = document.getElementById("summary-check-in").value || "N/A";
    document.getElementById("modal-check-out").innerText = document.getElementById("summary-check-out").value || "N/A";
    document.getElementById("modal-guests").innerText = document.getElementById("summary-guests").value || "N/A";
}

// Close Modal
document.querySelector(".close").onclick = function() {
    closeModal();
};

// Ensure modal closes if user clicks outside of it
window.onclick = function(event) {
    const modal = document.getElementById("summary-modal");
    if (event.target === modal) {
        closeModal();
    }
};

function confirmReservation() {
    document.getElementById("reservation_form").submit();
    closeModal(); // Close the modal after confirming
}

// Function to close the modal
function closeModal() {
    const modal = document.getElementById("summary-modal");
    modal.style.display = "none";
}

// Form validation
function validateGuestInput(input) {
    if (input.value === '' || isNaN(input.value) || input.value < 0) {
        input.setCustomValidity('Please enter a valid number of guests.');
    } else {
        input.setCustomValidity('');
    }
}

function validateContactNumber(input) {
    const value = input.value;
    // Allow only digits and limit to 11 characters
    input.value = value.replace(/[^0-9]/g, '').substring(0, 11);
}

function validateName(input) {
    const value = input.value;
    // Allow only letters (and spaces for names with multiple parts)
    input.value = value.replace(/[^a-zA-Z\s]/g, '');
}

// Add event listener to open-modal button
document.getElementById("open-modal").addEventListener("click", openModal);
