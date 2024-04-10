/**
 * Image upload feedback function
 */
document
    .getElementById("profile_image")
    .addEventListener("change", function () {
        var fileName = this.value.split("\\").pop();

        if (fileName.length > 10) {
            var fileExt = fileName.split(".").pop();
            var fileNameEnding = fileName
                .substring(0, fileName.lastIndexOf("."))
                .slice(-3);
            var shortenedFileName = fileName.substring(0, 4);
            document.getElementById("upload-response").textContent =
                shortenedFileName + "..." + fileNameEnding + fileExt + " vald!";
        } else if (fileName.length == 0) {
            document.getElementById("upload-response").textContent =
                "Ladda upp logga";
        } else {
            document.getElementById("upload-response").textContent =
                fileName + " vald!";
        }
    });

/**
 * Tag poster function
 */
document.addEventListener("DOMContentLoaded", function () {
    const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
    if (!csrfTokenMeta) {
        console.error("CSRF token meta tag not found");
        return;
    }

    const csrfToken = csrfTokenMeta.getAttribute("content");

    const tagLinks = document.querySelectorAll(".tag-toggle");

    tagLinks.forEach(function (tagLink) {
        tagLink.addEventListener("click", function (event) {
            event.preventDefault();

            const tagId = this.getAttribute("data-tag-id");

            fetch(`/tag/${tagId}/toggle`, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                    "Content-Type": "application/json",
                    Accept: "application/json",
                },
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        this.classList.toggle("tag-picked");
                    }
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        });
    });

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
