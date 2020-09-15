@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')Transtions @parent

@stop
    {{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('admin/assets/vendors/animate/animate.min.css') }}" rel="stylesheet" type="text/css" />
     <link href="{{ asset('admin/assets/css/custom_css/transitions.css') }}" rel="stylesheet" type="text/css"/>
    @stop

{{-- Page content --}}
@section('content')
    <section class="content-header">
                    <!--section starts-->
                    <h1>Transtions</h1>
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
                            Transtions
                        </li>
                    </ol>
                </section>
                <!--section ends-->
                <section class="content">
                    <!--main content-->
                    <div class="row animated fadeInDown">
                        <!--row starts-->
                        <div class="col-md-12">
                            <!--md starts-->
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw fa-bell-o"></i>
                                        Transition Effects
                                    </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-6">
                                        <div class="panel-body text-center">
                                            <!--content starts-->
                                            <div class="wrap">
                                                <span id="animationSandbox1" style="display: block;" class="">
                                                    <span class="success_title mega">CHANDRA</span>
                                                </span>
                                            </div>
                                            <div class="wrap">
                                                <p>
                                                    <select id="s1" class="js--animations form-control" onchange="testAnim(this.value,1);">
                                                        <optgroup label="Attention Seekers">
                                                            <option value="bounce">Bounce</option>
                                                            <option value="flash">Flash</option>
                                                            <option value="pulse">Pulse</option>
                                                            <option value="rubberBand">RubberBand</option>
                                                            <option value="shake">Shake</option>
                                                            <option value="swing">Swing</option>
                                                            <option value="tada">Tada</option>
                                                            <option value="wobble">Wobble</option>
                                                        </optgroup>
                                                    </select>
                                                    <button class="butt success js--triggerAnimation" onclick="testAnim1(1);">Animate it</button>
                                                </p>
                                            </div>
                                            <!--content ends--> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="panel-body text-center">
                                            <!--content starts-->
                                            <div class="wrap">
                                                <span id="animationSandbox5" style="display: block;" class="">
                                                    <span class="danger_title title mega">CHANDRA</span>
                                                </span>
                                            </div>
                                            <div class="wrap">
                                                <p>
                                                    <select id="s5" class=" js--animations form-control" onchange="testAnim(this.value,5);">

                                                        <optgroup label="Fading Exits">
                                                            <option value="fadeOut">FadeOut</option>
                                                            <option value="fadeOutDown">FadeOutDown</option>
                                                            <option value="fadeOutDownBig">FadeOutDownBig</option>
                                                            <option value="fadeOutLeft">FadeOutLeft</option>
                                                            <option value="fadeOutLeftBig">FadeOutLeftBig</option>
                                                            <option value="fadeOutRight">FadeOutRight</option>
                                                            <option value="fadeOutRightBig">FadeOutRightBig</option>
                                                            <option value="fadeOutUp">FadeOutUp</option>
                                                            <option value="fadeOutUpBig">FadeOutUpBig</option>
                                                        </optgroup>

                                                    </select>
                                                    <button class="butt danger js--triggerAnimation" onclick="testAnim1(5);">Animate it</button>
                                                </p>

                                            </div>
                                            <!--content ends--> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="panel-body text-center">
                                            <!--content starts-->
                                            <div class="wrap">
                                                <span id="animationSandbox3" style="display: block;" class="">
                                                    <span class="warning_title mega">CHANDRA</span>
                                                </span>
                                            </div>
                                            <div class="wrap">
                                                <p>
                                                    <select id="s3" class="js--animations form-control" onchange="testAnim(this.value,3);">
                                                        <optgroup label="Bouncing Exits">
                                                            <option value="bounceOut">BounceOut</option>
                                                            <option value="bounceOutDown">BounceOutDown</option>
                                                            <option value="bounceOutLeft">BounceOutLeft</option>
                                                            <option value="bounceOutRight">BounceOutRight</option>
                                                            <option value="bounceOutUp">BounceOutUp</option>
                                                        </optgroup>
                                                    </select>
                                                    <button class="butt warning js--triggerAnimation" onclick="testAnim1(3);">Animate it</button>
                                                </p>

                                            </div>
                                            <!--content ends--> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="panel-body text-center">
                                            <!--content starts-->
                                            <div class="wrap">
                                                <span id="animationSandbox4" style="display: block;" class="">
                                                    <span class="info_title mega">CHANDRA</span>
                                                </span>
                                            </div>
                                            <div class="wrap">
                                                <p>
                                                    <select id="s4" class="js--animations form-control" onchange="testAnim(this.value,4);">

                                                        <optgroup label="Fading Entrances">
                                                            <option value="fadeIn">FadeIn</option>
                                                            <option value="fadeInDown">FadeInDown</option>
                                                            <option value="fadeInDownBig">FadeInDownBig</option>
                                                            <option value="fadeInLeft">FadeInLeft</option>
                                                            <option value="fadeInLeftBig">FadeInLeftBig</option>
                                                            <option value="fadeInRight">FadeInRight</option>
                                                            <option value="fadeInRightBig">FadeInRightBig</option>
                                                            <option value="fadeInUp">FadeInUp</option>
                                                            <option value="fadeInUpBig">FadeInUpBig</option>
                                                        </optgroup>

                                                    </select>
                                                    <button class="butt info js--triggerAnimation" onclick="testAnim1(4);">Animate it</button>
                                                </p>

                                            </div>
                                            <!--content ends--> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="panel-body text-center">
                                            <!--content starts-->
                                            <div class="wrap">
                                                <span id="animationSandbox2" style="display: block" class="">
                                                    <span class="primary_title mega">CHANDRA</span>
                                                </span>
                                            </div>
                                            <div class="wrap">
                                                <p>
                                                    <select id="s2" class="js--animations form-control" onchange="testAnim(this.value,2);">

                                                        <optgroup label="Bouncing Entrances">
                                                            <option value="bounceIn">BounceIn</option>
                                                            <option value="bounceInDown">BounceInDown</option>
                                                            <option value="bounceInLeft">BounceInLeft</option>
                                                            <option value="bounceInRight">BounceInRight</option>
                                                            <option value="bounceInUp">BounceInUp</option>
                                                        </optgroup>

                                                    </select>
                                                    <button class="butt primary js--triggerAnimation" onclick="testAnim1(2);">Animate it</button>
                                                </p>
                                            </div>
                                            <!--content ends--> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="panel-body text-center">
                                            <!--content starts-->
                                            <div class="wrap">
                                                <span id="animationSandbox6" style="display: block;" class="">
                                                    <span class="success_title mega">CHANDRA</span>
                                                </span>
                                            </div>
                                            <div class="wrap">
                                                <p>
                                                    <select id="s6" class=" js--animations form-control" onchange="testAnim(this.value,6);">

                                                        <optgroup label="Flippers">
                                                            <option value="flip">Flip</option>
                                                            <option value="flipInX">FlipInX</option>
                                                            <option value="flipInY">FlipInY</option>
                                                            <option value="flipOutX">FlipOutX</option>
                                                            <option value="flipOutY">FlipOutY</option>
                                                        </optgroup>

                                                    </select>
                                                    <button class="butt success js--triggerAnimation" onclick="testAnim1(6);">Animate it</button>
                                                </p>

                                            </div>
                                            <!--content ends--> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="panel-body text-center">
                                            <!--content starts-->
                                            <div class="wrap">
                                                <span id="animationSandbox7" style="display: block;" class="">
                                                    <span class="info_title mega">CHANDRA</span>
                                                </span>
                                            </div>
                                            <div class="wrap">
                                                <p>
                                                    <select id="s7" class=" js--animations form-control" onchange="testAnim(this.value,7);">

                                                        <optgroup label="Lightspeed">
                                                            <option value="lightSpeedIn">LightSpeedIn</option>
                                                            <option value="lightSpeedOut">LightSpeedOut</option>
                                                        </optgroup>

                                                    </select>
                                                    <button class="butt info js--triggerAnimation" onclick="testAnim1(7);">Animate it</button>
                                                </p>
                                            </div>
                                            <!--content ends--> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="panel-body text-center">
                                            <!--content starts-->
                                            <div class="wrap">
                                                <span id="animationSandbox8" style="display: block;" class="">
                                                    <span class="primary_title mega">CHANDRA</span>
                                                </span>
                                            </div>
                                            <div class="wrap">
                                                <p>
                                                    <select id="s8" class=" js--animations form-control" onchange="testAnim(this.value,8);">

                                                        <optgroup label="Rotating Entrances">
                                                            <option value="rotateIn">RotateIn</option>
                                                            <option value="rotateInDownLeft">RotateInDownLeft</option>
                                                            <option value="rotateInDownRight">RotateInDownRight</option>
                                                            <option value="rotateInUpLeft">RotateInUpLeft</option>
                                                            <option value="rotateInUpRight">RotateInUpRight</option>
                                                        </optgroup>

                                                    </select>
                                                    <button class="butt primary js--triggerAnimation" onclick="testAnim1(8);">Animate it</button>
                                                </p>
                                            </div>
                                            <!--content ends--> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="panel-body text-center">
                                            <!--content starts-->
                                            <div class="wrap">
                                                <span id="animationSandbox9" style="display: block;" class="">
                                                    <span class="warning_title mega">CHANDRA</span>
                                                </span>
                                            </div>
                                            <div class="wrap">
                                                <p>
                                                    <select id="s9" class=" js--animations form-control" onchange="testAnim(this.value,9);">

                                                        <optgroup label="Rotating Exits">
                                                            <option value="rotateOut">RotateOut</option>
                                                            <option value="rotateOutDownLeft">RotateOutDownLeft</option>
                                                            <option value="rotateOutDownRight">RotateOutDownRight</option>
                                                            <option value="rotateOutUpLeft">RotateOutUpLeft</option>
                                                            <option value="rotateOutUpRight">RotateOutUpRight</option>
                                                        </optgroup>
                                                    </select>
                                                    <button class="butt warning js--triggerAnimation" onclick="testAnim1(9);">Animate it</button>
                                                </p>
                                            </div>
                                            <!--content ends--> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="panel-body text-center">
                                            <!--content starts-->
                                            <div class="wrap">
                                                <span id="animationSandbox10" style="display: block;" class="">
                                                    <span class="info_title mega">CHANDRA</span>
                                                </span>
                                            </div>
                                            <div class="wrap">
                                                <p>
                                                    <select id="s10" class=" js--animations form-control" onchange="testAnim(this.value,10);">
                                                        <optgroup label="Sliders">
                                                            <option value="slideInDown">SlideInDown</option>
                                                            <option value="slideInLeft">SlideInLeft</option>
                                                            <option value="slideInRight">SlideInRight</option>
                                                            <option value="slideOutLeft">SlideOutLeft</option>
                                                            <option value="slideOutRight">SlideOutRight</option>
                                                            <option value="slideOutUp">SlideOutUp</option>
                                                        </optgroup>

                                                    </select>
                                                    <button class="butt info js--triggerAnimation" onclick="testAnim1(10);">Animate it</button>
                                                </p>
                                            </div>
                                            <!--content ends--> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="panel-body text-center">
                                            <!--content starts-->
                                            <div class="wrap">
                                                <span id="animationSandbox11" style="display: block;" class="">
                                                    <span class="success_title mega">CHANDRA</span>
                                                </span>
                                            </div>
                                            <div class="wrap">
                                                <p>
                                                    <select id="s11" class=" js--animations form-control" onchange="testAnim(this.value,11);">
                                                        <optgroup label="Specials">
                                                            <option value="hinge">Hinge</option>
                                                            <option value="rollIn">RollIn</option>
                                                            <option value="rollOut">RollOut</option>
                                                        </optgroup>
                                                    </select>
                                                    <button class="butt success js--triggerAnimation" onclick="testAnim1(11);">Animate it</button>
                                                </p>
                                            </div>
                                            <!--content ends--> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--row ends-->
                    <!--main content ends-->
                   </section>
                <!-- /.content --> @stop
{{-- page level scripts --}}
@section('footer_scripts')
        <script src="{{ asset('admin/assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
        <script src="{{ asset('admin/assets/js/custom_js/transitions.js') }}" type="text/javascript"></script>
        @stop