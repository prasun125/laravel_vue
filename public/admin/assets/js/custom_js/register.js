$(document).ready(function() {
       
        //Red color scheme for iCheck
        $('input').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
    $("#dee1").click(function() {

        $("input").iCheck('uncheck');
    });

$("#dob").datetimepicker({
    format: 'YYYY-MM-DD',
    widgetPositioning:{
        vertical:'bottom'
    },
    keepOpen:false,
    useCurrent: false,
    maxDate: moment().add(1,'h').toDate()
}).on('dp.change dp.show', function(e) {
    // Revalidate the date when user change it
    $('#register_form').bootstrapValidator('revalidateField', 'dob');
});

$('#dob').keydown(function() {
    return false;
});
$(function() {
        var opts = $("#source").html(),
            opts2 = "<option></option>" + opts;
        $("select.populate").each(function() {
            var e = $(this);
            e.html(e.hasClass("placeholder") ? opts2 : opts);
        });
        $(".examples article:odd").addClass("zebra");
    });

    $("#select2_sample4").select2({
        placeholder: "Select a Country",
        allowClear: true

    });


    $('#register_form').bootstrapValidator({
        excluded: [':disabled'],
        fields: {
            first_name: {
                validators: {
                    notEmpty: {
                        message: 'The first name is required and cannot be empty'
                    }
                }
            },
            last_name: {
                validators: {
                    notEmpty: {
                        message: 'The last name is required and cannot be empty'
                    }
                }
            },
            password: {
                validators: {

                    notEmpty: {
                        message: 'Please provide a password'
                    }
                }
            },
            password_confirm: {
                validators: {
                    notEmpty: {
                        message: 'The confirm password is required and cannot be empty'
                    },
                    identical: {
                        field: 'password',
                        message: 'Please enter the same password as above'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
            email_confirm: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
            phone: {
                validators: {
                    notEmpty: {
                        message: 'The phone number is required and cannot be empty'
                    },
                    integer: {
                        message: 'Enter only number'
                    }
                }
            },
            dob: {
                validators: {
                    notEmpty: {
                        message: 'The field can not be empty'
                    }
                }
            },
            address: {
                validators: {
                    notEmpty: {
                        message: 'The address is required and cannot be empty'
                    }
                }
            },
            zip: {
                validators: {
                    notEmpty: {
                        message: 'The zip code is required and cannot be empty'
                    }
                }
            }
        }
    });



$(".btn_reset").on("click",function(){

    $("#select2_sample4").val(null).trigger("change");

    $("#dob").data('DateTimePicker').date(null);
    $("#register_form").bootstrapValidator("resetForm",true);

});
});


