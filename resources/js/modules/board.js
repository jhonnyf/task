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

    const cardSortable = function() {        

        $('.column').each(function(){
            let element = $(this);
            let id = element.data('id');

            Sortable.create(document.getElementById('sortable-cards-' + id),{
                group: 'shared',
                animation: 150
            });
        });
    }

    return {
        init: function () {
            cardSortable();
            columnSortable();
        }
    };
}();

export { Board }