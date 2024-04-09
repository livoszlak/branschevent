window.addEventListener('scroll', function() {
    var button = document.getElementById('Anmalforetag');
    var scrollPosition = window.pageYOffset || document.documentElement.scrollTop;

    var threshold = 0.5; 

    if (scrollPosition > threshold) {
        button.style.position = 'fixed';
    } else {
        button.style.position = 'absolute';
    }
});
