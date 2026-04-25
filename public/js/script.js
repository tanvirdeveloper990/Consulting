// Combined Scroll Effect for Navbar and Logo
window.addEventListener("scroll", function () {
  const navbar = document.getElementById("navbar");
  const logoContainer = document.querySelector(".logo-container");
  
  if (window.scrollY > 50) {
    // Add navbar scrolled effect
    navbar.classList.add("navbar-scrolled", "shadow-lg", "navbarBg");
    
    // Shrink logo
    logoContainer.classList.remove("logo-large");
    logoContainer.classList.add("logo-small");
  } else {
    // Remove navbar scrolled effect
    navbar.classList.remove("navbar-scrolled", "shadow-lg", "bg-white");
    
    // Expand logo back to original size
    logoContainer.classList.remove("logo-small");
    logoContainer.classList.add("logo-large");
  }
});

// Mobile Sidebar Toggle
const menuBtn = document.getElementById("menuBtn");
const sidebar = document.getElementById("sidebar");
const closeSidebar = document.getElementById("closeSidebar");

menuBtn.addEventListener("click", function () {
  sidebar.classList.remove("-translate-x-full");
});

closeSidebar.addEventListener("click", function () {
  sidebar.classList.add("-translate-x-full");
});

// Mobile Dropdown Toggle
const dropdownBtns = document.querySelectorAll("[data-dropdown]");
dropdownBtns.forEach((btn) => {
  btn.addEventListener("click", function () {
    const dropdownContent = this.nextElementSibling;
    const arrow = this.querySelector("svg");

    if (dropdownContent.style.maxHeight) {
      dropdownContent.style.maxHeight = null;
      arrow.style.transform = "rotate(0deg)";
    } else {
      // Close other dropdowns
      dropdownBtns.forEach((otherBtn) => {
        if (otherBtn !== btn) {
          const otherContent = otherBtn.nextElementSibling;
          const otherArrow = otherBtn.querySelector("svg");
          otherContent.style.maxHeight = null;
          otherArrow.style.transform = "rotate(0deg)";
        }
      });

      dropdownContent.style.maxHeight = dropdownContent.scrollHeight + "px";
      arrow.style.transform = "rotate(180deg)";
    }
  });
});

// Close sidebar when clicking outside
sidebar.addEventListener("click", function (e) {
  if (e.target === sidebar) {
    sidebar.classList.add("-translate-x-full");
  }
});

// Hero banner slider with auto-fade
$(document).ready(function () {
  $(".banner-slider").slick({
    dots: false,
    infinite: true,
    speed: 1000,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 4000,
    arrows: false, // No buttons as requested
    fade: true, // Auto-fade effect
    cssEase: "ease-in-out",
    pauseOnHover: false,
    pauseOnFocus: false,
    draggable: false,
    swipe: false,
    touchMove: false,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          arrows: false,
          dots: false,
          fade: true,
        },
      },
      {
        breakpoint: 480,
        settings: {
          arrows: false,
          dots: false,
          fade: true,
        },
      },
    ],
  });
});

//Students support section image slider
// Image slider functionality
const stepCards = document.querySelectorAll(".step-card");
const sliderImages = document.querySelectorAll(".slider-image");
// const indicatorDots = document.querySelectorAll(".indicator-dot");
let currentIndex = 0;

function changeImage(index) {
  // Hide all images
  sliderImages.forEach((img) => {
    img.classList.remove("active");
    img.classList.add("opacity-0");
  });

  // Show selected image
  sliderImages[index].classList.add("active");
  sliderImages[index].classList.remove("opacity-0");

  currentIndex = index;
}

// Add hover event listeners to step cards
stepCards.forEach((card, index) => {
  card.addEventListener("mouseenter", () => {
    changeImage(index);
  });
});

// 1st card Paragraph open/close functionality
const paragraphs = document.querySelectorAll(".para");

// Default open first paragraph
paragraphs[0].classList.remove("max-h-0");
paragraphs[0].classList.add("max-h-16");

// Hover logic: open only hovered paragraph
stepCards.forEach((card, index) => {
  card.addEventListener("mouseenter", () => {
    // Close all
    paragraphs.forEach((p) => {
      p.classList.add("max-h-0");
      p.classList.remove("max-h-16");
    });

    // Open hovered paragraph
    paragraphs[index].classList.remove("max-h-0");
    paragraphs[index].classList.add("max-h-16");

    // Already have changeImage so keep it
    changeImage(index);
  });
});

// Auto-play functionality (optional)

// Pause auto-play on hover
const imageSlider = document.getElementById("imageSlider");
imageSlider.addEventListener("mouseenter", () => {
  clearInterval(autoPlayInterval);
});

// Custom Dropdown Functionality for form
// Toggle dropdown visibility
function toggleDropdown(dropdownId) {
  const dropdown = document.getElementById(dropdownId);
  const allDropdowns = document.querySelectorAll('ul[id$="-dropdown"]');

  // Close all other dropdowns
  allDropdowns.forEach((dd) => {
    if (dd.id !== dropdownId) {
      dd.classList.add("hidden");
    }
  });

  // Toggle current dropdown
  dropdown.classList.toggle("hidden");
}

// Select option from dropdown
function selectOption(type, value) {
  const selectedElement = document.getElementById(type + "-selected");
  selectedElement.textContent = value;

  // Close dropdown
  const dropdown = document.getElementById(type + "-dropdown");
  dropdown.classList.add("hidden");
}

// Close dropdowns when clicking outside
document.addEventListener("click", function (event) {
  const isDropdown = event.target.closest('[onclick^="toggleDropdown"]');
  if (!isDropdown) {
    const allDropdowns = document.querySelectorAll('ul[id$="-dropdown"]');
    allDropdowns.forEach((dd) => dd.classList.add("hidden"));
  }
});

// inspire and reviews section
// Get all necessary elements
const successBtn = document.getElementById("videosBtn");
const reviewsBtn = document.getElementById("photosBtn");
const successGrid = document.getElementById("videosGrid");
const reviewsGrid = document.getElementById("photosGrid");

// Get button containers
const successStoriesButtons = document.getElementById("successStoriesButtons");
const verifiedReviewsButtons = document.getElementById(
  "verifiedReviewsButtons"
);

// Function to show Success Stories
function showSuccessStories() {
  // Update button states
  successBtn.classList.add("active");
  successBtn.classList.remove("inactive");
  reviewsBtn.classList.remove("active");
  reviewsBtn.classList.add("inactive");

  // Toggle grids
  successGrid.classList.remove("hidden");
  reviewsGrid.classList.add("hidden");

  // Show single button, hide three buttons
  successStoriesButtons.classList.remove("hidden");
  verifiedReviewsButtons.classList.add("hidden");
}

// Function to show Verified Reviews
function showReviews() {
  // Update button states
  reviewsBtn.classList.add("active");
  reviewsBtn.classList.remove("inactive");
  successBtn.classList.remove("active");
  successBtn.classList.add("inactive");

  // Toggle grids
  reviewsGrid.classList.remove("hidden");
  successGrid.classList.add("hidden");

  // Hide single button, show three buttons
  successStoriesButtons.classList.add("hidden");
  verifiedReviewsButtons.classList.remove("hidden");
}

// Add click event listeners
successBtn.addEventListener("click", showSuccessStories);
reviewsBtn.addEventListener("click", showReviews);

// Apply button styles
const style = document.createElement("style");
style.textContent = `
      .toggle-btn {
        background: white;
        color: #1f2937;
        border: 2px solid #e5e7eb;
      }

      .toggle-btn.active {
        background: #FF482F;
        color: white;
        // border-color: #0A474C;
      }

      .toggle-btn.inactive {
        background: white;
        color: #6b7280;
        border-color: #e5e7eb;
      }

      .toggle-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
      }
    `;
document.head.appendChild(style);

// Set Success Stories as active by default on page load
document.addEventListener("DOMContentLoaded", function () {
  showSuccessStories();
});

// ================= News and Updated Slider =================//
$(document).ready(function () {
  console.log("Initializing News Updates Slider");
  $(".newsUpdatesSlider").slick({
    dots: false,
    infinite: true,
    speed: 800,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
    arrows: true,
    cssEase: "ease-in-out",
    pauseOnHover: true,
    pauseOnFocus: true,
    responsive: [
      {
        breakpoint: 1280,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          arrows: true,
          dots: false,
        },
      },
      {
        breakpoint: 770,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          arrows: false,
          dots: false,
        },
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          dots: false,
        },
      },
    ],
  });
});
// =================Success Stories Review slider Slider =================//
$(document).ready(function () {
  // console.log("Initializing News Updates Slider");
  $(".successStoriesReviews").slick({
    dots: false,
    infinite: true,
    speed: 800,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
    arrows: true,
    cssEase: "ease-in-out",
    pauseOnHover: true,
    pauseOnFocus: true,
    responsive: [
      {
        breakpoint: 1280,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          arrows: true,
          dots: false,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          arrows: false,
          dots: false,
        },
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          dots: false,
        },
      },
    ],
  });
});
// =================Verified Review slider Slider =================//
$(document).ready(function () {
  // console.log("Initializing News Updates Slider");
  $(".verifiedReviews").slick({
    dots: false,
    infinite: true,
    speed: 800,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
    arrows: true,
    cssEase: "ease-in-out",
    pauseOnHover: true,
    pauseOnFocus: true,
    responsive: [
      {
        breakpoint: 1280,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          arrows: true,
          dots: false,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          arrows: false,
          dots: false,
        },
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          dots: false,
        },
      },
    ],
  });
});

// ================= Top University Section =================//
function filterCountry(country) {
  // Hide all university cards
  const allCards = document.querySelectorAll(".university-card");
  allCards.forEach((card) => {
    card.classList.add("hidden");
    // Remove any previously added responsive classes
    card.classList.remove("md:block");
  });

  // Get selected country cards
  const selectedCards = document.querySelectorAll(
    `[data-country="${country}"]`
  );

  // Show selected country cards with responsive logic
  selectedCards.forEach((card, index) => {
    card.classList.remove("hidden");

    // On mobile: show only first 4 cards
    // On tablet+: show all cards
    if (index >= 4) {
      card.classList.add("hidden", "md:block");
    }
  });

  // Update active tab styling
  const allTabs = document.querySelectorAll(".country-tab");
  allTabs.forEach((tab) => {
    tab.classList.remove(
      "active-tab",
      "bg-primary",
      "text-white",
      "border-primary"
    );
    tab.classList.add("bg-white", "text-gray-800", "border-gray-100");
  });

  // Add active styling to clicked tab
  const activeTab = document.querySelector(`[data-tab="${country}"]`);
  if (activeTab) {
    activeTab.classList.add(
      "active-tab",
      "bg-primary",
      "text-white",
      "border-primary"
    );
    activeTab.classList.remove("bg-white", "text-gray-800", "border-gray-100");
  }
}

// =================Top University Slider =================//
$(document).ready(function () {
  // console.log("Initializing News Updates Slider");
  $(".countriesBtnSLider").slick({
    dots: false,
    infinite: true,
    speed: 800,
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
    arrows: false,
    cssEase: "ease-in-out",
    pauseOnHover: true,
    pauseOnFocus: true,
    responsive: [
      {
        breakpoint: 1280,
        settings: {
          autoplay: true,
          autoplaySpeed: 3000,
          slidesToShow: 3,
          slidesToScroll: 1,
          arrows: true,
          dots: false,
        },
      },
      {
        breakpoint: 768,
        settings: {
          autoplay: true,
          autoplaySpeed: 3000,
          slidesToShow: 2,
          slidesToScroll: 1,
          arrows: false,
          dots: false,
        },
      },
      {
        breakpoint: 480,
        settings: {
          autoplay: true,
          autoplaySpeed: 2000,
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          dots: false,
        },
      },
    ],
  });
});
// Initial setup: Show Finland cards with mobile limit
const finlandCards = document.querySelectorAll('[data-country="finland"]');
finlandCards.forEach((card, index) => {
  if (index >= 4) {
    card.classList.add("hidden", "md:block");
  }
});

// Show/Hide Scroll to Top button based on scroll position
const scrollBtn = document.getElementById("scrollToTopBtn");

window.addEventListener("scroll", () => {
  if (window.scrollY > 300) {
    scrollBtn.classList.remove("opacity-0", "invisible");
    scrollBtn.classList.add("opacity-100", "visible");
  } else {
    scrollBtn.classList.add("opacity-0", "invisible");
    scrollBtn.classList.remove("opacity-100", "visible");
  }
});

// FAQ Accordion Functionality
const faqToggles = document.querySelectorAll(".faq-toggle");

faqToggles.forEach((toggle) => {
  toggle.addEventListener("click", function (e) {
    // If this FAQ was already open, simply close it (toggle behavior)
    if (this.checked) {
      // Close all others first
      faqToggles.forEach((item) => {
        if (item !== this) item.checked = false;
      });
    } else {
      // If it was open and user clicked again, allow closing
      this.checked = false;
    }
  });
});
