$(document).ready(function () {
    $(function() {
        var dates = $(".datepicker").datetimepicker({
            format: 'MM/DD/YYYY',
            widgetPositioning:{
                vertical:'bottom'
            },
            keepOpen:false,
            useCurrent: false,
            minDate:new Date().setHours(0,0,0,0)
        });
        var date = new Date();
        date.setDate(date.getDate()-1);
        $('#datepicker').datetimepicker({
            startDate: date,
            format: 'MM/DD/YYYY',
        });


    });
    $('#task_deadline').keydown(function() {
        return false;
    });

    $('input[type="checkbox"].custom_icheck').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        increaseArea: '20%'
    });
    var deleteButton = " <a href='' class='tododelete redcolor'><span class='glyphicon glyphicon-trash'></span></a>";
    var striks = "<span id='striks'> |  </span>";
    var editButton = "<a href='' class='todoedit edit'><span class='glyphicon glyphicon-pencil'></span></a>";
    var checkBox = "<input type='checkbox' class='striked custom_icheck' />";
    var twoButtons = "<div class='col-md-4 col-sm-4 col-xs-5  pull-right showbtns todoitembtns'>" + editButton + striks + deleteButton + "</div>";
    var oneButton = "<div class='col-md-4 col-sm-4 col-xs-5  pull-right showbtns todoitembtns'>" + deleteButton + "</div>";
    $("form#main_input_box").submit(function (event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "task/create",
            data: $("form#main_input_box").serialize(),
            success: function (id) {
                var count = $('#taskcount').text();
                count = parseInt(count) + 1;
                $(".list_of_items").append("<div class='todolist_list showactions list1' id='" + id + "'>  " + "<div class='col-md-8 col-sm-8 col-xs-7 nopadmar custom_textbox1'> <div class='todoitemcheck'>" + checkBox + "</div>" + "<div class='todotext todoitemjs'>" + $("#task_description").val() + " </div> <span class='label label-default'>" + $("#task_deadline").val() + "</span></div>" + twoButtons);
                $('#taskcount').text(count);
                $("#task_description").val('');
                $("#task_deadline").val('');
                $(".datepicker").data('DateTimePicker').date(moment()).date(null);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.responseText);
            }
        });
        //tasks Count increase and decrease in left menu
        // $(".task_count").text(parseInt($('#taskcount').text())+1);
        //End tasks Count increase and decrease in left menu
    });


    $.ajax({
        type: "GET",
        url: "task/data",
        success: function (result) {
            $.each(result, function (i, item) {
                $('.list_of_items').append("<div class='todolist_list showactions list1' id='" + item.id + "'>   " +
                    "<div class='col-md-8 col-sm-8 col-xs-7 nopadmar custom_textbox1'> <div class='todoitemcheck'>" + "<input type='checkbox' class='striked ' autocomplete='off' " + ((item.finished == 1) ? "checked" : "") + "/>" +
                    "</div> <div class='todotext " + ((item.finished == 1) ? "strikethrough" : "") + " todoitemjs'>" + item.task_description + "</div> <span class='label label-default'>" +
                    item.task_deadline + "</span> </div>" + ((item.finished == 1) ? oneButton : twoButtons));
            });
            $('#taskcount').text(result.length);
                //tasks Count increase and decrease in left menu
            // $(".task_count").text(parseInt($('#taskcount').text()));
                //End tasks Count increase and decrease in left menu

        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.responseText);
        }
    });

});

$(document).on('click', '.tododelete', function (e) {
    e.preventDefault();
    var id = $(this).parent().parent().attr('id');
    var count = $('#taskcount').text();
    count = parseInt(count) - 1;
    $(this).closest('.todolist_list').hide("slow", function () {
        $(this).remove();
    });
    $('#taskcount').text(count);
    $.ajax({
        type: "POST",
        url: "task/" + id + "/delete",
        data: {_token: $('meta[name="_token"]').attr('content')},
        success: function (id) {

        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.responseText);
        }

    });
    //tasks Count increase and decrease in left menu
    // $(".task_count").text(parseInt($('#taskcount').text()));
    //End tasks Count increase and decrease in left menu
});
$(document).on('click', '.striked', function (e) {
    var id = $(this).closest('.todolist_list').attr('id');
    var hasClass = $(this).closest('.todolist_list').find('.todotext').hasClass('strikethrough');
    var hasEdit = $(this).closest('.todolist_list').find('.todoedit').hasClass('todoedit');
    var striks = "<span id='striks'> |  </span>";
    var editButton = "<a href='' class='todoedit'><span class='glyphicon glyphicon-pencil'></span></a>";

    $.ajax({
        type: "POST",
        url: "task/" + id + "/edit",
        data: {_token: $('meta[name="_token"]').attr('content'), 'finished': ((hasClass) ? 0 : 1)}
    });

    $(this).closest('.todolist_list').find('.todotext').toggleClass('strikethrough');
    if (!hasClass) {
        $(this).closest('.todolist_list').find('.todoedit').hide();
        $(this).closest('.todolist_list').find('#striks').hide();
    } else {
        $(this).closest('.todolist_list').find('.todoedit').show();
        $(this).closest('.todolist_list').find('#striks').show();
    }
    if (!hasEdit) {
        $(this).closest('.todolist_list').find('.tododelete').before(editButton + striks);
    }
});

$(document).on('click', '.todoedit .glyphicon-pencil', function (e) {
    e.preventDefault();
    if($(".todotext").hasClass("editing")){
        alert('already You are Editing!');
    }else{
        var text = '';
        text = $(this).closest('.todolist_list').find('.todotext').text();
        text = "<input type='text' name='text' value='" + text + "' onkeypress='return event.keyCode != 13;' />";

        $(this).closest('.todolist_list').find('.todotext').html(text);
        $(this).removeClass('glyphicon-pencil').addClass('glyphicon-saved');
        $(this).closest('.todolist_list').find('.todoitemcheck').hide();
        $(".label-default").css("margin-left","15px");
        $(this).closest('.todolist_list').find('.todotext').addClass("editing");
    }
});

$(document).on('click', '.todoedit .glyphicon-saved', function (e) {
    e.preventDefault();
    var text1 = $(this).closest('.todolist_list').find("input[type='text'][name='text']").val();

    if (text1 === '') {
        alert('Come on! you can\'t create a todo without title');
        $(this).closest('.todolist_list').find("input[type='text'][name='text']").focus();
        return;
    }
    $(this).closest('.todolist_list').find('.todoitemcheck').show();
    var id = $(this).closest('.todolist_list').attr('id');
    $.ajax({
        type: "POST",
        url: "task/" + id + "/edit",
        data: {_token: $('meta[name="_token"]').attr('content'), 'task_description': text1}
    });
    $(this).closest('.todolist_list').find('.todotext').html(text1);
    $(this).removeClass('glyphicon-saved').addClass('glyphicon-pencil');
    $(this).closest('.todolist_list').find('.todotext').removeClass("editing");
    $(".label-default").css("margin-left","0");
});
