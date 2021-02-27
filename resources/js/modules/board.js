import Sortable from 'sortablejs';

const Board = function () {

    const columnSortable = function() {        
        Sortable.create(document.getElementById('sortable-columns'));
    }

    return {
        init: function () {
            columnSortable();
        }
    };
}();

export { Board }