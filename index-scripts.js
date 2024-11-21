let slideIndex = 0;
let autoSlideInterval;

function showSlides(n) {
    let slides = document.getElementsByClassName("hero-slide");
    if (n >= slides.length) {
        slideIndex = 0;
    } else if (n < 0) {
        slideIndex = slides.length - 1;
    } else {
        slideIndex = n;
    }

    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
        slides[i].classList.remove("active");
    }

    slides[slideIndex].style.display = "block";
    slides[slideIndex].classList.add("active");
}

// Function to change slide and reset auto-slide timer
function changeSlide(n) {
    showSlides(slideIndex + n);
    resetAutoSlide();
}

// Function to start auto-sliding
function startAutoSlide() {
    autoSlideInterval = setInterval(() => {
        changeSlide(1);
    }, 3000); // Change slide every 5 seconds
}

// Function to reset auto-sliding when manually controlled
function resetAutoSlide() {
    clearInterval(autoSlideInterval);
    startAutoSlide(); // Restart the auto-slide
}

// Initializing the first slide and auto-slide
window.onload = function() {
    showSlides(slideIndex); // Show the first slide
    startAutoSlide(); // Start auto-slide on page load
};
