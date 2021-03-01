import axios from 'axios';

const Card = function () {

    const saveBlur = function () {
        let element = $(this);
        let name = element.attr('name');
        let value = element.val();
        let card_id = element.closest('.card-detail').data('id');

        let url = window.location.origin + '/cards/update/' + card_id;

        let data = { 'element': name, 'value': value }

        axios.post(url, data).then(function (response) {
            console.log(response);
        });
    }

    return {
        init: function () {
            $(document).on('blur', '.save-blur', saveBlur);
        }
    };
}();

export { Card }