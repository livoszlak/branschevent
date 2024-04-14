window.addEventListener("scroll", function () {
    var button = document.getElementById("Anmalforetag");
    var scrollPosition = window.pageYOffset || document.documentElement.scrollTop;
    var threshold = 0.5;

    // Calculate the position of the stop div
    var stopDiv = document.getElementById("extraGap");
    var stopPosition = 1900;
    console.log(stopPosition);
    console.log(scrollPosition);

    if (scrollPosition > threshold) {
        button.style.position = "fixed";
        button.style.top = 75 + "%";

        // Check if the scroll position is greater than or equal to the stop position
        if (scrollPosition >= stopPosition) {
            // If it is, set the button's position to absolute
            button.style.position = "absolute";
            button.style.top = stopPosition + 800 + "px";
        }
    } else {
        button.style.position = "absolute";
    }
});
