<footer class="page-footer font-small blue pt-4 mt-4 display-flex-column1">
    
        <div class="discount-email ">
            <span style="color: white; width: 200px;">
                <i class="material-icons" style="font-size: 13px; ">
                    mail
                </i>
                Deals & Discounts
            </span>
            <form class="form-inline footer-form" action="#">
                <div class="form-group responsive-footer-form" style="margin-bottom: 0;">
                    <input type="email" class="form-control input" id="footer-email" placeholder="Enter email" name="email">
                </div>
                <button type="submit" class="btn btn-primary">Sign up</button>
            </form>
        </div>
<div class="force-display-flex flex-wrap full-width">
    <div class="name text-center">

        <h1>Trip Planner</h1>

            <div class="socialBtnContainer full-width display-flex-center space-evenly">
                <a target="_blank" href="#" title="Facebook" class="mdl-mini-footer--social-btn social-btn social-btn__facebook" >
                    <img src="{{ asset('assets/logo/facebook.png') }}" alt="">
                </a>
                <a target="_blank" href="#" title="Pinterest" class="mdl-mini-footer--social-btn social-btn social-btn__pinterest" >
                    <img src="{{ asset('assets/logo/instagram.png') }}" alt="">
                </a>
                <a target="_blank" href="#" title="Instagram" class="mdl-mini-footer--social-btn social-btn social-btn__instagram" >
                    <img src="{{ asset('assets/logo/instagram.png') }}" alt="">
                </a>
            </div>

    </div>
    <div class="lists">

        <div class="container-fluid text-cleft text-md-left">
            <div class="row">
            <!--First column-->
                <!--/.First column-->

                <div class="col-xs-4 company">
                <h5 class="text-uppercase">Company</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">About Us</a>
                        </li>
                        <li>
                            <a href="#!">Partners with us</a>
                        </li>
                        <li>
                            <a href="#!">Miles</a>
                        </li>
                    </ul>

                </div>
                <div class="col-xs-4 help">
                <h5 class="text-uppercase">Help</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">FAQ</a>
                        </li>
                        <li>
                            <a href="#!">Contact Us</a>
                        </li>
                        <li>
                            <a href="#!">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="#!">Cookie Policy</a>
                        </li>
                        <li>
                            <a href="#!">Copyright Policy</a>
                        </li>
                    </ul>
                </div>
                <div class="col-xs-4 discover">

                    <h5 class="text-uppercase">Discover</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Routes & other issues</a>
                        </li>
                    </ul>

                  
                </div>
            </div>
        </div>

    </div>
</div>
</div>
<div class="footer-copyright py-3 text-center copy">&copy;2018 Copyright:
<a href="{{ URL::to('/') }}"> cubaonmiles.com </a>
</div>

</footer>