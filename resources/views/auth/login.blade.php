    <div class="modal fade " id="login-modal" role="dialog">
        <div class="modal-dialog modal-lg login-modal">

            <!-- Modal content-->
            <div class="modal-content border-radius-0">
                <div class="modal-header">
                    <button type="button" class="close login-close" v-on:click="userLogin.redirect_path = ''" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <div class="container login-container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 login-form">
                                {{--<div class="panel panel-default">--}}
                                    {{--<div class="panel-heading">Login</div>--}}

                                <h1>Login</h1>
                                <h3>Login to access your plan from any device</h3>

                                    <div class="panel-body">
                                        <form class="form-horizontal form-login" method="POST" action="#" v-on:submit="login($event)">
                                            <input type="hidden" id="login-path" value="{{ URL::to('login') }}">
                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">


                                                <div class="col-md-12">
                                                    <input id="email" type="email" class="form-control" name="email" placeholder="Enter email" v-model="userLogin.email" required autofocus>

                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">


                                            <div class="col-md-12">
                                                <input id="password" type="password" class="form-control" name="password" placeholder="enter password" v-model="userLogin.password" required>
                                                    <span class="help-block" id="help-block"></span>
                                            </div>
                                        </div>
                                        {{--<div class="form-group">--}}
                                            {{--<div class="col-md-6 col-md-offset-4">--}}
                                                {{--<div class="checkbox">--}}
                                                    {{--<label>--}}
                                                        {{--<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me--}}
                                                    {{--</label>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        <div class="form-group">
                                            <div class="col-md-12" style="text-align: center">
                                                <button type="submit" class="btn btn-primary">
                                                    Login
                                                </button>

                                                {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                                                    {{--Forgot Your Password?--}}
                                                {{--</a>--}}
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            {{--</div>--}}
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <span>New User?</span><strong><a href="javascript:void(0)" id="signup-link">Sign Up</a></strong>
            </div>
        </div>

    </div>
</div>







