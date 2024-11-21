function loadActivities() {
    fetch('activities_handler.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok: ' + response.statusText);
            }
            return response.json(); // Use json() to parse response directly
        })
        .then(data => {
            const activityList = document.getElementById('activity-list');
            activityList.innerHTML = ''; // Clear existing activities
            if (data.length === 0) {
                activityList.innerHTML = '<p>No activities found.</p>';
                return; // Exit if no activities
            }
            data.forEach(activity => {
                activityList.innerHTML += `
                    <div class="content-wrapper">
                        <div class="image-container">
                            <img src="data:${activity.image_type};base64,${activity.image_data}" alt="${activity.activity_title}" />
                        </div>
                        <div class="text-container">
                            <h3>${activity.activity_title}</h3>
                            <p>${activity.description}</p>
                        </div>
                    </div>
                `;
            });
        })
        .catch(error => console.error('Error loading activities:', error));
}

// Load activities on page load
document.addEventListener('DOMContentLoaded', loadActivities);