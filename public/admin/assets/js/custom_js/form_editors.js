"use strict";
$(document).ready(function () {
    $(".textarea").wysihtml5();
$(function() {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        // CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor

    });
   
    $(function() {
        //summernote JS
        $('.summernote11').summernote({
            height: 200,
            fontNames: ['Open Sans','Arial','Courier New'],

        });

    });
    // Bootstrap
    $('#bootstrap-editor').wysihtml5({
        stylesheets: [
            'vendors/bootstrap-wysihtml5/wysiwyg-color.css'
        ]
    });

});