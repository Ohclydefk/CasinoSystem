document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".birthdate-display").forEach((el) => {
        const rawDate = el.getAttribute("data-date");
        if (rawDate) {
            el.textContent = formatDate(rawDate); // e.g. "September 20, 2001"
        } else {
            el.textContent = "Not provided";
        }
    });
});

// Just simply helps to automatically format dates in the modals
// Usage: Add class "birthdate-display" and data attribute "data-date" with raw date value
// Example: <span class="birthdate-display" data-date="2001-09-20"></span>
