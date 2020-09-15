@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')Multiple File Upload @parent

@stop
    {{-- page level styles --}}
@section('header_styles')

    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/blueimp-gallery-with-desc/css/blueimp-gallery.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/blueimp-file-upload/css/jquery.fileupload.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/blueimp-file-upload/css/jquery.fileupload-ui.css') }}" />
    <link href="{{asset('admin/assets/vendors/iCheck/css/all.css')}}" rel="stylesheet">
    <!-- CSS adjustments for browsers with JavaScript disabled -->

    <noscript>
        <link rel="stylesheet" href="{{ asset('admin/assets/vendors/blueimp-file-upload/css/jquery.fileupload-noscript.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin/assets/vendors/blueimp-file-upload/css/jquery.fileupload-ui-noscript.css') }}" />
    </noscript>
<style>
    #blueimp-gallery{
        z-index:9999999;
    }
    @media (max-width:425px){
        .fileupload-buttonbar .toggle, .files .toggle, .files .btn span{
            display: inline-block;
        }
    }
</style>
    @stop

{{-- Page content --}}
@section('content')
    <section class="content-header">
                    <h1>Multiple File Upload</h1>

                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="fa fa-fw fa-home"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>Laravel Examples</li>
                        <li>
                            <a href="#">Multiple File Upload</a>
                        </li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- First Basic Table strats here-->
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw fa-eye"></i>
                                        Uplaod Multiple Files
                                    </h3>
                                </div>
                                <div class="panel-body" style="padding:30px;">
                                    <div class="row">

                                        <p>
                                            File Upload widget with multiple file selection, progress bars, validation and preview images for jQuery.
                                        </p>

                                        {!! Form::open(array('url' => URL::to('admin/file/createmulti'), 'method' => 'post', 'id'=>'fileupload', 'files'=> true)) !!}
                                                <!-- Redirect browsers with JavaScript disabled to the origin page -->
                                        <noscript>
                                            <input type="hidden" name="redirect" value="">
                                        </noscript>
                                            <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                            <div class="row fileupload-buttonbar">
                                                <div class="col-lg-7">
                                                    <!-- The fileinput-button span is used to style the file input field as button -->
                                                    <span class="btn btn-success fileinput-button">
                                                        <i class="icon ion-plus qwe" data-pack="default" data-tags="add, include, new, invite, +"></i>
                                                        <span>Add files</span>
                                                        <input type="file" name="file" multiple></span>
                                                    <button type="submit" class="btn btn-primary start">
                                                        <span>Start upload</span>
                                                    </button>
                                                    <button type="reset" class="btn btn-warning cancel">
                                                        <i class="icon ion-ios7-close qwe" data-pack="ios7" data-tags="delete, remove, trash, end, stop, x"></i>
                                                        <span>Cancel upload</span>
                                                    </button>
                                                    <button type="button" class="btn btn-danger delete">
                                                        <i class="icon ion-ios7-trash qwe" data-pack="ios7" data-tags="delete, remove, dispose, waste, basket, dump, kill"></i>
                                                        <span>Delete</span>
                                                    </button>
                                                    <input type="checkbox" class="toggle">
                                                    <!-- The global file processing state -->
                                                    <span class="fileupload-process"></span>
                                                </div>
                                                <!-- The global progress state -->
                                                <div class="col-lg-5 fileupload-progress fade">
                                                    <!-- The global progress bar -->
                                                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                                                    </div>
                                                    <!-- The extended global progress state -->
                                                    <div class="progress-extended">&nbsp;</div>
                                                </div>
                                            </div>
                                            <!-- The table listing the files available for upload/download -->
                                        <div class="table-responsive">
                                            <table role="presentation" class="table table-striped">
                                                <tbody class="files"></tbody>
                                            </table>
                                        </div>
                                            <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
                                                <div class="slides"></div>
                                                <h3 class="title"></h3>
                                                <a class="prev">‹</a>
                                                <a class="next">›</a>
                                                <a class="close">×</a>
                                                <a class="play-pause"></a>
                                                <ol class="indicator"></ol>
                                            </div>
                                        {!! Form::close()!!}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    </section>
                <!-- /.content --> @stop
{{-- page level scripts --}}
@section('footer_scripts')

        <script src="{{ asset('admin/assets/vendors/blueimp-file-upload/js/jquery.ui.widget.js') }}" type="text/javascript"></script>
        <!-- The Templates plugin is included to render the upload/download listings -->
        <script src="{{ asset('admin/assets/vendors/blueimp-tmpl/js/tmpl.min.js') }}" type="text/javascript"></script>
        <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
        <script src="{{ asset('admin/assets/vendors/blueimp-load-image/js/load-image.all.min.js') }}" type="text/javascript"></script>
        <!-- The Canvas to Blob plugin is included for image resizing functionality -->
        <script src="{{ asset('admin/assets/vendors/blueimp-canvas-to-blob/js/canvas-to-blob.min.js') }}" ></script>
        <!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
        <script src="{{ asset('admin/assets/vendors/blueimp-gallery-with-desc/js/jquery.blueimp-gallery.min.js') }}" ></script>
        <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
        <script src="{{ asset('admin/assets/vendors/blueimp-file-upload/js/jquery.iframe-transport.js') }}" ></script>
        <!-- The basic File Upload plugin -->
        <script src="{{ asset('admin/assets/vendors/blueimp-file-upload/js/jquery.fileupload.js') }}" type="text/javascript"></script>
        <!-- The File Upload processing plugin -->
        <script src="{{ asset('admin/assets/vendors/blueimp-file-upload/js/jquery.fileupload-process.js') }}" type="text/javascript"></script>
        <!-- The File Upload image preview & resize plugin -->
        <script src="{{ asset('admin/assets/vendors/blueimp-file-upload/js/jquery.fileupload-image.js') }}" type="text/javascript"></script>
        <!-- The File Upload audio preview plugin -->
        <script src="{{ asset('admin/assets/vendors/blueimp-file-upload/js/jquery.fileupload-audio.js') }}" ></script>
        <!-- The File Upload video preview plugin -->
        <script src="{{ asset('admin/assets/vendors/blueimp-file-upload/js/jquery.fileupload-video.js') }}" ></script>
        <!-- The File Upload validation plugin -->
        <script src="{{ asset('admin/assets/vendors/blueimp-file-upload/js/jquery.fileupload-validate.js') }}" ></script>
        <!-- The File Upload user interface plugin -->
        <script src="{{ asset('admin/assets/vendors/blueimp-file-upload/js/jquery.fileupload-ui.js') }}" type="text/javascript"></script>
        <script type="text/javascript" src="{{ asset('admin/assets/vendors/iCheck/js/icheck.js') }}"></script>


        <script id="template-upload" type="text/x-tmpl">
        {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class="template-upload fade">
            <td>
                <span class="preview"></span>
            </td>
            <td>
                <p class="name">{%=file.name%}</p>
                <strong class="error text-danger"></strong>
            </td>
            <td>
                <p class="size">Processing...</p>
                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                    <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                </div>
            </td>
            <td>
                {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start" disabled>
                    <i class="fa fa-fw fa-eye"></i>
                    <span>Start</span>
                </button>
                {% } %} {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="icon ion-ios7-close qwe" data-pack="ios7" data-tags="delete, remove, trash, end, stop, x"></i>
                    <span>Cancel</span>
                </button>
                {% } %}
            </td>
        </tr>
        {% } %}
    </script>
        <!-- The template to display files available for download -->
        <script id="template-download" type="text/x-tmpl">
        {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class="template-download fade">
            <td>
                <span class="preview">
                    {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery>
                        <img src="{%=file.thumbnailUrl%}"></a>
                    {% } %}
                </span>
            </td>
            <td>
                <p class="name">
                    {% if (file.url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl? 'data-gallery': ''%}>{%=file.name%}</a>
                    {% } else { %}
                    <span>{%=file.name%}</span>
                    {% } %}
                </p>
                {% if (file.error) { %}
                <div>
                    <span class="label label-danger">Error</span>{%=file.error%}</div>
                {% } %}
            </td>
            <td>
                <span class="size">{%=o.formatFileSize(file.size)%}</span>
            </td>
            <td>
                {% if (file.deleteUrl) { %}
                <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}" {% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}' {% } %}>
                    <i class="icon ion-ios7-trash qwe" data-pack="ios7" data-tags="delete, remove, dispose, waste, basket, dump, kill"></i>
                    <span>Delete</span>
                </button>
                <input type="checkbox" name="delete" value="1" class="toggle">{% } else { %}
                <button class="btn btn-warning cancel">
                    <i class="icon ion-ios7-close qwe" data-pack="ios7" data-tags="delete, remove, trash, end, stop, x"></i>
                    <span>Cancel</span>
                </button>
                {% } %}
            </td>
        </tr>
        {% } %}
    </script>

        <script>
            $( document ).ready(function() {
                $('#fileupload').fileupload({
                    url: '{{URL::to('admin/file/createmulti')}}',
                    dataType: 'json',
                    maxNumberOfFiles: 4
                });
            });

        </script>

        @stop