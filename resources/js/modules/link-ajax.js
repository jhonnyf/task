import axios from "axios";

const LinkAjax = function () {
  
    const send = function () {
        let element = $(this);
        let href = element.attr('href');

        axios.post(href).then(function(response){
            responseAjax(response.data);
        });

        return false;
    }

    const responseAjax = (response) => {  

        if (response.result.method == 'redirect') {
            window.location = response.result.url;
        }

        if (response.result.method == 'append') {
            $( response.result.target ).append( response.result.html );
        }

        if (response.result.method == 'remove') {
            $( response.result.target ).slideToggle(function(){
                $(this).remove();
            });
        }
    }

    return {
        init: function () {
            $(document).on('click', '.link-ajax', send);
        }
    };
}();

export { LinkAjax }