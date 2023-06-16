document.addEventListener("DOMContentLoaded", function () {
    var dropdowns = document.querySelectorAll(".dropdown");

    dropdowns.forEach(function (dropdown) {
        dropdown.addEventListener("mouseover", function () {
            this.querySelector("ul").style.display = "block";
        });

        dropdown.addEventListener("mouseout", function () {
            this.querySelector("ul").style.display = "none";
        });
    });
});

const hamburgerMenu = document.querySelector(".hamburger-menu");
const nav = document.querySelector("nav");

hamburgerMenu.addEventListener("click", function () {
    nav.classList.toggle("open");
});
