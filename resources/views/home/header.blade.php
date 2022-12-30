<header class="header_section">
    <div class="container">
        <nav class="headerLinks navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand" href="{{ url('/') }}"><img width="250" src="/images/logo.png" alt="#" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"  aria-label="Toggle navigation">
                <span class=""> </span>
            </button>
            <div class="navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav" id="headerLinks">
                    <li class="nav-item" data-page="/">
                        <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item" data-page="/products">
                        <a class="nav-link" href="{{ url('products') }}">Products</a>
                    </li>
                    <li class="nav-item" data-page="/contact">
                        <a class="nav-link" href="{{ url('contact') }}">Contact</a>
                    </li>
                    @auth
                    <li class="nav-item" data-page="/show_cart">
                        <a class="nav-link" href="{{ url('show_cart') }}">Cart</a>
                    </li>
                    <li class="nav-item" data-page="/show_order">
                        <a class="nav-link" href="{{ url('show_order') }}">Order</a>
                    </li>
                    @if(Auth::user()->usertype == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('redirect') }}" target="_blank">Admin Dashboard</a>
                        </li>
                    @endif
                    @endauth
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <x-app-layout>

                                </x-app-layout>
                            </li>
                        @else
                            <li class="nav-item" style="padding-top: 13px">
                                <a class="btn btn-primary" href="{{ route('login') }}" id="loginCss">Login</a>
                            </li>
                            <li class="nav-item" style="padding-top: 13px">
                                <a class="btn btn-success" href="{{ route('register') }}">Register</a>
                            </li>
                        @endauth
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</header>
