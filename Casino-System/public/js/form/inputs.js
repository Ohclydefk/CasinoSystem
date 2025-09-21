// Enable or disable the relationship input based on the is_exposed checkbox
document.addEventListener("DOMContentLoaded", function () {
    const exposedCheckbox = document.getElementById("is_exposed");
    const relationshipInput = document.getElementById("relationship");

    function toggleRelationship() {
        relationshipInput.disabled = !exposedCheckbox.checked;
        if (!exposedCheckbox.checked) {
            relationshipInput.value = "";
        }
    }

    exposedCheckbox.addEventListener("change", toggleRelationship);
    toggleRelationship();
});
