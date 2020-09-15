@extends('layouts.app')
@section('custom-css')
    <link rel="stylesheet" href="{{ asset('assets/css/myPlans.css') }}">
@endsection
@section('content')
    <div class="container my-plans-container">
        <div class="row my-plans-row">
            <ul class="nav nav-tabs my-plans-tabs  primary-background-color">
                <li class="active"><a data-toggle="tab" href="#previous">Confirmed Bookings</a></li>
                <li><a data-toggle="tab" id="current_booking" href="#upcoming">Completed Bookings</a></li>
                <li><a data-toggle="tab" href="#not-decided">Pending</a></li>
                <li><a data-toggle="tab" href="#created">Created</a></li>
            </ul>

            <div class="tab-content">
                <div id="previous" class="tab-pane fade in active">
                    <h3>Confirmed Bookings</h3>
                    <div class="previous-booking-container  flex-wrap center-justify-content ">
{{--                        {{ dd($previous) }}--}}
                        @if(!empty($confirmed))
                            @foreach($confirmed as $key=>$value)
                                        <div class="previous-booking-places is-card display-flex space-between">
                                            <div style="width: 30%;">
                                                <img src="{{ asset('admin/assets/images/cities') . '/home.png' /*.$value['file_path'][array_rand($value['file_path'])]*/ }}" height="100%" width="100%" alt="">
                                            </div>
                                            <div class="plan-details-container">
                                                <p class="route-title">{{ $value['title'] }}</p>
                                                <div class="plan-details">
                                                    <span>{{ $value['travellers'] }} Travellers</span>
                                                    <span>{{ $value['price'] }} $</span>
                                                </div>
                                                <p>Journey Date: {{ $value['date'] }}</p>
                                            </div>
                                        </div>
                            @endforeach
                        @else
                            <div><p>No routes found</p></div>
                        @endif
                    </div>
                    <div class="previous-plan-pagination display-flex center-justify-content">
                        {{--{{ $previous->links() }}--}}
                    </div>

                </div>

                <div id="upcoming" class="tab-pane fade">
                    <h3>Completed Bookings</h3>
                    <div class="previous-booking-container  flex-wrap center-justify-content ">
                        {{--{{ dd($upcoming) }}--}}
                        @if(!empty($completed))
                        @foreach($completed as $key=>$value)
                            <div class="previous-booking-places is-card display-flex space-between">
                                <div style="width: 30%;">
                                    <img src="{{ asset('admin/assets/images/cities') . '/home.png' /*.$value['file_path'][array_rand($value['file_path'])]*/ }}" height="100%" width="100%" alt="">
                                </div>
                                <div class="plan-details-container">
                                    <p class="route-title">{{ $value['title'] }}</p>
                                    <div class="plan-details">
                                        <span>{{ $value['travellers'] }} Travellers</span>
                                        <span>{{ $value['price'] }} $</span>
                                    </div>
                                    <p>Journey Date: {{ $value['date'] }}</p>

                                    {{--@if(session()->has('role'))--}}
                                        {{--<span><a class="btn btn-primary primary-background-color hasLogin " href="{{ URL::to('check-out/'.$value['id']) }}">Book</a></span>--}}
                                    {{--@else--}}
                                        {{--<span><a class="btn btn-primary primary-background-color " href="javascript:void(0)" v-on:click="booking($event)">Book</a></span>--}}
                                    {{--@endif--}}

                                </div>
                            </div>
                        @endforeach
                        @else
                            <div><p>No routes found</p></div>
                        @endif
                    </div>
                    <div class="previous-plan-pagination display-flex center-justify-content">

                    </div>
                </div>
                <div id="not-decided" class="tab-pane fade">
                    <h3>Booking not yet confirmed</h3>
                    <div class="previous-booking-container  flex-wrap center-justify-content ">
                        @if(!empty($pending))
                            @if(session()->has('anonymous_route_id'))

                                @foreach($pending as $key=>$value)
                                    <div class="previous-booking-places is-card display-flex space-between">
                                        <div style="width: 30%;">
                                            <img src="{{ asset('admin/assets/images/cities') . '/home.png' /*.$value[0]['file_path'][array_rand($value[0]['file_path'])]*/ }}" height="100%" width="100%" alt="">
                                        </div>
                                        <div class="plan-details-container">
                                            <p class="route-title">{{ $value['title'] }}</p>
                                            <div class="plan-details">
                                                <span>{{ $value['travellers'] }} Travellers</span>
                                                <span>{{ $value['price'] }} $</span>
                                            </div>
                                            <p>Journey Date: {{ $value['date'] }}</p>

                                            <a href="{{ URL::to('modify-route/'.$value['id']) }}"><button class="btn btn-primary primary-background-color"> Modify </button></a>
                                            @if(session()->has('role'))
                                                <span><a class="btn btn-primary primary-background-color hasLogin " href="{{ URL::to('check-out/'.$value[0]['id']) }}">Book</a></span>
                                            @else
                                                <span><a class="btn btn-primary primary-background-color " href="javascript:void(0)" v-on:click="booking($event)">Book</a></span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                @foreach($pending as $key=>$value)
                                    <div class="previous-booking-places is-card display-flex space-between">
                                        <div style="width: 30%;">
                                            <img src="{{ asset('admin/assets/images/cities') . '/home.png' /*.$value['file_path'][array_rand($value['file_path'])]*/ }}" height="100%" width="100%" alt="">
                                        </div>
                                        <div class="plan-details-container">
                                            <p class="route-title">{{ $value['title'] }}</p>
                                            <div class="plan-details">
                                                <span>{{ $value['travellers'] }} Travellers</span>
                                                <span>{{ $value['price'] }} $</span>
                                            </div>
                                            <p>Journey Date: {{ $value['date'] }}</p>

                                            <a href="{{ URL::to('modify-route/'.$value['id']) }}"><button class="btn btn-primary primary-background-color"> Modify </button></a>
                                            @if(session()->has('role'))
                                                <span><a class="btn btn-primary primary-background-color hasLogin " href="{{ URL::to('check-out/'.$value['id']) }}">Book</a></span>
                                            @else
                                                <span><a class="btn btn-primary primary-background-color " href="javascript:void(0)" v-on:click="booking($event)">Book</a></span>
                                            @endif
                                        </div>
                                    </div>


                                @endforeach

                            @endif
                        @else

                            <div><p>No routes found</p></div>

                        @endif
                    </div>
                    <div class="previous-plan-pagination display-flex center-justify-content">

                    </div>
                </div>
                <div id="created" class="tab-pane fade">
                    <h3>Payment not done</h3>
                    <div class="previous-booking-container  flex-wrap center-justify-content ">
                        @if(!empty($created))
                            @if(session()->has('anonymous_route_id'))

                                @foreach($created as $key=>$value)
                                    <div class="previous-booking-places is-card display-flex space-between">
                                        <div style="width: 30%;">
                                            <img src="{{ asset('admin/assets/images/cities') . '/home.png' /*.$value[0]['file_path'][array_rand($value[0]['file_path'])]*/ }}" height="100%" width="100%" alt="">
                                        </div>
                                        <div class="plan-details-container">
                                            <p class="route-title">{{ $value['title'] }}</p>
                                            <div class="plan-details">
                                                <span>{{ $value['travellers'] }} Travellers</span>
                                                <span>{{ $value['price'] }} $</span>
                                            </div>
                                            <p>Journey Date: {{ $value['date'] }}</p>

                                            <a href="{{ URL::to('modify-route/'.$value['id']) }}"><button class="btn btn-primary primary-background-color"> Modify </button></a>
                                            @if(session()->has('role'))
                                                <span><a class="btn btn-primary primary-background-color hasLogin " href="{{ URL::to('check-out/'.$value[0]['id']) }}">Book</a></span>
                                            @else
                                                <span><a class="btn btn-primary primary-background-color " href="javascript:void(0)" v-on:click="booking($event)">Book</a></span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                @foreach($created as $key=>$value)
                                    <div class="previous-booking-places is-card display-flex space-between">
                                        <div style="width: 30%;">
                                            <img src="{{ asset('admin/assets/images/cities') . '/home.png' /*.$value['file_path'][array_rand($value['file_path'])]*/ }}" height="100%" width="100%" alt="">
                                        </div>
                                        <div class="plan-details-container">
                                            <p class="route-title">{{ $value['title'] }}</p>
                                            <div class="plan-details">
                                                <span>{{ $value['travellers'] }} Travellers</span>
                                                <span>{{ $value['price'] }} $</span>
                                            </div>
                                            <p>Journey Date: {{ $value['date'] }}</p>

                                            <a href="{{ URL::to('modify-route/'.$value['id']) }}"><button class="btn btn-primary primary-background-color"> Modify </button></a>
                                            @if(session()->has('role'))
                                                <span><a class="btn btn-primary primary-background-color hasLogin " href="{{ URL::to('check-out/'.$value['id']) }}">Book</a></span>
                                            @else
                                                <span><a class="btn btn-primary primary-background-color " href="javascript:void(0)" v-on:click="booking($event)">Book</a></span>
                                            @endif
                                        </div>
                                    </div>


                                @endforeach

                            @endif
                        @else

                            <div><p>No routes found</p></div>

                        @endif
                    </div>
                    <div class="previous-plan-pagination display-flex center-justify-content">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom-scripts')
    <script src="{{ asset('assets/js/myPlans.js') }}"></script>
@endsection