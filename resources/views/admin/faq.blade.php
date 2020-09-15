@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')Faq @parent

@stop
    {{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('admin/assets/css/custom_css/faq.css') }}" rel="stylesheet" type="text/css"/>
    @stop

{{-- Page content --}}
@section('content')
    <section class="content-header">
                    <h1>FAQ</h1>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="fa fa-fw fa-home"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="#">Pages</a>
                        </li>
                        <li>
                            FAQ
                        </li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="control-bar sandbox-control-bar">
                                <div >
                                    <span class="btn btn-info mr10 mb10 filter active" data-filter="all">All</span>
                                    <span class="btn btn-info mr10 mb10 filter" data-filter=".category-1">Mobile</span>
                                    <span class="btn btn-info mr10 mb10 filter" data-filter=".category-2">Account</span>
                                    <span class="btn btn-info mr10 mb10 filter" data-filter=".category-3">Payment</span>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="panel-group panel-accordion faq-accordion">
                                            <div class="row" id="faq">
                                                <div class="mix category-1 col-lg-12 col-md-12 col-sm-12 panel panel-default" data-value="1">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#question1">
                                                                <strong class="c-gray-light">1.</strong>
                                                                How does syncing work?
                                                                <span class="pull-right">
                                                                    <i class="glyphicon glyphicon-plus"></i>
                                                                </span>
                                                            </a>

                                                        </h4>
                                                    </div>
                                                    <div id="question1" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            <p>
                                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit quidem delectus rerum eligendi mollitia, repudiandae quae beatae. Et repellat quam atque corrupti iusto architecto impedit explicabo repudiandae qui similique aut iure ipsum quis inventore nulla error aliquid alias quia dolorem dolore, odio excepturi veniam odit veritatis. Quo iure magnam, et cum. Laudantium, eaque non? Tempore nihil corporis cumque dolor ipsum accusamus sapiente aliquid quis ea assumenda deserunt praesentium voluptatibus, accusantium a mollitia necessitatibus nostrum voluptatem numquam modi ab, sint rem.
                                                            </p>
                                                            <ol>
                                                                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                                                                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                                                                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit..</li>
                                                                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit..</li>
                                                            </ol>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mix category-1 col-lg-12 col-md-12 col-sm-12 panel panel-default" data-value="2">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#question2">
                                                                <strong class="c-gray-light">2.</strong>
                                                                How do I upload files from my phone or tablet?
                                                                <span class="pull-right">
                                                                    <i class="glyphicon glyphicon-plus"></i>
                                                                </span>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="question2" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            <p>
                                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi tempore, placeat quisquam rerum! Eligendi fugit dolorum tenetur modi fuga nisi rerum, autem officiis quaerat quos. Magni quia, quo quibusdam odio. Error magni aperiam amet architecto adipisci aspernatur! Officia, quaerat magni architecto nostrum magnam fuga nihil, ipsum laboriosam similique voluptatibus facilis nobis? Eius non asperiores, nesciunt suscipit veniam blanditiis veritatis provident possimus iusto voluptas, eveniet architecto quidem quos molestias, aperiam eum reprehenderit dolores ad deserunt eos amet. Vero molestiae commodi unde dolor dicta maxime alias, velit, nesciunt cum dolorem, ipsam soluta sint suscipit maiores mollitia assumenda ducimus aperiam neque enim! Quas culpa dolorum ipsam? Ipsum voluptatibus numquam natus? Eligendi explicabo eos, perferendis voluptatibus hic sed ipsam rerum maiores officia! Beatae, molestias!
                                                            </p>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mix category-1 col-lg-12 col-md-12 col-sm-12 panel panel-default" data-value="3">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#question3">
                                                                <strong class="c-gray-light">3.</strong>
                                                                How do I link to a file or folder?
                                                                <span class="pull-right">
                                                                    <i class="glyphicon glyphicon-plus"></i>
                                                                </span>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="question3" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            <p>
                                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi tempore, placeat quisquam rerum! Eligendi fugit dolorum tenetur modi fuga nisi rerum, autem officiis quaerat quos. Magni quia, quo quibusdam odio. Error magni aperiam amet architecto adipisci aspernatur! Officia, quaerat magni architecto nostrum magnam fuga nihil, ipsum laboriosam similique voluptatibus facilis nobis? Eius non asperiores, nesciunt suscipit veniam blanditiis veritatis provident possimus iusto voluptas, eveniet architecto quidem quos molestias, aperiam eum reprehenderit dolores ad deserunt eos amet. Vero molestiae commodi unde dolor dicta maxime alias, velit, nesciunt cum dolorem, ipsam soluta sint suscipit maiores mollitia assumenda ducimus aperiam neque enim! Quas culpa dolorum ipsam? Ipsum voluptatibus numquam natus? Eligendi explicabo eos, perferendis voluptatibus hic sed ipsam rerum maiores officia! Beatae, molestias!
                                                            </p>
                                                            <ol>
                                                                <li>
                                                                    explicabo eos, perferendis voluptatibus hic sed ipsam rerum maiores officia! Beatae,
                                                                </li>
                                                                <li>
                                                                    explicabo eos, perferendis voluptatibus hic sed ipsam rerum maiores officia! Beatae,
                                                                </li>
                                                                <li>
                                                                    explicabo eos, perferendis voluptatibus hic sed ipsam rerum maiores officia! Beatae,
                                                                </li>
                                                                <li>
                                                                    explicabo eos, perferendis voluptatibus hic sed ipsam rerum maiores officia! Beatae,
                                                                </li>
                                                            </ol>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mix category-2 col-lg-12 col-md-12 col-sm-12 panel panel-default" data-value="4">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#question4">
                                                                <strong class="c-gray-light">4.</strong>
                                                                How do I change my password?
                                                                <span class="pull-right">
                                                                    <i class="glyphicon glyphicon-plus"></i>
                                                                </span>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="question4" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            <p>
                                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis earum autem consectetur labore eius tenetur esse, in temporibus sequi cum voluptatem vitae repellat nostrum odio perspiciatis dolores recusandae necessitatibus, unde, deserunt voluptas possimus veniam magni soluta deleniti! Architecto, quidem, totam. Fugit minus odit unde ea cupiditate ab aperiam sed dolore facere nihil laboriosam dolorum repellat deleniti aliquam fugiat laudantium delectus sint iure odio, necessitatibus rem quisquam! Ipsum praesentium quam nisi sint, impedit sapiente facilis laudantium mollitia quae fugiat similique. Dolor maiores aliquid incidunt commodi doloremque rem! Quaerat, debitis voluptatem vero qui enim, sunt reiciendis tempore inventore maxime quasi fugiat accusamus beatae modi voluptates iste officia esse soluta tempora labore quisquam fuga, cum. Sint nemo iste nulla accusamus quam qui quos, vero, minus id. Eius mollitia consequatur fugit nam consequuntur nesciunt illo id quis reprehenderit obcaecati voluptates corrupti, minus! Possimus, perspiciatis!
                                                            </p>
                                                            <ol>
                                                                <li>
                                                                    reprehenderit obcaecati voluptates corrupti, minus! Possimus,
                                                                </li>
                                                                <li>
                                                                    reprehenderit obcaecati voluptates corrupti, minus! Possimus,
                                                                </li>
                                                                <li>
                                                                    reprehenderit obcaecati voluptates corrupti, minus! Possimus,
                                                                </li>
                                                                <li>
                                                                    reprehenderit obcaecati voluptates corrupti, minus! Possimus,
                                                                </li>
                                                            </ol>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mix category-1 col-lg-12 col-md-12 col-sm-12 panel panel-default" data-value="5">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#question5">
                                                                <strong class="c-gray-light">5.</strong>
                                                                Remote screen alignment problem
                                                                <span class="pull-right">
                                                                    <i class="glyphicon glyphicon-plus"></i>
                                                                </span>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="question5" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            <p>
                                                                The screen of my Qtek9100 is cracked and i actually did a hard reset although thisi is my second time of using the application remote screen alignment,it actually works the first time but while trying to use it the second timeafter i performed my hard reset all i got is "your device cannot be...
                                                            </p>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mix category-2 col-lg-12 col-md-12 col-sm-12 panel panel-default" data-value="6">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#question6">
                                                                <strong class="c-gray-light">6.</strong>
                                                                How do I delete my account?
                                                                <span class="pull-right">
                                                                    <i class="glyphicon glyphicon-plus"></i>
                                                                </span>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="question6" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            <p>
                                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis earum autem consectetur labore eius tenetur esse, in temporibus sequi cum voluptatem vitae repellat nostrum odio perspiciatis dolores recusandae necessitatibus, unde, deserunt voluptas possimus veniam magni soluta deleniti! Architecto, quidem, totam. Fugit minus odit unde ea cupiditate ab aperiam sed dolore facere nihil laboriosam dolorum repellat deleniti aliquam fugiat laudantium delectus sint iure odio, necessitatibus rem quisquam! Ipsum praesentium quam nisi sint, impedit sapiente facilis laudantium mollitia quae fugiat similique. Dolor maiores aliquid incidunt commodi doloremque rem! Quaerat, debitis voluptatem vero qui enim, sunt reiciendis tempore inventore maxime quasi fugiat accusamus beatae modi voluptates iste officia esse soluta tempora labore quisquam fuga, cum. Sint nemo iste nulla accusamus quam qui quos, vero, minus id. Eius mollitia consequatur fugit nam consequuntur nesciunt illo id quis reprehenderit obcaecati voluptates corrupti, minus! Possimus, perspiciatis!
                                                            </p>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mix category-3 col-lg-12 col-md-12 col-sm-12 panel panel-default" data-value="7">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#question7">
                                                                <strong class="c-gray-light">7.</strong>
                                                                Can I have an invoice for my subscription?
                                                                <span class="pull-right">
                                                                    <i class="glyphicon glyphicon-plus"></i>
                                                                </span>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="question7" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            <p>
                                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis earum autem consectetur labore eius tenetur esse, in temporibus sequi cum voluptatem vitae repellat nostrum odio perspiciatis dolores recusandae necessitatibus, unde, deserunt voluptas possimus veniam magni soluta deleniti! Architecto, quidem, totam. Fugit minus odit unde ea cupiditate ab aperiam sed dolore facere nihil laboriosam dolorum repellat deleniti aliquam fugiat laudantium delectus sint iure odio, necessitatibus rem quisquam! Ipsum praesentium quam nisi sint, impedit sapiente facilis laudantium mollitia quae fugiat similique. Dolor maiores aliquid incidunt commodi doloremque rem! Quaerat, debitis voluptatem vero qui enim, sunt reiciendis tempore inventore maxime quasi fugiat accusamus beatae modi voluptates iste officia esse soluta tempora labore quisquam fuga, cum. Sint nemo iste nulla accusamus quam qui quos, vero, minus id. Eius mollitia consequatur fugit nam consequuntur nesciunt illo id quis reprehenderit obcaecati voluptates corrupti, minus! Possimus, perspiciatis!
                                                            </p>
                                                            <ol>
                                                                <li>Sint nemo iste nulla accusamus quam qui quos,</li>
                                                                <li>Sint nemo iste nulla accusamus quam qui quos,</li>
                                                                <li>Sint nemo iste nulla accusamus quam qui quos,</li>
                                                                <li>Sint nemo iste nulla accusamus quam qui quos,</li>
                                                            </ol>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mix category-3 col-lg-12 col-md-12 col-sm-12 panel panel-default" data-value="8">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#question8">
                                                                <strong class="c-gray-light">8.</strong>
                                                                Why did my credit card or PayPal payment fail?
                                                                <span class="pull-right">
                                                                    <i class="glyphicon glyphicon-plus"></i>
                                                                </span>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="question8" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            <p>
                                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis earum autem consectetur labore eius tenetur esse, in temporibus sequi cum voluptatem vitae repellat nostrum odio perspiciatis dolores recusandae necessitatibus, unde, deserunt voluptas possimus veniam magni soluta deleniti! Architecto, quidem, totam. Fugit minus odit unde ea cupiditate ab aperiam sed dolore facere nihil laboriosam dolorum repellat deleniti aliquam fugiat laudantium delectus sint iure odio, necessitatibus rem quisquam! Ipsum praesentium quam nisi sint, impedit sapiente facilis laudantium mollitia quae fugiat similique. Dolor maiores aliquid incidunt commodi doloremque rem! Quaerat, debitis voluptatem vero qui enim, sunt reiciendis tempore inventore maxime quasi fugiat accusamus beatae modi voluptates iste officia esse soluta tempora labore quisquam fuga, cum. Sint nemo iste nulla accusamus quam qui quos, vero, minus id. Eius mollitia consequatur fugit nam consequuntur nesciunt illo id quis reprehenderit obcaecati voluptates corrupti, minus! Possimus, perspiciatis!
                                                            </p>
                                                            <ol>
                                                                <li>
                                                                    reprehenderit obcaecati voluptates corrupti, minus! Possimus, perspiciatis!
                                                                </li>
                                                                <li>
                                                                    reprehenderit obcaecati voluptates corrupti, minus! Possimus, perspiciatis!
                                                                </li>
                                                                <li>
                                                                    reprehenderit obcaecati voluptates corrupti, minus! Possimus, perspiciatis!
                                                                </li>

                                                            </ol>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mix category-2 col-lg-12 col-md-12 col-sm-12 panel panel-default" data-value="9">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#question9">
                                                                <strong class="c-gray-light">9.</strong>
                                                                How do I change my account settings?
                                                                <span class="pull-right">
                                                                    <i class="glyphicon glyphicon-plus"></i>
                                                                </span>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="question9" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            <p>
                                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis earum autem consectetur labore eius tenetur esse, in temporibus sequi cum voluptatem vitae repellat nostrum odio perspiciatis dolores recusandae necessitatibus, unde, deserunt voluptas possimus veniam magni soluta deleniti! Architecto, quidem, totam. Fugit minus odit unde ea cupiditate ab aperiam sed dolore facere nihil laboriosam dolorum repellat deleniti aliquam fugiat laudantium delectus sint iure odio, necessitatibus rem quisquam! Ipsum praesentium quam nisi sint, impedit sapiente facilis laudantium mollitia quae fugiat similique. Dolor maiores aliquid incidunt commodi doloremque rem! Quaerat, debitis voluptatem vero qui enim, sunt reiciendis tempore inventore maxime quasi fugiat accusamus beatae modi voluptates iste officia esse soluta tempora labore quisquam fuga, cum. Sint nemo iste nulla accusamus quam qui quos, vero, minus id. Eius mollitia consequatur fugit nam consequuntur nesciunt illo id quis reprehenderit obcaecati voluptates corrupti, minus! Possimus, perspiciatis!
                                                            </p>
                                                            <ol>
                                                                <li>voluptates corrupti, minus! Possimus, perspiciatis!</li>
                                                                <li>voluptates corrupti, minus! Possimus, perspiciatis!</li>
                                                                <li>voluptates corrupti, minus! Possimus, perspiciatis!</li>
                                                            </ol>
                                                        </div>
                                                    </div>
                                                </div>
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
        <script src="{{ asset('admin/assets/vendors/mixitup/jquery.mixitup.js') }}"></script>
        <script src="{{ asset('admin/assets/js/custom_js/faq.js') }}" type="text/javascript"></script>
        @stop