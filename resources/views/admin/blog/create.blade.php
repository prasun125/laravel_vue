@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Add New Blog
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <link href="{{ asset('admin/assets/vendors/summernote/css/summernote.css') }}" rel="stylesheet" media="screen" type="text/css" />
    <link href="{{ asset('admin/assets/vendors/select2/css/select2.min.css') }}" type="text/css" />
    <link href="{{ asset('admin/assets/vendors/select2/css/select2-bootstrap.css') }}" type="text/css" />
    <link href="{{ asset('admin/assets/vendors/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/vendors/iCheck/css/square/blue.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/custom_css/blog.css') }}" rel="stylesheet" type="text/css" />

@stop


{{-- Page content --}}
@section('content')
    <section class="content-header">
        <!--section starts-->
        <h1>Add New Blog</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-fw fa-home"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#"> Blog</a>
            </li>
            <li class="active"> Add new blog</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content paddingleft_right15">
        <!--main content-->
        <div class="row">
            <div class="the-box no-border">

                {!! Form::open(array('url' => URL::to('admin/blog/create'), 'method' => 'post', 'class' => 'bf', 'files'=> true,'id'=>'create_blog_form')) !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group {{ $errors->first('title', 'has-error') }}">
                            {!! Form::text('title', null, array('class' => 'form-control input-lg', 'placeholder'=>'Post title here...'))!!}
                            {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class='box-body pad form-group {{ $errors->first('content', 'has-error') }}'>
                            {!! Form::textarea('content', null, array('class' => 'textarea form-control', 'rows'=>'5', 'placeholder'=>'Place some text here', 'style'=>'style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"')) !!}
                            {!! $errors->first('content', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <!-- /.col-sm-8 -->
                    <div class="col-sm-4">
                        <div class="form-group {{ $errors->first('blog_category_id', 'has-error') }}">
                            {!! Form::label('blog_category_id', 'Blog category') !!}
                            {!! Form::select('blog_category_id',$blogcategory ,null, array('class' => 'form-control select2', 'placeholder'=>'Select a Category'))!!}
                            {!! $errors->first('blog_category_id', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="form-group {{ $errors->first('tags', 'has-error') }}">
                            {!! Form::text('tags', null, array('class' => 'form-control input-lg', 'data-role'=>"tagsinput", 'placeholder'=>'Tags...')) !!}
                            {!! $errors->first('tags', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="form-group">
                            <label>Featured image</label>
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <span class="btn btn-primary btn-file">
                                    <span class="fileupload-new">Select file</span>
                                    <span class="fileupload-exists">Change</span>
                                    {!! Form::file('image', null, array('class' => 'form-control')) !!}
                                </span>
                                <span class="fileupload-preview"></span>
                                <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
                            </div>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="featured" class="square-blue" value="1"/> Featured Post
                            </label>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Publish</button>
                            <a href="{!! URL::to('admin/blog') !!}" class="btn btn-danger">Discard</a>
                        </div>
                    </div>
                    <!-- /.col-sm-4 --> </div>
                {!! Form::close() !!}
            </div>
        </div>
        <!--main content ends-->
    </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script src="{{ asset('admin/assets/vendors/summernote/js/summernote.min.js') }}" type="text/javascript" ></script>
    <script src="{{ asset('admin/assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/vendors/iCheck/js/icheck.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/vendors/bootstrap-tagsinput/js/bootstrap-tagsinput.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/js/custom_js/add_newblog.js') }}" type="text/javascript"></script>
@stop
