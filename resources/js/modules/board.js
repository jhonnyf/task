import axios from 'axios';
import Sortable from 'sortablejs';

const Board = function () {

    const columnSortable = function() {     
        if ($('#sortable-columns').length ==0) {
            return false;    
        }

        Sortable.create(document.getElementById('sortable-columns'),{
            onUpdate: function () {

                const columns = [];
                $('.column').each(function(index){
                    let element = $(this);                    

                    columns[index] = element.data('id')
                });

                let board_id = $('#sortable-columns').data('board_id');
                let url = window.location.origin + '/columns/sort/' + board_id;

                axios.post(url, {'sort': columns});
            }
        });
    }

    const cardSortable = function() {
        $('.column').each(function(){
            let element = $(this);
            let id = element.data('id');

            Sortable.create(document.getElementById('sortable-cards-' + id),{
                group: 'shared',
                animation: 150,
                onUpdate: function (el) {
                    let target = el.target.id;
                    sortCards(target);
                },
                onAdd: function (el) {
                    let target = el.target.id;
                    sortCards(target);
                }
            });
        });
    }

    const sortCards = function(target){
        const cards = [];
        $('#'+ target).find('.card').each(function(index){
            let element = $(this);                    

            cards[index] = element.data('id')
        });

        let column_id = $('#'+ target).data('column_id');
        let url = window.location.origin + '/cards/sort/' + column_id;

        axios.post(url, {'sort': cards});
    }

    const editColumn = function(){
        let element = $(this);
        let value = element.text();

        element.hide();
        element.after('<input type="text" autocomplete="off" name="column" class="form-control" id="edit-column" value="' + value + '">');
        document.getElementById('edit-column').select();
    }

    const saveColumn = function(){
        let element = $(this);
        let value = element.val();
        let column = element.closest('.column');

        column.find('h3').text(value).show();
        element.remove();

        let column_id = column.data('id');
        let url = window.location.origin + '/columns/update/' + column_id;

        axios.post(url, {'column': value});
    }

    return {
        init: function () {
            cardSortable();
            columnSortable();

            $(document).on('click', '.column h3', editColumn);
            $(document).on('blur', '#edit-column', saveColumn);
        }
    };
}();

export { Board }