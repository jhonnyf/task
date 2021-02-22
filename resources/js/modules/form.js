import axios from "axios";

const Form = function () {

    const formAjax = function () {
        let element = $(this);
        let action = element.attr('action');
        

        $.ajax({
            url: action,
            data: element.serializeArray(),
            type: 'POST',
            dataType: 'json'
        }).done(function (response) {
            
            console.log(response);

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