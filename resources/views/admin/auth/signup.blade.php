@extends('admin.layouts.master2')
@section('css')
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
                                    <div class="mb-5 d-flex"> <a href="{{ url('/' . ($page = 'index')) }}"><img
                                                src="{{ URL::asset('assets/admin/img/brand/favicon.png') }}"
                                                class="sign-favicon ht-40" alt="logo"></a>
                                        <h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Va<span>le</span>x</h1>
                                    </div>
                                    <div class="main-signup-header">
                                        <h2 class="text-primary">Get Started</h2>
                                        <h5 class="font-weight-normal mb-4">It's free to signup and only takes a minute.
                                        </h5>
                                        <form method="POST" action="{{ route('register') }}" autocomplete="off">
                                            @csrf
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input class="form-control" value="{{ old('name') }}" name="name"
                                                autocomplete="off" aria-autocomplete="none" placeholder="Enter your name" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control" value="{{ old('email') }}" name="email"
                                                autocomplete="off" aria-autocomplete="none"   placeholder="Enter your email" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input class="form-control" value="{{ old('phone') }}" name="phone"
                                                    placeholder="Enter your phone" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label>Choose Your Birth date</label>
                                                <input class="form-control" value="{{ old('birth_date') }}"
                                                    name="birth_date" placeholder="Enter your birth date" type="date">
                                            </div>

                                            <div class="form-group">
                                                <label>Password</label>
                                                <input class="form-control" placeholder="Enter your password"
                                                autocomplete="off" aria-autocomplete="none"  name="password" type="password">
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input class="form-control" placeholder="Confirm your password"
                                                    name="password_confirmation" type="password">
                                            </div>
                                            <button type="submit" class="btn btn-main-primary btn-block">Create Account</button>
                                            <div class="row row-xs">
                                                <div class="col-sm-6">
                                                    <button class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup
                                                        with Facebook</button>
                                                </div>
                                                <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                    <button class="btn btn-info btn-block"><i class="fab fa-twitter"></i>
                                                        Signup with Twitter</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="main-signup-footer mt-5">
                                            <p>Already have an account? <a href="{{ url('/' . ($page = 'signin')) }}">Sign
                                                    In</a></p>
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
@endsection