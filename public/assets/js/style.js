$(document).ready(function(){
    $(window).scroll(function() {
        var activateAtY = 20;
        if($(window).scrollTop() > activateAtY) {
            $('.custom-navbar').css('background-color','black');
        } else {
            $('.custom-navbar').css('background-color','transparent');
        }
    });

    var min = 0;

    // $('#datetimepicker2').datepicker('setDate', $('#datetimepicker1').val());
    $('#datetimepicker1').datepicker({
        minDate:0,
        dateFormat: 'dd-mm-yy',
        yearRange: "-100:+20",
        onSelect: function(selectedDate) {
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1; //January is 0!
            var yyyy = today.getFullYear();
            // console.log(today);

            if(dd<10) {
                dd = '0'+dd
            }

            if(mm<10) {
                mm = '0'+mm
            }

            today = yyyy + '-' +mm + '-' + dd;
            var d1 = new Date(today);
            var d2 = new Date(selectedDate.replace( /(\d{2})-(\d{2})-(\d{4})/, "$2/$1/$3"));
            // console.log(selectedDate);
            var timeDiff = d2.getTime() - d1.getTime();
            var DaysDiff = Math.floor(timeDiff / (1000 * 3600 * 24));
            min = DaysDiff;
            $('#datetimepicker2').datepicker('option', 'minDate', min+2);
            console.log(DaysDiff);
        }
    });
    $('#datetimepicker2').datepicker({
        // setDate: $('#datetimepicker1').val(),
        dateFormat: 'dd-mm-yy',
        yearRange: "-100:+20",
        onSelect: function(selectedDate){
            console.log(min);
        }
    });
    $('#bouncer').click(function(){
            $('html, body').animate({
                scrollTop: $("#features").offset().top-59
            }, 1500);
    });
    $('#pick_up_location').selectize({
        create: false,
        sortField: 'text'
    });







});

function validator(){
    if(document.getElementById('datetimepicker1').value != ''){
    }else{
        alert('Please select start date');
        return false;
    }
    if(document.getElementById('datetimepicker2').value != ''){

    }else{
        alert('Please select end date');
        return false;
    }

}