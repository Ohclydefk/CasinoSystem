// Format a date string into a readable format
function formatDate(
    dateStr,
    options = { year: "numeric", month: "long", day: "numeric" }
) {
    if (!dateStr) return "";
    const date = new Date(dateStr);
    if (isNaN(date)) return dateStr; // fallback if invalid
    return date.toLocaleDateString("en-US", options);
}

// Example: format phone numbers (optional, reuse later)
function formatPhone(phoneStr) {
    if (!phoneStr) return "";
    // simple formatting: +63 912 345 6789
    return phoneStr.replace(/(\d{4})(\d{3})(\d{4})/, "$1 $2 $3");
}

// Export globally (so Blade templates can call it directly)
window.formatDate = formatDate;
window.formatPhone = formatPhone;
