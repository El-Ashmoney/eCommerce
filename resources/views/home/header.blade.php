<header class="header_section">
    <div class="container">
        <nav class="headerLinks navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand" href="{{ url('/') }}"><img width="250" src="/images/logo.png" alt="Site Logo" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"  aria-label="Toggle navigation">
                <span class=""> </span>
            </button>
            <div class="navbar-collapse collapse" id="navbarSupportedContent">
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
                            <li class="login-register nav-item">
                                <x-app-layout>

                                </x-app-layout>
                            </li>
                        @else
                            <li class="nav-item" style="padding-top: 13px; margin-left: 15px">
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
    <section class="verify_user container">
        @auth
            @if($verifiedUser->email_verified_at == Null)
                <p class="uppercase text-center" style="color: red; font-weight: 600"><i class="fa-solid fa-triangle-exclamation"></i> please verify your email by checking your email inbox</p>
                <p class="text-center">
                    <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900 text-center" wire:click.prevent="sendEmailVerification">
                        Click here to re-send the verification email.
                    </button>
                    <p v-show="verificationLinkSent" class="mt-2 font-medium text-sm text-green-600 text-center">
                        A new verification link has been sent to your email address.
                    </p>
                </p>
            @endif
        @endauth
    </section>
</header>
