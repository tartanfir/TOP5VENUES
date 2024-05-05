document.addEventListener('DOMContentLoaded', function() {
    fetch('getCategories.php')
        .then(response => response.json())
        .then(categories => {
            const categorySelect = document.getElementById('category');
            categories.forEach(category => {
                const option = document.createElement('option');
                option.value = category.category;
                option.textContent = category.prefix;
                categorySelect.appendChild(option);
            });
        });

    document.getElementById('reviewForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const category = document.getElementById('category').value;
        const venueName = document.getElementById('venueName').value;
        fetch('updateReviews.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ category, venueName })
        })
        .then(response => {
            if (response.ok) {
                alert('Review submitted successfully!');
                // Clear form inputs
                document.getElementById('category').selectedIndex = 0;
                document.getElementById('venueName').value = '';
            } else {
                alert('Failed to submit review. Please try again later.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again later.');
        });
    });
});
