document.addEventListener('DOMContentLoaded', function () {
    const tagLinks = document.querySelectorAll('.tag-toggle');

    tagLinks.forEach(function (tagLink) {
        tagLink.addEventListener('click', function (event) {
            event.preventDefault();

            const tagId = this.getAttribute('data-tag-id');

            fetch(`/tag/${tagId}/toggle`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    this.classList.toggle('tag-picked');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });
});
