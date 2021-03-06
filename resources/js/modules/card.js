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

    const generateChecklist = function () {
        let element = $(this);
        let card_id = element.closest('.card-detail').data('id');

        let url = window.location.origin + '/cards/generate-checklist/' + card_id;

        axios.post(url).then(function(response){
            console.log(response);
        });
    }
    
    const generateChecklistItem = function () {
        let element = $(this);
        let checklist_id = element.closest('.checklist').data('id');

        let url = window.location.origin + '/cards/generate-checklist-item/' + checklist_id;

        axios.post(url).then(function(response){
            console.log(response);
        });
    }

    return {
        init: function () {
            $(document).on('blur', '.save-blur', saveBlur);
            $(document).on('click', '.generate-checklist', generateChecklist);
            $(document).on('click', '.generate-checklist-item', generateChecklistItem);
        }
    };
}();

export { Card }