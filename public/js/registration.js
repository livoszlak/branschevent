document.addEventListener("DOMContentLoaded", function () {
    var participantCount = document.getElementById("participant_count");
    var participants = document.getElementById("participants");

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
});
