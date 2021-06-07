const Modal = function () {

    const loadModal = function () {
        let element = $(this);
        let url = element.data('modal');

        $.fancybox.open({
            src: url,
            type: 'ajax',
            opts: {
                clickOutside: false,
                clickSlide: false,
                touch: false,
            }
        });

    }


    return {
        init: function () {
            $(document).on('click', '[data-modal]', loadModal);
        }
    };
}();

export { Modal }