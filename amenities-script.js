document.addEventListener('DOMContentLoaded', (event) => {
    fetchAmenities();

    // Function to fetch and display amenities
    function fetchAmenities() {
        fetch('amenities_handler.php')
            .then(response => response.json())
            .then(data => {
                const amenitiesContainer = document.getElementById('selected-amenities');
                amenitiesContainer.innerHTML = ''; // Clear existing content

                data.forEach(amenity => {
                    const amenityDiv = document.createElement('div');
                    // Create unique ID for each entry (use both category and ID)
                    amenityDiv.id = `${amenity.category}-${amenity.id}`;
                    amenityDiv.className = 'amenity';
                    amenityDiv.setAttribute('data-category', amenity.category); // Store category for filtering
                    amenityDiv.setAttribute('data-id', amenity.id); // Include the ID for deletion
                    amenityDiv.innerHTML = `
                        <img src="data:${amenity.image_type};base64,${amenity.image}" alt="Amenity Image">
                        <h3>${amenity.category}</h3>
                    `;
                    amenitiesContainer.appendChild(amenityDiv);
                });
            })
            .catch(error => console.error('Error fetching amenities:', error));
    }

    // Show only selected amenities based on category
    function showSelectedAmenities() {
        const selectedAmenities = document.querySelectorAll('#amenities-form input[type="checkbox"]:checked');
        const amenitiesContainer = document.getElementById('selected-amenities');
        const amenities = amenitiesContainer.querySelectorAll('.amenity');

        // Hide all amenities first
        amenities.forEach(amenity => {
            amenity.style.display = 'none';
        });

        // Show only the amenities that match the selected categories
        if (selectedAmenities.length > 0) {
            selectedAmenities.forEach(selected => {
                const category = selected.value; // Get the category from the checked checkbox
                const matchingAmenities = amenitiesContainer.querySelectorAll(`[data-category="${category}"]`); // Select all matching amenities
                matchingAmenities.forEach(amenity => {
                    amenity.style.display = 'block'; // Show all matching amenities
                });
            });
        } else {
            // If no checkbox is selected, show all amenities
            amenities.forEach(amenity => {
                amenity.style.display = 'block';
            });
        }
    }

    // Add event listeners to checkboxes for filtering amenities
    const checkboxes = document.querySelectorAll('#amenities-form input[type="checkbox"]');
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', showSelectedAmenities);
    });
    showSelectedAmenities(); // Initial display
});


