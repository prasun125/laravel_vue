$("li.bg-primary").click(function(){
    $("#t-head,#t-total, #invoice").removeAttr('class');
    $("#invoice,#t-head, #t-total").addClass("bg-primary");
});
$("li.bg-success").click(function(){
    $("#t-head,#t-total, #invoice").removeAttr('class');
    $("#t-head,#t-total, #invoice").addClass("bg-success");
});
$("li.bg-warning").click(function(){
    $("#t-head,#t-total, #invoice").removeAttr('class');
    $("#t-head,#t-total, #invoice").addClass("bg-warning");
});
$("li.bg-danger").click(function(){
    $("#t-head,#t-total, #invoice").removeAttr('class').attr('class', '');
    $("#t-head,#t-total, #invoice").addClass("bg-danger");
});
$("li.bg-info").click(function(){
    $("#t-head,#t-total, #invoice").removeAttr('class').attr('class', '');
    $("#t-head,#t-total, #invoice").addClass("bg-info");
});

$("li.bg-default").click(function(){
    $("#t-head,#t-total, #invoice").removeAttr('class').attr('class', '');
    $("#t-head,#t-total, #invoice").addClass("bg-default");
});
