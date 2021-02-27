import axios from 'axios';
import Sortable from 'sortablejs';

const Board = function () {

    const columnSortable = function() {        
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

    return {
        init: function () {
            columnSortable();
        }
    };
}();

export { Board }