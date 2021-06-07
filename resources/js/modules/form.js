import axios from "axios";
import { Board } from "./board";

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

        if (response.result.method == 'redirect') {
            setTimeout(() => {
                window.location = response.result.url;
            }, 2500);
        }

        if (response.result.method == 'append') {
            $( response.result.target ).append( response.result.html);
            if(response.result.target == ".columns .columns-board"){
                Board.init();
            }            
        }
    }

    return {
        init: function () {
            $(document).on('submit', '.form-ajax', formAjax);
        }
    };
}();

export { Form }