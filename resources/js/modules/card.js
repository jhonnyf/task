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
        let additionalClass = '';

        element.addClass('edit-blur').hide();
        if (element.hasClass('checklist-item-text')) {
            additionalClass = 'form-control-sm';
        }

        element.after('<input type="text" autocomplete="off" name="content" id="edit-content" class="form-control ' + additionalClass + '" value="' + value.trim() + '">');

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

    const joinCard = function () {

        let element = $(this);

        let card_id = element.data('card_id');
        let user_id = element.data('user_id');

        let url = window.location.origin + '/cards/join-card/' + card_id;
        axios.post(url, { 'user_id': user_id })
            .then(function (response) {
                let data = response.data;

                if (data.error === false) {
                    $('.card-users').html(data.result.html);
                }
            });;
    }

    const exitCard = function () {

        let element = $(this);

        let url = element.data('url');
        let user_id = element.data('user_id');

        axios.post(url, { 'user_id': user_id })
            .then(function (response) {
                let data = response.data;

                if (data.error === false) {
                    element.addClass('remove');
                    setTimeout(() => {
                        element.remove();
                    }, 1000);
                }
            });
    }

    return {
        init: function () {
            $(document).on('blur', '.save-blur', saveBlur);
            $(document).on('click', '.focus-edit-content', editContent);
            $(document).on('blur', '#edit-content', saveColumn);

            $(document).on('click', '.act-join-card', joinCard);
            $(document).on('click', '.act-exit-card', exitCard);
            $(document).on('click', '.open-tags', function () {
                $('.dropdown-tags').slideToggle();
            })
        }
    };
}();

export { Card }