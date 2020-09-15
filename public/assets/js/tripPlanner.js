
$(document).ready(function(){
    $('#datetimepicker1').datepicker({
        onSelect: function (dateText) {
            console.log(dateText);
            changeDate('start', dateText);
        }
    });
    $('#datetimepicker2').datepicker({
        minDate:0,
        dateFormat: 'dd-mm-yy',
        yearRange: "-100:+20",
            onSelect: function (dateText) {
                console.log(dateText);
                changeDate('end', dateText);
            }
        });
    $('#start-create-date-picker').datepicker({
        minDate:0,
        dateFormat: 'dd-mm-yy',
        yearRange: "-100:+20",

    });

    $('#end-date-picker').datepicker({
        minDate:0,
        dateFormat: 'dd-mm-yy',
        yearRange: "-100:+20",
        // dateFormat: 'yy-mm-dd',
        onSelect: function(dataText){
            var start_date = $('#start-date-picker').val();
            calculateNight(start_date, dataText);
        }
    });
});

function changeDate(parameter, parameter1){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = window.location.href.split('/');
    var last_element = id[id.length-1];
    axios.post('/change-date', {
        param: parameter1,
        route_id: last_element
       }).then(function(response){
        console.log(response.data);
    })
}
function calculateNight(start_date, parameter){
    var d1 = new Date(start_date.replace( /(\d{2})-(\d{2})-(\d{4})/, "$2/$1/$3"));
    var d2 = new Date(parameter.replace( /(\d{2})-(\d{2})-(\d{4})/, "$2/$1/$3"));
    var timeDiff = d2.getTime() - d1.getTime();
    var DaysDiff = timeDiff / (1000 * 3600 * 24);
    if(DaysDiff < 0){
        $('#no-of-nights').css('border-color', 'red');
        $('#no-of-nights').attr('placeholder', 'Select valid End date');
        document.getElementById("no-of-nights").value = '';
    }else {
        document.getElementById("no-of-nights").value = DaysDiff;
        $('#no-of-nights').css('border-color', '#ccd0d2');
    }
}
function validation(){
    if(document.getElementById('start-date-picker').value != ''){
        $('#start-date-picker').css('border', '1px solid #ccd0d2');
    }else{
        $('#start-date-picker').css('border', '1px solid red');
        $('#start-date-picker').attr('placeholder', 'Enter start date');
        return false;
    }
    if(document.getElementById('end-date-picker').value != ''){
        $('#end-date-picker').css('border', '1px solid #ccd0d2');
    }else{
        $('#end-date-picker').css('border', '1px solid red');
        $('#end-date-picker').attr('placeholder', 'Enter end date');
        return false;
    }
    if(document.getElementById('no-of-nights').value != ''){
        $('#no-of-nights').css('border', '1px solid #ccd0d2');
    }else{
        $('#no-of-nights').css('border', '1px solid red');
        $('#no-of-nights').attr('placeholder', 'Select a valid end date ');
        return false;
    }
}