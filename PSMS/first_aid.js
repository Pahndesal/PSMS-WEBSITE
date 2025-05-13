document.getElementById('searchInput').addEventListener('keyup', function() {
    const searchValue = this.value.toLowerCase();
    const firstAidItems = document.querySelectorAll('.first-aid-item');

    firstAidItems.forEach(function(item) {
        const text = item.querySelector('p').textContent.toLowerCase();
        if (text.includes(searchValue)) {
            item.style.display = 'block'; // Show item
        } else {
            item.style.display = 'none'; // Hide item
        }
    });
});
document.addEventListener("DOMContentLoaded", function () {
    document.body.classList.add('fade-in');
});
