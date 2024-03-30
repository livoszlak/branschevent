document.addEventListener('DOMContentLoaded', function () {
    const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
    if (!csrfTokenMeta) {
        console.error('CSRF token meta tag not found');
        return;
    }

    const csrfToken = csrfTokenMeta.getAttribute('content');

    const tagLinks = document.querySelectorAll('.tag-toggle');

    tagLinks.forEach(function (tagLink) {
        tagLink.addEventListener('click', function (event) {
            event.preventDefault();

            const tagId = this.getAttribute('data-tag-id');

            fetch(`/tag/${tagId}/toggle`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                // Handle response
                if (data.success) {
                    // Toggle tag appearance or update UI as needed
                    this.classList.toggle('tag-picked');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });
});
