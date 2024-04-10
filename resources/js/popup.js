document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('show-popup-link').addEventListener('click', function(event) {
        event.preventDefault(); 

        // Visa popup
        document.getElementById('question-popup').style.display = 'block';

        // visa flrsta frågan.
        var firstQuestion = document.querySelector('.question');
        firstQuestion.style.display = 'block';
    });
});
