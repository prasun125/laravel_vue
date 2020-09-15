


$('table').bootstrapTable();
var $table = $('#mytable1'),
    $button = $('#button');

$(function () {
    $button.click(function () {
        var ids = $.map($table.bootstrapTable('getSelections'), function (row) {
            return row.state;
        });
        $table.bootstrapTable('remove', {
            field: 'state',
            values: ids
        });
    });
});
function detailFormatter(index, row) {
    var html = [];
    $.each(row, function (key, value) {
        html.push('<p><b>' + key + ':</b> ' + value + '</p>');
    });
    return html.join('');
}
