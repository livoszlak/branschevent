window.addEventListener("scroll", function () {
    var button = document.getElementById("Anmalforetag");
    var scrollPosition = window.pageYOffset || document.documentElement.scrollTop;
    var threshold = 0.5;
    var bodyHeight = document.body.clientHeight;
    var stopPercentage = 50; // You can set this percentage to any value you need
    var stopPosition = (bodyHeight * stopPercentage) / 100;

    console.log(scrollPosition);
    console.log(stopPosition);
    console.log(stopPosition);

    if (scrollPosition > threshold) {
        button.style.position = "fixed";
        button.style.top = 75 + "%";

        // Check if the scroll position is greater than or equal to the stop position
        if (scrollPosition >= stopPosition) {
            // If it is, set the button's position to absolute
            button.style.position = "absolute";
            button.style.top = stopPosition + "px";
        }
    } else {
        button.style.position = "absolute";
    }
});
