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