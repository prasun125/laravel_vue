$('table').bootstrapTable();
function rowStyle(row, index) {
    var classes = ['active', 'success', 'info', 'warning', 'danger'];

    if (index % 2 === 0 && index / 2 < classes.length) {
        return {
            classes: classes[index / 2]
        };
    }
    return {};
}

var $table = $('#table1'),
    $button = $('#button'),
    $button2 = $('#button2');
$(function () {
    $button.click(function () {
        $table.bootstrapTable('showColumn', 'first_name');
    });
    $button2.click(function () {
        $table.bootstrapTable('hideColumn', 'first_name');
    });
});

var $div = $('.div-table'),
    $table3 = $('#table3'),
    $button3_1 = $('#button3_1'),
    $button3_2 = $('#button3_2');
$(function () {
    $button3_1.click(function () {
        $div.width($div.width() + 50);
        $table3.bootstrapTable('resetView');
    });
    $button3_2.click(function () {
        $div.width($div.width() - 50);
        $table3.bootstrapTable('resetView');
    });
});
function nameFormatter(value, row) {
    var icon = row.id % 2 === 0 ? 'glyphicon-star' : 'glyphicon-star-empty'
    return '<i class="glyphicon ' + icon + '"></i> ' + value;
}
function priceFormatter(value) {
    // 16777215 == ffffff in decimal
    var color = '#'+Math.floor(Math.random() * 6777215).toString(16);
    return '<div  style="color: ' + color + '">' +
        '<i class="glyphicon glyphicon-usd"></i>' +
        value.substring(1) +
        '</div>';
}
// $("document").ready(function(){
//     var z=[];
//     var x=$(".status_sort");
//     $(".sortable").on("click",function(){
//         $(".status_sort").each(function(){
//             z.push($(this).text());
//         })
//         z.sort();
//         for(var i=0;i<z.length;i++){
//             $(".status_sort_text[i] span").text(z[i]);
//
//         }
//     })
// })
