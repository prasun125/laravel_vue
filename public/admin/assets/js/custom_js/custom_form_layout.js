/**
 * Created by user on 22/7/16.
 */

$('input[type="checkbox"].custom_icheck, input[type="radio"].custom_radio').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    radioClass: 'iradio_minimal-blue',
    increaseArea: '20%'
});
$('.reset_btn1,.reset_btn2,.reset_btn3,.reset_btn4,.reset_btn5,.reset_btn6').click(function() {
    $('.custom_icheck').prop('defaultChecked') == false ? $('.custom_icheck').iCheck('uncheck') : $('.custom_icheck').iCheck('check');
    $('.custom_icheck').iCheck('update');
    $('.custom_radio').prop('defaultChecked') == false ? $('.custom_radio').iCheck('uncheck') : $('.custom_radio').iCheck('check');
    $('.custom_radio').iCheck('update');
});
