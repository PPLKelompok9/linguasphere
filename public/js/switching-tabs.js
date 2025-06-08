document.addEventListener("DOMContentLoaded", function () {
    const tabBtns = document.querySelectorAll(".tab-btn");
    const tabContents = document.querySelectorAll(".tab-content");

    tabBtns.forEach((btn) => {
        btn.addEventListener("click", function () {
            // Remove active class from all buttons
            tabBtns.forEach((b) => b.classList.remove("active"));
            // Hide all tab contents
            tabContents.forEach((tc) => tc.classList.add("hidden"));

            // Add active to clicked button
            btn.classList.add("active");
            // Show corresponding tab content
            const target = btn.getAttribute("data-target");
            document.getElementById(target).classList.remove("hidden");
        });
    });
});
