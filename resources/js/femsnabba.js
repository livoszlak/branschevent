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

    function submitAnswers() {
        // Gather answers from the form
        var formData = new FormData();
        var answers = {};

        questionPopups.forEach(function(popup, index) {
            var questionId = popup.querySelector('.question').dataset.questionId;
            var selectedOption = popup.querySelector('input[type="radio"]:checked');
            if (selectedOption) {
                answers[questionId] = selectedOption.value;
            }
        });

        formData.append('answers', JSON.stringify(answers));

        // Send AJAX request to submit answers
        fetch('/submit-answers', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (response.ok) {
                // Handle successful response
                console.log('Answers submitted successfully');
                // Redirect or display a success message
            } else {
                // Handle error response
                console.error('Failed to submit answers');
            }
        })
        .catch(error => {
            console.error('Error submitting answers:', error);
        });
    }

    // Show the first question popup initially
    showQuestion(currentQuestionIndex);

    // Event listener for the "Next Question" button
    document.querySelectorAll('.next-question').forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            currentQuestionIndex++;
            if (currentQuestionIndex < questionPopups.length) {
                showQuestion(currentQuestionIndex);
            } else {
                // Show the submit button when all questions have been answered
                document.getElementById('submit-button').style.display = 'block';
            }
        });
    });

    // Event listener for the "Submit Answers" button
    document.getElementById('submit-button').addEventListener('click', function(event) {
        event.preventDefault();
        submitAnswers();
    });
});
