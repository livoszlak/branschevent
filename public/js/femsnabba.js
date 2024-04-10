document.addEventListener('DOMContentLoaded', function() {
    var currentQuestionIndex = 0;
    var questionPopups = document.querySelectorAll('.popup-overlay');

    function showQuestion(index) {
        questionPopups.forEach(function(popup, i) {
            if (i === index) {
                popup.style.display = 'block';
            } else {
                popup.style.display = 'none';
            }
        });
    }

    document.getElementById('show-popup-link').addEventListener('click', function(event) {
        event.preventDefault(); 

        // Visa popup
        document.getElementById('question-popup-' + currentQuestionIndex).style.display = 'flex';

        // Visa första frågan
        showQuestion(currentQuestionIndex);
    });

    document.getElementById('exit').addEventListener('click', function(event) {
        event.preventDefault(); 

        // Göm popup
        document.getElementById('question-popup-' + currentQuestionIndex).style.display = 'none';
    });

    // Event listener för "Nästa fråga"-knappen
    document.querySelectorAll('.next-question').forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            currentQuestionIndex++;
            if (currentQuestionIndex < questionPopups.length) {
                showQuestion(currentQuestionIndex);
            } else {
                // Visa "Skicka svar"-knappen när alla frågor har besvarats
                document.getElementById('submit-button').style.display = 'block';
            }
        });
    });

    // Event listener för "Skicka svar"-knappen
    document.getElementById('submit-button').addEventListener('click', function(event) {
        event.preventDefault();
        submitAnswers();
    });
});
