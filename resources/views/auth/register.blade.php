<div class="modal fade" id="registration-modal" role="dialog">
    <div class="modal-dialog modal-lg login-modal">

        <!-- Modal content-->
        <div class="modal-content border-radius-0">
            <div class="modal-header registration-modal-header">
                <button type="button" class="close" id="register-form-close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
<div class="container login-container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 login-form">
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">Register</div>--}}

            <h1>Sign Up</h1>
            <h3>Sign up to access your plan from any device</h3>


                <div class="panel-body">
                    <form class="form-horizontal" id="register-form" method="POST" action="#" v-on:submit="register($event)">
                        <input type="hidden" id="path" name="path" value="{{ URL::to('registration') }}">
                        
                        <div class="form-group">

        
                            <div class="col-md-12">
                                <input id="first_name" type="text" class="form-control" name="first_name" placeholder="Enter first name" v-model="userDetails.first_name"  required autofocus>
            

                            </div>
                        </div>
    
                        <div class="form-group">

        
                            <div class="col-md-12">
                                <input id="last_name" placeholder="Enter last name" type="text" class="form-control" name="last_name" v-model="userDetails.last_name" required>
            

                            </div>
                        </div>

                        <div class="form-group">


                            <div class="col-md-12">
                                <input placeholder="Enter email" id="register-email" type="email" class="form-control" name="email" v-model="userDetails.email" required>
                                <span class="help-block" id="email-error">

                                </span>

                            </div>
                        </div>

                        <div class="form-group">


                            <div class="col-md-12">
                                <input placeholder="Enter password" id="register-password" type="password" class="form-control" name="password" v-model="userDetails.password" required>


                            </div>
                        </div>

                        <div class="form-group">


                            <div class="col-md-12">
                                <input placeholder="Confirm Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" v-model="userDetails.password_confirm" required>
                                <span class="help-block" id="password-error">

                                </span>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-12" style="text-align: center">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
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
                <span>Already have an account?</span><strong><a href="javascript:void(0)" id="login-modal-link"> Login</a></strong>
            </div>
        </div>

    </div>
</div>

