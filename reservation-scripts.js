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

let maxGuests = 0;
function calculateMaxGuests() {
    maxGuests = 0
    reservationPrice = 0;
    const checkboxes = document.querySelectorAll('input[name="reservation-type[]"]:checked');
    const values = [];
    checkboxes.forEach(checkbox => values.push(checkbox.value));

    if(values.includes("Cottage")) {
        const cottages = document.querySelectorAll('input[name="cottage-type[]"]:checked');
        cottages.forEach(cottage => {
            maxGuests += 10
            reservationPrice += 250
        })
    }
    if(values.includes("Room")) {
        const rooms = document.querySelectorAll('input[name="room-type[]"]:checked');
        rooms.forEach(room => {
            maxGuests += 4
            reservationPrice += 350
        } )
    }
    if(values.includes("Tent")) {
        const tent = document.querySelector('.tent-checkbox');
        maxGuests += (4 * tent.value)
        reservationPrice += (100 * tent.value)
    }
    if(values.includes("Event Hall")) {
        maxGuests += 25
        reservationPrice += 400
    }

    const guestInput = document.getElementById("summary-guests")

    guestInput.max = maxGuests
    document.getElementById("guest-count-label").innerText = `No. of Guests (Maximum of ${maxGuests})`
}

let reservationPrice = 0;
let guestPrice = 0;

function calculatePrice() {
    const guestInput = document.getElementById("summary-guests")
    guestPrice = 0;
    guestPrice = (guestInput.value * 30)
}

document.getElementById("summary-guests").addEventListener('change', calculatePrice)
backBtn.addEventListener("click", () => form.classList.remove('secActive'));
document.querySelectorAll('input[name="room-type[]"], input[name="cottage-type[]"], .tent-checkbox').forEach(radio => {
    radio.addEventListener('change', calculateMaxGuests);
})
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
        calculateMaxGuests()

    }

    // Add event listeners to the radio buttons
    reservationTypeRadios.forEach(radio => {
        radio.addEventListener('change', updateSelections);
    });
});

function validateSecondForm() {
    var AllSecondInput = document.querySelectorAll(`.second input:not(input[type="checkbox"]):not(.tent-checkbox)`);
    for(let input of AllSecondInput) {
        if (input.value === "") {
            return false
        }
    };

    const checkboxes = document.querySelectorAll('input[name="reservation-type[]"]:checked');
    const values = [];
    checkboxes.forEach(checkbox => values.push(checkbox.value));
    if(values.length <= 0) return false

    if(values.includes("Cottage")) {
        const cottages = document.querySelectorAll('input[name="cottage-type[]"]:checked');
        if(cottages.length <= 0) return false
    }
    if(values.includes("Room")) {
        const rooms = document.querySelectorAll('input[name="room-type[]"]:checked');
        if(rooms.length <= 0) return false
    }
    if(values.includes("Tent")) {
        const tent = document.querySelector('.tent-checkbox');
        if(tent.value <= 0) return false
    }

    return true
}

// Open Modal with updated fields
function openModal(event) {
    
    event.preventDefault();  // Prevent default form submission
    if(!validateSecondForm()) {
        alert("Please fill up the required fields")
        return
    }
    
    const guestCount = document.getElementById("summary-guests").value
    if(guestCount > maxGuests) {
        alert("Guest count exceeded the maximum amount")
        return;
    }

    // Validate if selected check out is later than check in
    const checkindate = document.getElementById("summary-checkindate").value; 
    const checkoutdate = document.getElementById("summary-checkoutdate").value; 
    const checkin = document.getElementById("summary-check-in").value; 
    const checkout = document.getElementById("summary-check-out").value;

    if(!isCheckoutLater(checkindate, checkoutdate, checkin, checkout)) {
        alert("Check out date & time must be later than check in")
        return;
    };

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

    let reservationType = "N/A"

    //Reservation Type
    const checkboxes = document.querySelectorAll('input[name="reservation-type[]"]:checked');
    const values = [];
    checkboxes.forEach(checkbox => values.push(checkbox.value));
    if(values.length > 1) reservationType = "Multiple"
    else reservationType = values[0]
        
    document.getElementById("modal-reservation-type").innerText = reservationType

    const modalSelected = document.getElementById("modal-selected")
    modalSelected.innerHTML = '';
    if(values.includes("Cottage")) {
        const cottages = document.querySelectorAll('input[name="cottage-type[]"]:checked');
        cottages.forEach(cottage => {
            modalSelected.innerHTML += `<p>${cottage.value} (₱250)</p>`
        })
    }
    if(values.includes("Room")) {
        const rooms = document.querySelectorAll('input[name="room-type[]"]:checked');
        rooms.forEach(room => {
            modalSelected.innerHTML += `<p>${room.value} (₱350)</p>`
        })
    }
    if(values.includes("Tent")) {
        const tent = document.querySelector('.tent-checkbox');
        modalSelected.innerHTML += `<p>${tent.value} Tents (₱100 each)</p>`
    }
    if(values.includes("Event Hall")) {
        modalSelected.innerHTML += `<p>Event Hall (₱400)</p>`
    }

    // Dates and times
    document.getElementById("modal-Check-indate").innerText = checkindate || "N/A";
    document.getElementById("modal-Check-outdate").innerText = checkoutdate || "N/A";
    document.getElementById("modal-check-in").innerText = checkin || "N/A";
    document.getElementById("modal-check-out").innerText = checkout || "N/A";
    document.getElementById("modal-guests").innerText = `${guestCount} (₱30 each)` || "N/A";

    document.getElementById("modal-reservation-price").innerText = `₱${reservationPrice}`
    document.getElementById("modal-guest-price").innerText = `₱${guestPrice}`
    document.getElementById("modal-total-price").innerHTML= `<strong>₱${guestPrice + reservationPrice}</strong>`
}

function isCheckoutLater(checkindate, checkoutdate, checkin, checkout) {
    // Combine date and time into Date objects
    const checkinDateTime = new Date(`${checkindate}T${checkin}`);
    const checkoutDateTime = new Date(`${checkoutdate}T${checkout}`);

    // Return true if checkout is later, false otherwise
    return checkoutDateTime > checkinDateTime;
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
    const refNumber = document.getElementById("modal-reference-number").value
    if(refNumber == "" || refNumber == null || refNumber == undefined) {
        alert("GCash Reference number is required")
        return;
    }
        
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
