$(document).ready(function() {
    $('table').bootstrapTable({locale: 'en-US'});

    var $table = $('#table3');
    $(function () {
        $('#toolbar').find('select').change(function () {
            $table.bootstrapTable('refreshOptions', {
                exportDataType: $(this).val()
            });
        });
        //toggle `popup` / `inline` mode
        $.fn.editable.defaults.mode = 'popup';

        var data = $('.status');

        //make status editable
        data.editable({
            type: 'select',
            title: 'Select status',
            sortable: true,
            value: '1',
            editable: true,
            source: [
                {value: 1, text: 'Approved'},
                {value: 2, text: 'Pending'},
                {value: 3, text: 'Suspended'},
                {value: 4, text: 'Blocked'}
            ]
        });

    });

});
