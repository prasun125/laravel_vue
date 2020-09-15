 $(document).ready(function(){

 $('input[type="checkbox"]').iCheck({
            checkboxClass: 'icheckbox_minimal-green',
            radioClass: 'iradio_minimal-green'
        });


     var triggeredByChild = false;

     $('#check-all').on('ifChecked', function (event) {
         $('.checker input[type="checkbox"]').iCheck('check');
         triggeredByChild = false;
     });

     $('#check-all').on('ifUnchecked', function (event) {
         if (!triggeredByChild) {
             $('.checker input[type="checkbox"]').iCheck('uncheck');
         }
         triggeredByChild = false;
     });
// Removed the checked state from "All" if any checkbox is unchecked
     $('.checker input[type="checkbox"]').on('ifUnchecked', function (event) {
         triggeredByChild = true;
         $('#check-all').iCheck('uncheck');
     });

     $('.checker input[type="checkbox"]').on('ifChecked', function (event) {
         if ($('.checker input[type="checkbox"]').filter(':checked').length == $('.check').length) {
             $('#check-all').iCheck('check');
         }
     });

});