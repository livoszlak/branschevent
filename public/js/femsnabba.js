document.addEventListener('DOMContentLoaded', function() {
    var currentQuestionIndex = 0;
    var questionPopups = document.querySelectorAll('.popup-overlay');

    // Funktion för att visa frågor.
    function showQuestion(index) {
        questionPopups.forEach(function(popup, i) {
            if (i === index) {
                popup.style.display = 'block';
            } else {
                popup.style.display = 'none';
            }
        });
    }

    // Funktion för att submitta svar.
    function submitAnswers() {
        
        var chosenOptions = [];
    
        questionPopups.forEach(function(popup) {
            var questionId = popup.querySelector('.question').getAttribute('data-question-id');
            console.log(questionId);
            var selectedOption = popup.querySelector('input[type="radio"]:checked');
    
            if (selectedOption) {
                chosenOptions.push({
                    id: questionId,
                    chosen_option: selectedOption.value
                });
            }
        });
        // Send AJAX request to submit chosen options
        fetch('/submit-answers', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify({ 
                chosen_options: chosenOptions,
                _method: 'PUT'
             })
        })
        .then(response => {
            if (response.ok) {
                console.log('Chosen options updated successfully');
            } else {
                console.error('Failed to update chosen options');
            }
        })
        .catch(error => {
            console.error('Error updating chosen options:', error);
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
        currentQuestionIndex = 0;
    });

    // Event listener för "Nästa fråga"-knappen
    document.querySelectorAll('.next-question').forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            currentQuestionIndex++;
            if (currentQuestionIndex < questionPopups.length) {
                showQuestion(currentQuestionIndex);
            } else {
                document.getElementById('question-popup-' + (currentQuestionIndex - 1)).style.display = 'none';
                if (currentQuestionIndex === questionPopups.length) {
                    document.getElementById('popup-last-overlay').style.display = 'block';
                }
            }
        });
    });

    // Event listener för "Skicka svar"-knappen
    document.getElementById('submit-button').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('popup-last-overlay').style.display = 'none';
        submitAnswers();
        currentQuestionIndex = 0;
    });
});
