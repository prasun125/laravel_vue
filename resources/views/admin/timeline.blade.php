@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')TimeLine @parent

@stop
    {{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('admin/assets/vendors/vertical-timeline/css/style.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/custom_css/timeline.css') }}" type="text/css">
    @stop

{{-- Page content --}}
@section('content')
    <section class="content-header">
                <!--section starts-->
                <h1>TimeLine</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-fw fa-home"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">UI Components</a>
                    </li>
                    <li>
                        Timeline
                    </li>
                </ol>
            </section>
            <!--section ends-->

            <!--section ends-->
            <section id="cd-timeline" class="cd-container">
               <div class="cd-timeline-block">
                    <div class="cd-timeline-img cd-movie">
                         <img src=" {{ asset('admin/assets/img/flaticons/scenic-icons/E-Commerce/Ecommerce-12.png') }}" alt="Picture" width="60" height="60">
                        </div>
                    <div class="cd-timeline-content">
                        <h2>Title of section 1</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.
                        </p>
                        <a href="#" class="btn btn-md btn-success">Read more</a>
                        <span class="cd-date">Jan 14</span>
                    </div>
                    <!-- cd-timeline-content --> </div>
                <!-- cd-timeline-block -->

                <div class="cd-timeline-block">
                    <div class="cd-timeline-img cd-movie">
                        <img src=" {{ asset('admin/assets/img/flaticons/scenic-icons/DIsasters/Disasters-01.png') }}" alt="Picture" width="60" height="60">
                        </div>
                    <!-- cd-timeline-img -->

                    <div class="cd-timeline-content">
                        <h2>Title of section 2</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde?
                        </p>
                        <a href="#" class="btn btn-md btn-primary">Read more</a>
                        <span class="cd-date">Jan 18</span>
                    </div>
                    <!-- cd-timeline-content --> </div>
                <!-- cd-timeline-block -->

                <div class="cd-timeline-block">
                    <div class="cd-timeline-img cd-picture">
                       <img src=" {{ asset('admin/assets/img/flaticons/Christmas-15.png') }}" alt="Picture" width="60" height="60"></div>
                    <!-- cd-timeline-img -->

                    <div class="cd-timeline-content">
                        <h2>Title of section 3</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, obcaecati, quisquam id molestias eaque asperiores voluptatibus cupiditate error assumenda delectus odit similique earum voluptatem doloremque dolorem ipsam quae rerum quis. Odit, itaque, deserunt corporis vero ipsum nisi eius odio natus ullam provident pariatur temporibus quia eos repellat consequuntur perferendis enim amet quae quasi repudiandae sed quod veniam dolore possimus rem voluptatum eveniet eligendi quis fugiat aliquam sunt similique aut adipisci.
                        </p>
                        <a href="#" class="btn btn-md btn-danger">Read more</a>
                        <span class="cd-date">Jan 24</span>
                    </div>
                    <!-- cd-timeline-content --> </div>
                <!-- cd-timeline-block -->

                <div class="cd-timeline-block">
                    <div class="cd-timeline-img cd-location">
                       <img src=" {{ asset('admin/assets/img/flaticons/social-media-14.png') }}" alt="Picture" width="60" height="60"></div>
                    <!-- cd-timeline-img -->

                    <div class="cd-timeline-content">
                        <h2>Title of section 4</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.
                        </p>
                        <a href="#" class="btn btn-md btn-primary">Read more</a>
                        <span class="cd-date">Feb 14</span>
                    </div>
                    <!-- cd-timeline-content --> </div>
                <!-- cd-timeline-block -->

                <div class="cd-timeline-block">
                    <div class="cd-timeline-img cd-location">
                        <img src=" {{ asset('admin/assets/img/flaticons/social-media-11.png') }}" alt="Picture" width="60" height="60"></div>
                    <!-- cd-timeline-img -->

                    <div class="cd-timeline-content">
                        <h2>Title of section 5</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum.
                        </p>
                        <a href="#" class="btn btn-md btn-warning">Read more</a>
                        <span class="cd-date">Feb 18</span>
                    </div>
                    <!-- cd-timeline-content --> </div>
                <!-- cd-timeline-block -->

                <div class="cd-timeline-block">
                    <div class="cd-timeline-img cd-movie">
                       <img src=" {{ asset('admin/assets/img/flaticons/Graphic-Design-Tools-06.png') }}" alt="Picture" width="60" height="60"></div>
                    <!-- cd-timeline-img -->

                    <div class="cd-timeline-content">
                        <h2>Title of section 6</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum.</p>
                        <a href="#" class="btn btn-md btn-primary">Read more</a>
                        <span class="cd-date">Feb 26</span>
                    </div>
                    <!-- cd-timeline-content --> </div>

                <div class="cd-timeline-block">
                    <div class="cd-timeline-img cd-location">
                        <img src=" {{ asset('admin/assets/img/flaticons/Multimedia-20.png') }}" alt="Picture" width="60" height="60"></div>
                    <!-- cd-timeline-img -->

                    <div class="cd-timeline-content">
                        <h2>Title of section 7</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum.
                        </p>
                        <a href="#" class="btn btn-md btn-danger">Read more</a>
                        <span class="cd-date">Mar 18</span>
                    </div>
                    <!-- cd-timeline-content --> </div>
                <!-- cd-timeline-block -->

                <div class="cd-timeline-block">
                    <div class="cd-timeline-img cd-movie">
                       <img src=" {{ asset('admin/assets/img/flaticons/social-media-27.png') }}" alt="Picture" width="60" height="60"></div>
                    <!-- cd-timeline-img -->

                    <div class="cd-timeline-content">
                        <h2>Final Section</h2>
                        <p>This is the content of the last section</p>

                        <span class="cd-date">Mar 26</span>
                    </div>
                    <!-- cd-timeline-content --> </div>
                <!-- cd-timeline-block --> </section>
            <!-- cd-timeline -->
            
            <!-- /.content --> @stop
{{-- page level scripts --}}
@section('footer_scripts')
    <script src="{{ asset('admin/assets/vendors/vertical-timeline/js/main.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/vendors/vertical-timeline/js/modernizr.js') }}" type="text/javascript"></script>
@stop