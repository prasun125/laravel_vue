// bootstrap wizard//
$("#gender, #gender1").select2({
    theme:"bootstrap",
    placeholder:"",
    width: '100%'
});
$("#commentForm").bootstrapValidator({
    fields: {
        namefield: {
            validators: {
                notEmpty: {
                    message: 'The user name is required'
                }
            },
            required: true,
            minlength: 3
        },
        passwordfield: {
            validators: {
                notEmpty: {
                    message: 'The password is required'
                },
                different: {
                    field: 'namefield',
                    message: 'The password cannot be the same as username'
                }
            }
        },
        confpasswordfield: {
            validators: {
                notEmpty: {
                    message: 'The confirm password is required'
                },
                identical: {
                    field: 'passwordfield'
                },
                different: {
                    field: 'namefield',
                    message: 'The password cannot be the same as username'
                }
            }
        },
        emailfield: {
            validators: {
                notEmpty: {
                    message: 'The email address is required'
                },
                emailAddress: {
                    message: 'The input is not a valid email address'
                }
            }
        },
        fnamefield: {
            validators: {
                notEmpty: {
                    message: 'The first name is required and cannot be empty'
                }
            }
        },
        lnamefield: {
            validators: {
                notEmpty: {
                    message: 'The last name is required and cannot be empty'
                }
            }
        },
        phone1field2: {
            validators: {
                notEmpty: {
                    message: 'The personal number is required'
                },
                regexp: {
                    regexp: /^(\+?1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/,
                    message: 'Enter valid phone number'
                }
            }
        },
        aleternateNumber: {
            validators: {
                notEmpty: {
                    message: 'The alternate number is required'
                },
                different: {
                    field: 'phone1field2',
                    message: 'The Alternate Number cannot be the same as personal number'
                },
                regexp: {
                    regexp: /^(\+?1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/,
                    message: 'Enter valid phone number'
                }
            }
        }
    }
});

$('#rootwizard').bootstrapWizard({
    'tabClass': 'nav nav-pills',
    'onNext': function(tab, navigation, index) {
        var $validator = $('#commentForm').data('bootstrapValidator').validate();
        return $validator.isValid();
    },
    onTabClick: function(tab, navigation, index) {
        return false;
    },
    onTabShow: function(tab, navigation, index) {
        var $total = navigation.find('li').length;
        var $current = index+1;
        var $percent = ($current/$total) * 100;

        // If it's the last tab then hide the last button and show the finish instead
        if($current >= $total) {
            $('#rootwizard').find('.pager .next').hide();
            $('#rootwizard').find('.pager .finish').show();
            $('#rootwizard').find('.pager .finish').removeClass('disabled');
        } else {
            $('#rootwizard').find('.pager .next').show();
            $('#rootwizard').find('.pager .finish').hide();
        }
        $('#rootwizard .finish').click(function() {
            var $validator = $('#commentForm').data('bootstrapValidator').validate();
            if ($validator.isValid()) {
                $('#myModal').modal('show');
                return $validator.isValid();
                $('#rootwizard').find("a[href='#tab1']").tab('show');
            }
        });

    }});
    $("#conf_password,#passwordfield").on("keyup",function(){
        console.log("g");
        //
        // $('#commentForm').bootstrapValidator('revalidateField', $('#passwordfield'));
        // $('#commentForm').bootstrapValidator('revalidateField', $('#conf_password'));
        password_verification();


    })
function password_verification(){
        var passWord=$("#passwordfield").val();
        var confPwd=$("#conf_password").val();
        if(passWord==confPwd){
            // $(".help-block").css("display","none");
            // $(".conf_pwd").removeClass("has-error").addClass("has-success");
        }

}




