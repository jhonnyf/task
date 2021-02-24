import axios from "axios";

const Form = function () {

    const formAjax = function () {
        let element = $(this);
        let action = element.attr('action');

        axios({
            url: action,
            data: element.serialize(),
            method: 'post',
            responseType: 'json'
        }).then(function (response) {
            response = response.data;

            element.prepend(response.message);

            setTimeout(() => {
                element.find('.alert').fadeOut();
            }, 2000);
        });

        return false;
    }

    return {
        init: function () {
            $(document).on('submit', '.form-ajax', formAjax);
        }
    };
}();

export { Form }