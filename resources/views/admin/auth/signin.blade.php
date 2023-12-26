@extends('admin.layouts.master2')
@section('css')
    <style>
        .loginform {
            display: none;
        }

        .fade-out {
            opacity: 0;
            transition: opacity 0.5s ease-out;
        }
    </style>
    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{ URL::asset('assets/admin/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css') }}"
        rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                <div class="row wd-100p mx-auto text-center">
                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                        <img src="{{ URL::asset('assets/admin/img/media/login.png') }}"
                            class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                    </div>
                </div>
            </div>
            <!-- The content half -->
            <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin">
                                    <div class="mb-5 d-flex"> <a href="{{ url('/') }}"><img
                                                src="{{ URL::asset('assets/admin/img/brand/favicon.png') }}"
                                                class="sign-favicon ht-40" alt="logo"></a>
                                        <h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Va<span>le</span>x</h1>
                                    </div>
                                    <div class="card-sigin">
                                        <div class="main-signup-header">
                                            <h2>اهلا بك مجددا</h2>

                                            @if ($errors->any())
                                                <div id="error-message" class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            <div class="form-group">
                                                <label for="select">اختر طريقة التسجيل</label>
                                                <select id="select" class="form-control">
                                                    <option value="" selected disabled>
                                                        اختر الطريقة
                                                    </option>
                                                    <option value="user"> الدخول كمستخدم </option>
                                                    <option value="admin">الدخول ك ادمن  </option>
                                                </select>
                                            </div>

                                            <div class="loginform" id="user">

                                                <h5 class="font-weight-semibold mb-4">الدخول كمستخدم</h5>
                                                <form method="POST" action="{{ route('login.user') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>البريد الإلكتروني</label>
                                                        <input class="form-control" placeholder="إدخل البريد الإلكتروني"
                                                            type="email" name="email" :value="old('email')" required
                                                            autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>الرقم السري</label>
                                                        <input class="form-control" placeholder="إدخل الرقم السري"
                                                            type="password" name="password" required
                                                            autocomplete="current-password">
                                                    </div>
                                                    <button type="submit" class="btn btn-main-primary btn-block">
                                                        تسجيل الدخول
                                                    </button>
                                                    <div class="row row-xs">
                                                        <div class="col-sm-6">
                                                            <button class="btn btn-block"><i class="fab fa-facebook-f"></i>
                                                                التسجيل بالفيس بوك</button>
                                                        </div>
                                                        <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                            <button class="btn btn-info btn-block"><i
                                                                    class="fab fa-twitter"></i> التسجيل بتويتر</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="main-signin-footer mt-5">
                                                    <p><a href="">هل نسيت الرقم السري ؟</a></p>
                                                    <p> ليس لديك  حساب  ! <a
                                                            href="{{ route('register') }}">
                                                            إنشاء حساب جديد
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="loginform" id="admin">

                                                <h5 class="font-weight-semibold mb-4">تسجيل الدخول كمستخدم</h5>
                                                <form method="POST" action="{{ route('login.admin') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>البريد الإلكتروني</label>
                                                        <input class="form-control" placeholder="إدخل البريد الإلكتروني"
                                                            type="email" name="email" :value="old('email')" required
                                                            autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>الرقم السري</label>
                                                        <input class="form-control" placeholder="إدخل الرقم السري"
                                                            type="password" name="password" required
                                                            autocomplete="current-password">
                                                    </div>
                                                    <button type="submit" class="btn btn-main-primary btn-block">
                                                        تسجيل الدخول
                                                    </button>
                                                   
                                                </form>
                                               
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('#select').change(function() {
            var myID = $(this).val();
            $('.loginform').each(function() {
                myID === $(this).attr('id') ? $(this).show() : $(this).hide();
            })
        })

        setTimeout(function() {
            var errorElement = document.getElementById('error-message');
            if (errorElement) {
                errorElement.classList.add('fade-out');
                setTimeout(function() {
                    errorElement.style.display = 'none';
                }, 500); // Adjust the time in milliseconds for the fade-out transition duration
            }
        }, 3000); // Adjust the time in milliseconds before the error message starts to fade out
    </script>
@endsection
