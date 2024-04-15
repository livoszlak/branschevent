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
            var selectedOption = popup.querySelector('.answer.selected');

            if (selectedOption) {
                chosenOptions.push({
                    id: questionId,
                    chosen_option: selectedOption.getAttribute('data-option')
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

    document.querySelectorAll('.exit-button').forEach(function(exitButton) {
        exitButton.addEventListener('click', function(event) {
            event.preventDefault(); 
            // Göm popup
            var popup = exitButton.closest('.popup-overlay');
            popup.style.display = 'none';
            currentQuestionIndex = 0; // Reset currentQuestionIndex or update it according to your logic
        });
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

    // Event listener för att välja svar och gå till nästa fråga
    document.querySelectorAll('.answer').forEach(function(answer) {
        answer.addEventListener('click', function(event) {
            event.preventDefault();
            // Deselect previous selected answer if exists
            var previousSelected = document.querySelector('.answer.selected');
            if(previousSelected){
                previousSelected.classList.remove('selected');
            }
            // Select current answer
            answer.classList.add('selected');
            
            // Proceed to the next question
            var currentPopup = answer.closest('.popup-overlay');
            var currentQuestionIndex = Array.from(questionPopups).indexOf(currentPopup);
            if (currentQuestionIndex < questionPopups.length - 1) {
                showQuestion(currentQuestionIndex + 1);
            } else {
                document.getElementById('question-popup-' + (currentQuestionIndex)).style.display = 'none';
                document.getElementById('popup-last-overlay').style.display = 'block';
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
