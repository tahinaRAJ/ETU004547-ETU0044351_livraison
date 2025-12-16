document.addEventListener('DOMContentLoaded', () => {
    const rows = document.querySelectorAll('tbody tr');
    rows.forEach((row) => {
        row.addEventListener('click', () => {
            const link = row.querySelector('a');
            if (link && link.getAttribute('href')) {
                window.location.href = link.getAttribute('href');
            }
        });
    });

    const dateInput = document.querySelector('[data-filter-date]');
    const form = document.querySelector('[data-filter-form]');
    if (form && dateInput) {
        form.addEventListener('submit', (e) => {
            if (!dateInput.value) return;
            // allow standard submit; could add validation here
        });
    }
});
