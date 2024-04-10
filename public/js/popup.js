document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('show-popup-link').addEventListener('click', function(event) {
        event.preventDefault(); 

        // Visa popup
        document.getElementById('question-popup').style.display = 'flex';

        // visa flrsta frågan.
        var firstQuestion = document.querySelector('.question');
        firstQuestion.style.display = 'block';
    });

    document.getElementById('exit').addEventListener('click', function(event) {
        event.preventDefault(); 

        // Visa popup
        document.getElementById('question-popup').style.display = 'none';
    });
});
