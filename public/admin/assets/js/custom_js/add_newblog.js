$(document).ready(function() {
    $('.textarea').summernote({
        fontNames: ['Open Sans','Arial','Courier New'],
        height:300
    });

//iCheck for checkbox and radio inputs
$('input[type="checkbox"].square-blue').iCheck({
    checkboxClass: 'icheckbox_square-blue'
});
});