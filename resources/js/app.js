require('./bootstrap');
window.$ = require('jquery');


$(document).ready(function () {
    $('.softdel').click(function (e) {
        return confirm('Datensatz wirklich Löschen?');
    });
});
