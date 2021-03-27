import axios from 'axios';

const Card = function () {

    const saveBlur = function () {
        let element = $(this);
        let name = element.attr('name');
        let value = element.val();
        let card_id = element.closest('.card-detail').data('id');

        let url = window.location.origin + '/cards/update/' + card_id;

        let data = { 'element': name, 'value': value }

        axios.post(url, data);
    }

    const editContent = function () {
        let element = $(this);
        let value = element.text();

        element.addClass('edit-blur').hide();
        element.after('<input type="text" autocomplete="off" name="content" id="edit-content" class="input mt-default" value="' + value + '">');

        document.getElementById('edit-content').select();
    }

    const saveColumn = function () {
        let element = $(this);
        let value = element.val();

        let elementBlur = $('.edit-blur');
        let type = elementBlur.data('type');

        elementBlur.text(value).show().removeClass('edit-blur');

        if (type == 'card') {
            let card = elementBlur.closest('.card-detail');
            let card_id = card.data('id');

            let url = window.location.origin + '/cards/update/' + card_id;
            axios.post(url, { 'element': elementBlur.data('element'), 'value': value });
        }

        if (type == 'checklist') {
            let checklist = elementBlur.closest('.checklist');
            let checklist_id = checklist.data('id');

            let url = window.location.origin + '/checklist/update/' + checklist_id;
            axios.post(url, { 'element': elementBlur.data('element'), 'value': value });
        }

        if (type == 'checklist-item') {
            let checklistItem = elementBlur.closest('.checklist-item');
            let checklistItem_id = checklistItem.data('id');

            let url = window.location.origin + '/checklist-item/update/' + checklistItem_id;
            axios.post(url, { 'element': elementBlur.data('element'), 'value': value });
        }

        element.remove();
    }

    const addTag = function () {
        let element = $(this);
        let card_id = element.data('card_id');

        let tag = element.data('tag');
        let color = element.data('color');
        
        let url = window.location.origin + '/cards/add-tag/' + card_id;
        let data = { 'tag': tag, 'color': color }

        axios.post(url, data);
    }

    return {
        init: function () {
            $(document).on('blur', '.save-blur', saveBlur);
            $(document).on('click', '.focus-edit-content', editContent);
            $(document).on('blur', '#edit-content', saveColumn);
            $(document).on('click', '.btn-add-tag', addTag);
        }
    };
}();

export { Card }