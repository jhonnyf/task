const Board = function () {

    const newColumn = function () {
        $('.form-new-column').slideDown();
    }

    return {
        init: function () {
            $(document).on('click', '.new-column', newColumn);
        }
    };
}();

export { Board }