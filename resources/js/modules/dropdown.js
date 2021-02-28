const Dropdown = function () {

    const toggle = function () {
        let element = $(this);
        let dropdown = element.closest('.dropdown');

        dropdown.find('.dropdown-content').slideToggle();
    }

    const close = function () {
        console.log('close');
    }

    return {
        init: function () {
            $(document).on('click', '.dropdown-toggle', toggle);
            $(document).on('blur', '.dropdown-content', close);
        }
    };
}();

export { Dropdown }