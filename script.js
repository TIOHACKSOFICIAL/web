
//////////////////////////////////////////////////////////////////////
document.addEventListener("DOMContentLoaded", function() {
    const registerButton = document.getElementById("hangar-submit");
    const loginButton = document.getElementById("loginButton");
    const form = document.querySelector(".hangar-form");
    const header = document.querySelector("header");

    header.addEventListener("click", function(e) {
        if (e.target.textContent === "SIGN IN") {
            form.style.display = "block";
        }
    });

    registerButton.addEventListener("click", function(e) {
        e.preventDefault();
        // Add your register button functionality here
        alert("Register button clicked!");
    });

    loginButton.addEventListener("click", function(e) {
        e.preventDefault();
        // Add your login button functionality here
        alert("Login button clicked!");
    });
});
