document.addEventListener("DOMContentLoaded", function () {
    var participantCount = document.getElementById("participant_count");
    var participants = document.getElementById("participants");
    var gdprBackground = document.getElementById("gdpr-background");    
    var gdprPopup = document.getElementById("gdprPopup");

    document.getElementById("minus").addEventListener("click", function () {
        if (parseInt(participantCount.defaultValue) > 1) {
            participantCount.defaultValue =
                parseInt(participantCount.defaultValue) - 1;
            participantCount.value = participantCount.defaultValue;
            participants.innerText = participantCount.defaultValue;
        }
    });

    document.getElementById("plus").addEventListener("click", function () {
        participantCount.defaultValue =
            parseInt(participantCount.defaultValue) + 1;
        participantCount.value = participantCount.defaultValue;
        participants.innerText = participantCount.defaultValue;
    });

    document.getElementById('show-gdpr').addEventListener('click', function(event) {
        event.preventDefault(); 
        gdprBackground.style.display = 'flex';
        // :(
        gdprPopup.classList.add('show');
    });
    
    document.getElementById('close-gdpr-popup').addEventListener('click', function(event) {
        event.preventDefault(); 
        gdprBackground.style.display = 'none';
        // jävla animations som inte funkar
        gdprPopup.classList.remove('show');
    });

    // funkar ej 
    document.getElementById('registrationForm').addEventListener('submit', function(event) {
        if (!document.getElementById('checkboxInput').checked) {
            event.preventDefault();
            alert('Var snäll och godkänn lagringen av personuppgifter för att kunna skapa ett konto');
        }
    });
});
