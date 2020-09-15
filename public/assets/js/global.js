$(document).ready(function(){
    $('#signup-link').click(function(){
        $('.login-close').trigger('click');
        $('#registration-link').trigger('click');
    });
    $('#login-modal-link').click(function(){
        $('#login-link').trigger('click');
        $('#register-form-close').trigger('click');
    });
    var min = 0;

    // $('#datetimepicker2').datepicker('setDate', $('#datetimepicker1').val());
    $('#start-create-date-picker').datepicker({
        minDate:0,
        dateFormat: 'dd-mm-yy',
        yearRange: "-100:+20",
        onSelect: function(selectedDate) {
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1; //January is 0!
            var yyyy = today.getFullYear();

            if(dd<10) {
                dd = '0'+dd
            }

            if(mm<10) {
                mm = '0'+mm
            }

            today = yyyy + '-' +mm + '-' + dd;
            var d1 = new Date(today);
            var d2 = new Date(selectedDate.replace( /(\d{2})-(\d{2})-(\d{4})/, "$2/$1/$3"));
            var timeDiff = d2.getTime() - d1.getTime();
            var DaysDiff = Math.floor(timeDiff / (1000 * 3600 * 24));
            min = DaysDiff;
            $('#end-create-date-picker').datepicker('option', 'minDate', min+2);
            console.log(DaysDiff);
        }
    });
    $('#end-create-date-picker').datepicker({
        // setDate: $('#datetimepicker1').val(),
        dateFormat: 'dd-mm-yy',
        yearRange: "-100:+20",
        onSelect: function(selectedDate){
            console.log(min);
        }
    });
});