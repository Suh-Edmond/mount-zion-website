document.addEventListener('DOMContentLoaded', function() {
    // Show loader on all link clicks
    document.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', function() {
            document.getElementById('app-loader').style.display = 'flex';
        });
    });

    // Show loader on all form submissions
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function() {
            document.getElementById('app-loader').style.display = 'flex';
        });
    });

    // Show loader on select input change
    document.querySelectorAll('.ajax_select_filter').forEach(select => {
        select.addEventListener('change', function() {
            document.getElementById('app-loader').style.display = 'flex';
        });
    });


    // Optional: Show loader for AJAX requests
    const xhrOpen = XMLHttpRequest.prototype.open;
    XMLHttpRequest.prototype.open = function() {
        this.addEventListener('loadstart', function() {
            document.getElementById('app-loader').style.display = 'flex';
        });
        this.addEventListener('loadend', function() {
            document.getElementById('app-loader').style.display = 'none';
        });
        xhrOpen.apply(this, arguments);
    };
});