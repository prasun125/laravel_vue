@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Edit Blog
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('admin/assets/vendors/summernote/css/summernote.css') }}" rel="stylesheet" media="screen" type="text/css" />
    <link href="{{ asset('admin/assets/vendors/select2/css/select2.min.css') }}" type="text/css" />
    <link href="{{ asset('admin/assets/vendors/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/css/custom_css/blog.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/vendors/iCheck/css/square/blue.css') }}" rel="stylesheet" type="text/css" />
@stop


{{-- Page content --}}
@section('content')
    <section class="content-header">
        <!--section starts-->
        <h1>Edit blog</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-fw fa-home"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="#">Blog</a>
            </li>
            <li class="active">Edit blog</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content paddingleft_right15">
        <!--main content-->
        <div class="row">
            <div class="the-box no-border">
                {!! Form::model($blog, array('url' => URL::to('admin/blog/' . $blog->id.'/edit'), 'method' => 'post', 'class' => 'bf', 'files'=> true)) !!}
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            {!! Form::text('title', null, array('class' => 'form-control input-lg', 'required' => 'required', 'placeholder'=>'Post title here...'))!!}
                        </div>
                        <div class='box-body pad'>
                            {!! Form::textarea('content', null, array('class' => 'textarea form-control','rows'=>'5','placeholder'=>'Place some text here', 'style'=>'style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"')) !!}
                        </div>
                    </div>
                    <!-- /.col-sm-8 -->
                    <div class="col-sm-4">
                        <div class="form-group">
                            {!! Form::label('blog_category_id', 'Post category') !!}
                            {!! Form::select('blog_category_id',$blogcategory ,null, array('class' => 'form-control select2', 'placeholder'=>'Select a category'))!!}
                        </div>
                        <div class="form-group">
                            {!! Form::text('tags', $blog->tagList, array('class' => 'form-control input-lg', 'data-role'=>"tagsinput", 'placeholder'=>'Tags...'))!!}
                        </div>
                        <div class="form-group">
                            <label>Featured image</label>
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <span class="btn btn-primary btn-file">
                                    <span class="fileupload-new">Select file</span>
                                    <span class="fileupload-exists">Change</span>
                                    {!! Form::file('image', null, array('class' => 'form-control')) !!}
                                </span>
                                @if(!empty($blog->image))
                                    <span class="fileupload-preview">
                                        <img src="{{URL::to('uploads/blog/'.$blog->image)}}" class="img-responsive" alt="Image">
                                    </span>
                                @endif
                                <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
                            </div>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input  name="featured" type="checkbox" class="square-blue" @if($blog->featured) checked="checked" value="1" @endif />
                                Featured
                            </label>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="{{ URL::to('admin/blog') }}" class="btn btn-danger">Discard</a>
                        </div>
                    </div>
                    <!-- /.col-sm-4 --> </div>
                <!-- /.row -->
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
    <script src="{{ asset('admin/assets/js/custom_js/add_newblog.js') }}" type="text/javascript"></script>
@stop
