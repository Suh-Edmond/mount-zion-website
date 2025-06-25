document.getElementById("website-forms").onsubmit = function () {
    document.getElementById("loader").style.display = "flex";
};

const xhrOpen = XMLHttpRequest.prototype.open;
XMLHttpRequest.prototype.open = function () {
    this.addEventListener("loadstart", function () {
        document.getElementById("loader").style.display = "flex";
    });
    this.addEventListener("loadend", function () {
        document.getElementById("loader").style.display = "none";
    });
    xhrOpen.apply(this, arguments);
};


// Show loader on select input change
    document.querySelectorAll('.filter_select').forEach(select => {
        select.addEventListener('change', function() {
            document.getElementById('loader').style.display = 'flex';
        });
    });
