$('input[type="radio"],input[type="checkbox"]').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    radioClass: 'iradio_minimal-blue',
    increaseArea: '20%' // optional
});

function format(state) {
    if (!state.id) return state.text; // optgroup
    return "<img class='flag' src='assets/img/countries_flags/" + state.id.toLowerCase() + ".png'/>&nbsp;&nbsp;" + state.text;
}

$("#sample4").select2({
    placeholder: "Select a Country",
    allowClear: true,
    formatResult: format,
    formatSelection: format,
    templateResult: format,
    escapeMarkup: function (m) {
        return m;
    }
});

$(function() {
    $( "#datepicker" ).datetimepicker({
        format: 'YYYY-MM-DD',
        keepOpen:false,
        useCurrent: false,
        maxDate: moment().add(1,'h').toDate()
    });
});
