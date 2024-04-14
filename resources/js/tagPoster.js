document.addEventListener("DOMContentLoaded", function () {
    const tagLinks = document.querySelectorAll(".tag-toggle");
    let tagCount = document.querySelectorAll(".chosen-tag").length;

    tagLinks.forEach(function (tagLink) {
        tagLink.addEventListener("click", function (event) {
            if (tagCount >= 10 && !this.classList.contains("tag-picked")) {
                event.preventDefault();
                return;
            }

            const tagId = this.getAttribute("data-tag-id");

            fetch(`/tag/${tagId}/toggle`, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                    "Content-Type": "application/json",
                    Accept: "application/json",
                },
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        if (tagCount >= 10) {
                            return;
                        }
                        this.classList.toggle("tag-picked");
                        this.classList.contains("tag-picked")
                            ? tagCount++
                            : tagCount--;
                    }
                    console.log(tagCount);
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        });
    });
});
