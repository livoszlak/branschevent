window.addEventListener("scroll", function () {
    var button = document.getElementById("Anmalforetag");
    var scrollPosition = window.pageYOffset || document.documentElement.scrollTop;
    var threshold = 0.5;

    var targetDiv = document.getElementById("mark");
    var targetDivPosition = targetDiv.getBoundingClientRect().top + scrollPosition;
    var viewportHeight = window.innerHeight;
    extra = (viewportHeight * 0.75);

    console.log(targetDivPosition);
    console.log(scrollPosition);

    if (scrollPosition > threshold) {
        button.style.position = "fixed";
        button.style.top = "75%";

        if (scrollPosition >= targetDivPosition - extra) {
            button.style.position = "absolute";
            button.style.top = targetDivPosition + "px";
        }
    } else {
        button.style.position = "absolute";
    }
});
