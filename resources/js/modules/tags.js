import axios from "axios";

const Tags = function () {

    const removeTag = function () {
        let element = $(this);
        let id = element.data('id');
        let card_id = element.data('card_id');

        let url = window.location.origin + '/cards/remove-tag/' + card_id + "/" + id;

        axios.post(url)
            .then(function (response) {
                let data = response.data;

                if (data.error === false) {
                    element.remove();
                }
            });
    }

    const saveTag = function () {
        let element = $(this);
        let card_id = element.data('card_id');
        let dropdownTag = element.closest('.dropdown-tags');

        let tag = dropdownTag.find('#tag-name').val();
        let color = dropdownTag.find('.color-custom').val();

        let url = window.location.origin + '/cards/add-tag/' + card_id;
        let data = { 'tag': tag, 'color': color };

        axios.post(url, data)
            .then(function (response) {
                let data = response.data;

                $(data.result.target).append(data.result.html);

                dropdownTag.find('#tag-name').val('');
                dropdownTag.find('input[name="tag-color"]').prop('checked', false);
            });
    }

    return {
        init: function () {
            $(document).on('click', '.save-tag', saveTag);
            $(document).on('click', '.card-detail .tag', removeTag);
        }
    };
}();

export { Tags }