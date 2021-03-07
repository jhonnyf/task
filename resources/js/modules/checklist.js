import axios from 'axios';

const Checklist = function () {

    const store = function () {
        let element = $(this);
        let card_id = element.closest('.card-detail').data('id');

        let url = window.location.origin + '/checklist/store/' + card_id;
        axios.post(url).then(function(response){
            if (response.status === 200) {
                $('.list-checklists').append(response.data.result.html);
            }
        });
    }
    
    const destroy = function () {
        let element = $(this);
        let checklist = element.closest('.checklist');
        let checklist_id = checklist.data('id');

        let url = window.location.origin + '/checklist/destroy/' + checklist_id;
        axios.post(url).then(function(response){
            if (response.status === 200) {
                checklist.fadeOut(function(){
                    $(this).remove();
                });
            }
        });
    }    

    const storeItem = function () {
        let element = $(this);
        let checklist_id = element.closest('.checklist').data('id');

        let url = window.location.origin + '/checklist-item/store/' + checklist_id;
        axios.post(url).then(function(response){
            if (response.status === 200) {
                $('.list-checklist-items').append(response.data.result.html);
            }
        });
    }   

    const destroyItem = function () {
        let element = $(this);
        let checklistItem = element.closest('.checklist-item');
        let checklistItem_id = checklistItem.data('id');

        let url = window.location.origin + '/checklist-item/destroy/' + checklistItem_id;
        axios.post(url).then(function(response){
            if (response.status === 200) {
                checklistItem.fadeOut(function(){
                    $(this).remove();
                });
            }
        });
    }

    return {
        init: function () {
            $(document).on('click', '.checklist-store', store);            
            $(document).on('click', '.checklist-destroy', destroy);

            $(document).on('click', '.checklist-item-store', storeItem);
            $(document).on('click', '.checklist-item-destroy', destroyItem);
        }
    };
}();

export { Checklist }