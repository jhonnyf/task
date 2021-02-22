import axios from "axios";

const Modal = function () {
    const loadModal = function () {
        let element = $(this);
        let url = element.data('modal');
        let type = 'GET';

        axios({
            url: url,
            method: type,
            responseType: 'json'
        }).then(function (response) {
            response = response.data;

            $('.container-modal').remove();

            if (response.error) {
                alert(response.message);
            } else {
                $('body').addClass('no-scroll');
                $('body').prepend(response.result.html);

                $('.container-modal').fadeIn(function () {
                    $(this).addClass('d-flex');
                    $('.modal').fadeIn();
                });
            }
        });
    }

    const closeModal = function () {
        let element = $(this);
        let modal = element.closest('.modal');

        modal.fadeOut(function () {
            $(this).closest('.container-modal').fadeOut(function () {
                $(this).remove();
                $('body').removeClass('no-scroll');
            });
        });
    }

    return {
        init: function () {
            $(document).on('click', '[data-modal]', loadModal);
            $(document).on('click', '.modal-close', closeModal);
        }
    };
}();

export { Modal }