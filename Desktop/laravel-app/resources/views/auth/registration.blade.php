@extends('admin.header')

<body class="bg-gradient-primary">

    <div class="container">


        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            @if(Session::has('message'))
                            <p class="success {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                            @endif
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form action="{{ route('register-submit') }}" method="post" class="user">
                                @csrf

                                <div class="form-group row">
                                    <input type="text" name="name" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name">
                                    <font style="color: red">
                                        {{ ($errors->has('name'))?($errors->first('name')):'' }}
                                    </font>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
                                    <font style="color: red">
                                        {{ ($errors->has('email'))?($errors->first('email')):'' }}
                                    </font>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                        <font style="color: red">
                                            {{ ($errors->has('password'))?($errors->first('password')):'' }}
                                        </font>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="password_confirmation" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password">
                                        <font style="color: red">
                                            {{ ($errors->has('password_confirmation'))?($errors->first('password_confirmation')):'' }}
                                        </font>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                                <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="{{ url('login') }}">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @extends('admin.footer')