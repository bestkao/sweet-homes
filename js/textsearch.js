var form = $('.dropdown-menu').find('form');
form.click(function (e) {
    e.stopPropagation();
});