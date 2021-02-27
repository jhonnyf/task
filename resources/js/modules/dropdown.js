

const Dropdown = function () {
    
    const toggle = function () {
        let element = $(this);
        let dropdown = element.closest('.dropdown');

        dropdown.find('.dropdown-content').slideToggle();
    }

    return {
        init: function () {
            $(document).on('click', '.dropdown-toggle', toggle);
        }
    };
}();

export { Dropdown }