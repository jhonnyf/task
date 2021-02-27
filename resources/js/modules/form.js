import axios from "axios";

const Form = function () {

    const formAjax = function () {
        let element = $(this);
        let action = element.attr('action');

        element.find('button').attr('disabled', 'disabled').html('<i class="fas fa-spinner"></i>');    

        axios({
            url: action,
            data: element.serialize(),
            method: 'post',
            responseType: 'json'
        }).then(function (response) {
            response = response.data;

            element.prepend(response.message);

            responseAjax(response);

            setTimeout(() => {
                element.find('.alert').fadeOut(function(){
                    $(this).remove();                    
                });
            }, 2000);

            element.find('input').val('');
            element.find('button').removeAttr('disabled').html('ENVIAR');
        });

        return false;
    }

    const responseAjax = (response) => {
        console.log(response);

        if (response.result.method == 'redirect') {
            window.location = response.result.url;
        }

        if (response.result.method == 'append') {
            $( response.result.target ).append( response.result.html );
        }
    }

    return {
        init: function () {
            $(document).on('submit', '.form-ajax', formAjax);
        }
    };
}();

export { Form }