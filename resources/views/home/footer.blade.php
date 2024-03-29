<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="full">
                    <div class="logo_footer">
                        <a href="#"><img width="210" src="/images/logo.png" alt="#" /></a>
                    </div>
                    <div class="information_f">
                        <p><strong>ADDRESS:</strong> Egypt, Cairo</p>
                        <p><strong>TELEPHONE:</strong> +201012734018</p>
                        <p><strong>EMAIL:</strong> ashmoney@outlook.com</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="widget_menu">
                                    <h3>Menu</h3>
                                    <ul>
                                        <li><a href="{{ url('/') }}">Home</a></li>
                                        <li><a href="{{ url('products') }}">Products</a></li>
                                        <li><a href="{{ url('contact') }}">Contact</a></li>
                                        <li><a href="{{ url('privacy_policy') }}">Privacy Policy</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="widget_menu">
                                    <h3>Account</h3>
                                    <ul>
                                        @auth
                                            <li><a href="{{ url('show_cart') }}">Cart</a></li>
                                            <li><a href="{{ url('show_order') }}">Order</a></li>
                                        @endauth
                                        <li><a href="{{ route('login') }}">Login</a></li>
                                        <li><a href="{{ url('register') }}">Register</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="widget_menu">
                            <h3>Newsletter</h3>
                            <div class="information_f">
                                <p>Subscribe by our newsletter and get update protidin.</p>
                            </div>
                            <div class="form_sub">
                                <form>
                                    <fieldset>
                                        <div class="field">
                                            <input type="email" placeholder="Enter Your Mail" name="email" />
                                            <input class="subscribe_btn" type="submit" style="text-transform: uppercase" value="Subscribe" />
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright"><span>&copy;</span>2023 Blank Cart. All Right Reserved.</div>
    </div>
</footer>
