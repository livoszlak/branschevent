/**
 * Button listener
 */

window.addEventListener("scroll", function () {
    var button = document.getElementById("Anmalforetag");
    var scrollPosition =
        window.pageYOffset || document.documentElement.scrollTop;

    var threshold = 2000;

    if (scrollPosition > threshold) {
        button.style.position = "absolute";
        button.style = "bottom: 200";
    } else {
        button.style.position = "fixed";
    }
});
