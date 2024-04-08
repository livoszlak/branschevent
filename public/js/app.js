document.addEventListener("DOMContentLoaded", function () {
    var cards = document.querySelectorAll(".business-card");
    cards.forEach(function (card) {
        card.addEventListener("click", function () {
            window.location.href = this.getAttribute("data-href");
        });
    });

    var links = document.querySelectorAll(".inner-link");
    links.forEach(function (link) {
        link.addEventListener("click", function (event) {
            event.preventDefault();
            window.location.href = this.getAttribute("href");
        });
    });
});
