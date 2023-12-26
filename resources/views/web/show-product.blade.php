<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/web/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('assets/web/css/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/web/css/style.css') }}" rel="stylesheet">
    <style>
        .container-1 {
            max-width: 1200px;
            margin: 0 auto;
            padding: 15px;
            display: flex;

            padding: 100px 0px 185px 0px;
        }

        .left-column {
            width: 65%;
            position: relative;
        }

        .right-column {
            width: 35%;
            margin-top: 60px;
        }

        /* Left Column */
        .left-column img {
            width: 60%;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .left-column img.active {
            opacity: 1;
        }

        .product-description {
            border-bottom: 1px solid #E1E8EE;
            margin-bottom: 20px;
        }

        .product-description span {
            font-size: 12px;
            color: #358ED7;
            letter-spacing: 1px;
            text-transform: uppercase;
            text-decoration: none;
        }

        .product-description h1 {
            font-weight: 300;
            font-size: 52px;
            color: #43484D;
            letter-spacing: -2px;
        }

        .product-description p {
            font-size: 16px;
            font-weight: 300;
            color: #86939E;
            line-height: 24px;
        }

        /* Product Color */
        .product-color {
            margin-bottom: 30px;
        }

        .color-choose div {
            display: inline-block;
        }

        .color-choose input[type="radio"] {
            display: none;
        }

        .color-choose input[type="radio"]+label span {
            display: inline-block;
            width: 40px;
            height: 40px;
            margin: -1px 4px 0 0;
            vertical-align: middle;
            cursor: pointer;
            border-radius: 50%;
            border: 2px solid #FFFFFF;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.33);
        }

        .color-choose input[type="radio"]#red+label span {
            background-color: #C91524;
        }

        .color-choose input[type="radio"]#blue+label span {
            background-color: #314780;
        }

        .color-choose input[type="radio"]#black+label span {
            background-color: #323232;
        }

        .color-choose input[type="radio"]:checked+label span {
            background-image: url(images/check-icn.svg);
            background-repeat: no-repeat;
            background-position: center;
        }

        .cable-choose {
            margin-bottom: 20px;
        }

        .cable-choose button {
            border: 2px solid #E1E8EE;
            border-radius: 6px;
            padding: 13px 20px;
            font-size: 14px;
            color: #5E6977;
            background-color: #fff;
            cursor: pointer;
            transition: all .5s;
        }

        .cable-choose button:hover,
        .cable-choose button:active,
        .cable-choose button:focus {
            border: 2px solid #86939E;
            outline: none;
        }

        .cable-config {
            border-bottom: 1px solid #E1E8EE;
            margin-bottom: 20px;
        }

        .cable-config a {
            color: #358ED7;
            text-decoration: none;
            font-size: 12px;
            position: relative;
            margin: 10px 0;
            display: inline-block;
        }

        .cable-config a:before {
            content: "?";
            height: 15px;
            width: 15px;
            border-radius: 50%;
            border: 2px solid rgba(53, 142, 215, 0.5);
            display: inline-block;
            text-align: center;
            line-height: 16px;
            opacity: 0.5;
            margin-right: 5px;
        }

        /* Product Price */
        .product-price {
            display: flex;
            align-items: center;
        }

        .product-price span {
            font-size: 26px;
            font-weight: 300;
            color: #43474D;
            margin-right: 20px;
        }

        .cart-btn {
            display: inline-block;
            background-color: #7DC855;
            border-radius: 6px;
            font-size: 16px;
            color: #FFFFFF;
            text-decoration: none;
            padding: 12px 30px;
            transition: all .5s;
        }

        .cart-btn:hover {
            background-color: #64af3d;
        }

        /* Responsive */
        @media (max-width: 940px) {
            .container {
                flex-direction: column;
                margin-top: 60px;
            }

            .left-column,
            .right-column {
                width: 100%;
            }

            .left-column img {
                width: 300px;
                right: 0;
                top: -65px;
                left: initial;
            }
        }

        @media (max-width: 535px) {
            .left-column img {
                width: 220px;
                top: -85px;
            }
        }
    </style>
   
    <title>ecommerce </title>
</head>

<body>

    <!-- Start Header/Navigation -->
    <nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

        <div class="container">
            <a class="navbar-brand" href="index.html">MEGA<span>.</span></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsFurni">
                <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0" dir="rtl">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('dashboard.user') }}">الرئيسية</a>
                    </li>
                    <li><a class="nav-link" href="{{ route('shop') }}">المنتجات</a></li>
                    <li><a class="nav-link" href="about.html">من نحن</a></li>
                    {{-- <li><a class="nav-link" href="services.html">Services</a></li> --}}
                    <li><a class="nav-link" href="{{ route('contact')}}">تواصل معنا</a></li>
                    @if (auth('web')->check())
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bx bx-log-out"></i> تسجيل الخروج
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @else
                    <li><a class="nav-link" href="{{ route('login.user') }}">تسجيل الدخول</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">مستخدم جديد</a></li>
                    @endif


                </ul>

                <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                    @if (auth('web')->check())
                    <li>
                        <a class="nav-link" href="#"><img src="{{ asset('assets/web/images/user.svg') }}"></a>
                    </li>
                    @endif
                    <li><a class="nav-link" href="{{ route('cart') }}"><img src="{{ asset('assets/web/images/cart.svg') }}"></a>
                    </li>
                </ul>
            </div>
        </div>

    </nav>

    <main class="container-1">

        <!-- Left Column / Headphones Image -->
        <div class="left-column">
            <img data-image="black" src="{{ asset('assets/web/images/product-1.png') }}" alt="">
            <img data-image="blue" src="images/blue.png" alt="{{ asset('assets/web/images/product-1.png') }}">
            <img data-image="red" class="active" src="{{ asset('assets/web/images/product-1.png') }}" alt="">
        </div>


        <!-- Right Column -->
        <div class="right-column">

            <!-- Product Description -->
            <div class="product-description">
                <span>Headphones</span>
                <h1>Beats EP</h1>
                <p>The preferred choice of a vast range of acclaimed DJs. Punchy, bass-focused sound and high isolation. Sturdy headband and on-ear cushions suitable for live performance</p>
            </div>

            <!-- Product Configuration -->
            <div class="product-configuration">

                <!-- Product Color -->
                <div class="product-color">
                    <span>Color</span>

                    <div class="color-choose">
                        <div>
                            <input data-image="red" type="radio" id="red" name="color" value="red" checked>
                            <label for="red"><span></span></label>
                        </div>
                        <div>
                            <input data-image="blue" type="radio" id="blue" name="color" value="blue">
                            <label for="blue"><span></span></label>
                        </div>
                        <div>
                            <input data-image="black" type="radio" id="black" name="color" value="black">
                            <label for="black"><span></span></label>
                        </div>
                    </div>

                </div>

                <!-- Cable Configuration -->
                <div class="cable-config">
                    <span>Cable configuration</span>

                    <div class="cable-choose">
                        <button>Straight</button>
                        <button>Coiled</button>
                        <button>Long-coiled</button>
                    </div>

                    <a href="#">How to configurate your headphones</a>
                </div>
            </div>

            <!-- Product Pricing -->
            <div class="product-price">
                <span>148$</span>
                <a href="#" class="cart-btn">Add to cart</a>
            </div>
        </div>
    </main>


    <!-- Start Footer Section -->
    <footer class="footer-section" >
        <div class="container relative">


            <div class="row g-5 mb-5">
                <div class="col-lg-4">
                    <div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Furni<span>.</span></a>
                    </div>
                    <p class="mb-4">Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus
                        malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.
                        Pellentesque habitant</p>

                    <ul class="list-unstyled custom-social">
                        <li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
                    </ul>
                </div>

                <div class="col-lg-8">
                    <div class="row links-wrap">
                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Services</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Contact us</a></li>
                            </ul>
                        </div>

                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="#">Support</a></li>
                                <li><a href="#">Knowledge base</a></li>
                                <li><a href="#">Live chat</a></li>
                            </ul>
                        </div>

                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="#">Jobs</a></li>
                                <li><a href="#">Our team</a></li>
                                <li><a href="#">Leadership</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>

                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="#">Nordic Chair</a></li>
                                <li><a href="#">Kruzo Aero</a></li>
                                <li><a href="#">Ergonomic Chair</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            <div class="border-top copyright">
                <div class="row pt-4">
                    <div class="col-lg-6">
                        <p class="mb-2 text-center text-lg-start">Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a> Distributed By <a hreff="https://themewagon.com">ThemeWagon</a>
                            <!-- License information: https://untree.co/license/ -->
                        </p>
                    </div>

                    <div class="col-lg-6 text-center text-lg-end">
                        <ul class="list-unstyled d-inline-flex ms-auto">
                            <li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>
    </footer>
    <!-- End Footer Section -->


    <script src="{{ asset('assets/web/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/web/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('assets/web/js/custom.js') }}"></script>
  
</body>

</html>