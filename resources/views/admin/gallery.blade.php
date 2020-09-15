@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')Gallery @parent

@stop
    {{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('admin/assets/vendors/fancybox/jquery.fancybox.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/vendors/fancybox/helpers/jquery.fancybox-buttons.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin/assets/css/custom_css/gallery.css') }}" rel="stylesheet" type="text/css"/>
    @stop

{{-- Page content --}}
@section('content')
    <section class="content-header">
                    <h1>Gallery</h1>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="fa fa-fw fa-home"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="#">Gallery</a>
                        </li>
                        <li>
                            Gallery
                        </li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="btn-group m-b-20 margl">
                                <span class="btn btn-primary mr10 mb10 filter active" data-filter="all">All</span>
                                <span class="btn btn-primary mr10 mb10 filter" data-filter=".category-1">Buildings</span>
                                <span class="btn btn-primary mr10 mb10 filter" data-filter=".category-2">Nature</span>
                                <span class="btn btn-primary mr10 mb10 filter" data-filter=".category-3">Tourist</span>
                            </div>
                            <div class="gallery">
                                <div class="row" id="gallery">
                                    <div class="mix category-1 col-lg-3 col-md-6 col-sm-6 col-xs-12" data-value="1">
                                        <div class="tmb">
                                            <div class="overlay">
                                                <div class="tmb-actions">
                                                    <a href="{{ asset('admin/assets/img/gallery/full/24.jpg') }}" class="fancybox-buttons btn btn-img" data-fancybox-group="button" title="Image">
                                                        <img src=" {{ asset('admin/assets/img/flaticons/Valentine_day-14.png') }}" alt="image" width="40" height="40"></a>
                                                    <a href="#" class="btn btn-img" data-fancybox-group="button" title="love this Image">
                                                        <img src=" {{ asset('admin/assets/img/flaticons/Valentine_day-09.png') }}" alt="image" width="40" height="40"></a>
                                                    <a href="#" class="btn btn-img" data-fancybox-group="button" title="Download This Image">
                                                        <img src=" {{ asset('admin/assets/img/flaticons/Arrows-11.png') }}" alt="image" width="40" height="40"></a>
                                                </div>
                                            </div>
                                            <img src="{{ asset('admin/assets/img/gallery/thumbs/24.jpg') }}" class="img-responsive" alt="Image" />
                                            <div class="tmb-meta">
                                                <h5>Image.jpg</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mix category-2 col-lg-3 col-md-6 col-sm-6 col-xs-12" data-value="2">
                                        <div class="tmb">
                                            <div class="overlay">
                                                <div class="tmb-actions">
                                                    <a href="{{ asset('admin/assets/img/gallery/full/30.jpg') }}" class="fancybox-buttons btn btn-img" data-fancybox-group="button" title="Image">
                                                        <img src=" {{ asset('admin/assets/img/flaticons/Valentine_day-14.png') }}" alt="image" width="40" height="40"></a>
                                                    <a href="#" class="btn btn-img" data-fancybox-group="button" title="love this Image">
                                                        <img src=" {{ asset('admin/assets/img/flaticons/Valentine_day-09.png') }}" alt="image" width="40" height="40"></a>
                                                    <a href="#" class="btn btn-img" data-fancybox-group="button" title="Download This Image">
                                                        <img src=" {{ asset('admin/assets/img/flaticons/Arrows-11.png') }}" alt="image" width="40" height="40"></a>
                                                </div>
                                            </div>
                                            <img src="{{ asset('admin/assets/img/gallery/thumbs/30.jpg') }}" class="img-responsive" alt="Image1" />
                                            <div class="tmb-meta">
                                                <h5>Image 1.jpg</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mix category-3 col-lg-3 col-md-6 col-sm-6 col-xs-12" data-value="3">
                                        <div class="tmb">
                                            <div class="overlay">
                                                <div class="tmb-actions">
                                                    <a href="{{ asset('admin/assets/img/gallery/full/5.jpg') }}" class="fancybox-buttons btn btn-img" data-fancybox-group="button" title="Transport 1">
                                                        <img src=" {{ asset('admin/assets/img/flaticons/Valentine_day-14.png') }}" alt="image" width="40" height="40"></a>
                                                    <a href="#" class="btn btn-img" data-fancybox-group="button" title="love this Image">
                                                        <img src=" {{ asset('admin/assets/img/flaticons/Valentine_day-09.png') }}" alt="image" width="40" height="40"></a>
                                                    <a href="#" class="btn btn-img" data-fancybox-group="button" title="Download This Image">
                                                        <img src=" {{ asset('admin/assets/img/flaticons/Arrows-11.png') }}" alt="image" width="40" height="40"></a>
                                                </div>
                                            </div>
                                            <img src="{{ asset('admin/assets/img/gallery/thumbs/5.jpg') }}" class="img-responsive" alt="Image" />
                                            <div class="tmb-meta">
                                                <h5>Image2.jpg</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mix category-2 col-lg-3 col-md-6 col-sm-6 col-xs-12" data-value="5">
                                        <div class="tmb">
                                            <div class="overlay">
                                                <div class="tmb-actions">
                                                    <a href="{{ asset('admin/assets/img/gallery/full/7.jpg') }}" class="fancybox-buttons btn btn-img" data-fancybox-group="button" title="Nature 2">
                                                        <img src=" {{ asset('admin/assets/img/flaticons/Valentine_day-14.png') }}" alt="image" width="40" height="40"></a>
                                                    <a href="#" class="btn btn-img" data-fancybox-group="button" title="love this Image">
                                                        <img src=" {{ asset('admin/assets/img/flaticons/Valentine_day-09.png') }}" alt="image" width="40" height="40"></a>
                                                    <a href="#" class="btn btn-img" data-fancybox-group="button" title="Download This Image">
                                                        <img src=" {{ asset('admin/assets/img/flaticons/Arrows-11.png') }}" alt="image" width="40" height="40"></a>
                                                </div>
                                            </div>
                                            <img src="{{ asset('admin/assets/img/gallery/thumbs/7.jpg') }}" class="img-responsive" alt="Image2" />
                                            <div class="tmb-meta">
                                                <h5>Image3.jpg</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mix category-1 col-lg-3 col-md-6 col-sm-6 col-xs-12" data-value="4">
                                        <div class="tmb">
                                            <div class="overlay">
                                                <div class="tmb-actions">
                                                    <a href="{{ asset('admin/assets/img/gallery/full/8.jpg') }}" class="fancybox-buttons btn btn-img" data-fancybox-group="button" title="Image">
                                                        <img src=" {{ asset('admin/assets/img/flaticons/Valentine_day-14.png') }}" alt="image" width="40" height="40"></a>
                                                    <a href="#" class="btn btn-img" data-fancybox-group="button" title="love this Image">
                                                        <img src=" {{ asset('admin/assets/img/flaticons/Valentine_day-09.png') }}" alt="image" width="40" height="40"></a>
                                                    <a href="#" class="btn btn-img" data-fancybox-group="button" title="Download This Image">
                                                        <img src=" {{ asset('admin/assets/img/flaticons/Arrows-11.png') }}" alt="image" width="40" height="40"></a>
                                                </div>
                                            </div>
                                            <img src="{{ asset('admin/assets/img/gallery/thumbs/8.jpg') }}" class="img-responsive" alt="Image1" />
                                            <div class="tmb-meta">
                                                <h5>Image4.jpg</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mix category-2 col-lg-3 col-md-6 col-sm-6 col-xs-12" data-value="8">
                                        <div class="tmb">
                                            <div class="overlay">
                                                <div class="tmb-actions">
                                                    <a href="{{ asset('admin/assets/img/gallery/full/13.jpg') }}" class="fancybox-buttons btn btn-img" data-fancybox-group="button" title="Nature 3">
                                                        <img src=" {{ asset('admin/assets/img/flaticons/Valentine_day-14.png') }}" alt="image" width="40" height="40"></a>
                                                    <a href="#" class="btn btn-img" data-fancybox-group="button" title="love this Image">
                                                        <img src=" {{ asset('admin/assets/img/flaticons/Valentine_day-09.png') }}" alt="image" width="40" height="40"></a>
                                                    <a href="#" class="btn btn-img" data-fancybox-group="button" title="Download This Image">
                                                        <img src=" {{ asset('admin/assets/img/flaticons/Arrows-11.png') }}" alt="image" width="40" height="40"></a>
                                                </div>
                                            </div>
                                            <img src="{{ asset('admin/assets/img/gallery/thumbs/13.jpg') }}" class="img-responsive" alt="Image3" />
                                            <div class="tmb-meta">
                                                <h5>Image5.jpg</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix visible-sm visible-md"></div>
                                    <div class="mix category-3 col-lg-3 col-md-6 col-sm-6 col-xs-12" data-value="6">
                                        <div class="tmb">
                                            <div class="overlay">
                                                <div class="tmb-actions">
                                                    <a href="{{ asset('admin/assets/img/gallery/full/17.jpg') }}" class="fancybox-buttons btn btn-img" data-fancybox-group="button" title="Transport 2">
                                                        <img src=" {{ asset('admin/assets/img/flaticons/Valentine_day-14.png') }}" alt="image" width="40" height="40"></a>
                                                    <a href="#" class="btn btn-img" data-fancybox-group="button" title="love this Image">
                                                        <img src=" {{ asset('admin/assets/img/flaticons/Valentine_day-09.png') }}" alt="image" width="40" height="40"></a>
                                                    <a href="#" class="btn btn-img" data-fancybox-group="button" title="Download This Image">
                                                        <img src=" {{ asset('admin/assets/img/flaticons/Arrows-11.png') }}" alt="image" width="40" height="40"></a>
                                                </div>
                                            </div>
                                            <img src="{{ asset('admin/assets/img/gallery/thumbs/17.jpg') }}" class="img-responsive" alt="transport2" />
                                            <div class="tmb-meta">
                                                <h5>Image6.jpg</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mix category-2 col-lg-3 col-md-6 col-sm-6 col-xs-12" data-value="10">
                                        <div class="tmb">
                                            <div class="overlay">
                                                <div class="tmb-actions">
                                                    <a href="{{ asset('admin/assets/img/gallery/full/18.jpg') }}" class="fancybox-buttons btn btn-img" data-fancybox-group="button" title="Nature 4">
                                                        <img src=" {{ asset('admin/assets/img/flaticons/Valentine_day-14.png') }}" alt="image" width="40" height="40"></a>
                                                    <a href="#" class="btn btn-img" data-fancybox-group="button" title="love this Image">
                                                        <img src=" {{ asset('admin/assets/img/flaticons/Valentine_day-09.png') }}" alt="image" width="40" height="40"></a>
                                                    <a href="#" class="btn btn-img" data-fancybox-group="button" title="Download This Image">
                                                        <img src=" {{ asset('admin/assets/img/flaticons/Arrows-11.png') }}" alt="image" width="40" height="40"></a>
                                                </div>
                                            </div>
                                            <img src="{{ asset('admin/assets/img/gallery/thumbs/18.jpg') }}" class="img-responsive" alt="nature4" />
                                            <div class="tmb-meta">
                                                <h5>Image7.jpg</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mix category-1 col-lg-3 col-md-6 col-sm-6 col-xs-12" data-value="7">
                                        <div class="tmb">
                                            <div class="overlay">
                                                <div class="tmb-actions">
                                                    <a href="{{ asset('admin/assets/img/gallery/full/29.jpg') }}" class="fancybox-buttons btn btn-img" data-fancybox-group="button" title="Animal 3">
                                                        <img src=" {{ asset('admin/assets/img/flaticons/Valentine_day-14.png') }}" alt="image" width="40" height="40"></a>
                                                    <a href="#" class="btn btn-img" data-fancybox-group="button" title="love this Image">
                                                        <img src=" {{ asset('admin/assets/img/flaticons/Valentine_day-09.png') }}" alt="image" width="40" height="40"></a>
                                                    <a href="#" class="btn btn-img" data-fancybox-group="button" title="Download This Image">
                                                        <img src=" {{ asset('admin/assets/img/flaticons/Arrows-11.png') }}" alt="image" width="40" height="40"></a>
                                                </div>
                                            </div>
                                            <img src="{{ asset('admin/assets/img/gallery/thumbs/29.jpg') }}" class="img-responsive" alt="animal3" />
                                            <div class="tmb-meta">
                                                <h5>Image8.jpg</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mix category-2 col-lg-3 col-md-6 col-sm-6 col-xs-12" data-value="12">
                                        <div class="tmb">
                                            <div class="overlay">
                                                <div class="tmb-actions">
                                                    <a href="{{ asset('admin/assets/img/gallery/full/31.jpg') }}" class="fancybox-buttons btn btn-img" data-fancybox-group="button" title="Nature 6">
                                                        <img src=" {{ asset('admin/assets/img/flaticons/Valentine_day-14.png') }}" alt="image" width="40" height="40"></a>
                                                    <a href="#" class="btn btn-img" data-fancybox-group="button" title="love this Image">
                                                        <img src=" {{ asset('admin/assets/img/flaticons/Valentine_day-09.png') }}" alt="image" width="40" height="40"></a>
                                                    <a href="#" class="btn btn-img" data-fancybox-group="button" title="Download This Image">
                                                        <img src=" {{ asset('admin/assets/img/flaticons/Arrows-11.png') }}" alt="image" width="40" height="40"></a>
                                                </div>
                                            </div>
                                            <img src="{{ asset('admin/assets/img/gallery/thumbs/31.jpg') }}" class="img-responsive" alt="nature6" />
                                            <div class="tmb-meta">
                                                <h5>Image9.jpg</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mix category-2 col-lg-3 col-md-6 col-sm-6 col-xs-12" data-value="11">
                                        <div class="tmb">
                                            <div class="overlay">
                                                <div class="tmb-actions">
                                                    <a href="{{ asset('admin/assets/img/gallery/full/28.jpg') }}" class="fancybox-buttons btn btn-img" data-fancybox-group="button" title="Nature 5">
                                                        <img src=" {{ asset('admin/assets/img/flaticons/Valentine_day-14.png') }}" alt="image" width="40" height="40"></a>
                                                    <a href="#" class="btn btn-img" data-fancybox-group="button" title="love this Image">
                                                        <img src=" {{ asset('admin/assets/img/flaticons/Valentine_day-09.png') }}" alt="image" width="40" height="40"></a>
                                                    <a href="#" class="btn btn-img" data-fancybox-group="button" title="Download This Image">
                                                        <img src=" {{ asset('admin/assets/img/flaticons/Arrows-11.png') }}" alt="image" width="40" height="40"></a>
                                                </div>
                                            </div>
                                            <img src="{{ asset('admin/assets/img/gallery/thumbs/28.jpg') }}" class="img-responsive" alt="nature5" />
                                            <div class="tmb-meta">
                                                <h5>Image10.jpg</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mix category-1 col-lg-3 col-md-6 col-sm-6 col-xs-12" data-value="9">
                                        <div class="tmb">
                                            <div class="overlay">
                                                <div class="tmb-actions">
                                                    <a href="{{ asset('admin/assets/img/gallery/full/6.jpg') }}" class="fancybox-buttons btn btn-img" data-fancybox-group="button" title="Animal 4">
                                                        <img src=" {{ asset('admin/assets/img/flaticons/Valentine_day-14.png') }}" alt="image" width="40" height="40"></a>
                                                    <a href="#" class="btn btn-img" data-fancybox-group="button" title="love this Image">
                                                        <img src=" {{ asset('admin/assets/img/flaticons/Valentine_day-09.png') }}" alt="image" width="40" height="40"></a>
                                                    <a href="#" class="btn btn-img" data-fancybox-group="button" title="Download This Image">
                                                        <img src=" {{ asset('admin/assets/img/flaticons/Arrows-11.png') }}" alt="image" width="40" height="40"></a>
                                                </div>
                                            </div>
                                            <img src="{{ asset('admin/assets/img/gallery/thumbs/6.jpg') }}" class="img-responsive" alt="animal4" />
                                            <div class="tmb-meta">
                                                <h5>Image11.jpg</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </section>
                <!-- /.content --> @stop
{{-- page level scripts --}}
@section('footer_scripts')
        <script src="{{ asset('admin/assets/vendors/mixitup/jquery.mixitup.js') }}" type="text/javascript" ></script>
        <script src="{{ asset('admin/assets/vendors/fancybox/jquery.fancybox.pack.js') }}" type="text/javascript" ></script>
        <script src="{{ asset('admin/assets/vendors/fancybox/helpers/jquery.fancybox-buttons.js') }}" type="text/javascript" ></script>
        <script src="{{ asset('admin/assets/js/custom_js/gallery.js') }}" type="text/javascript"></script>
        @stop