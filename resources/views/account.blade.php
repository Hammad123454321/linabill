@extends('main_layout')


@section('main_contant')

<!-- ========================= Breadcrumb Start =============================== -->
<div class="breadcrumb py-26 bg-main-two-50">
    <div class="container container-lg">
        <div class="breadcrumb-wrapper flex-between flex-wrap gap-16">
            <h6 class="mb-0">My Account</h6>
            <ul class="flex-align gap-8 flex-wrap">
                <li class="text-sm">
                    <a href="index.html" class="text-gray-900 flex-align gap-8 hover-text-main-600">
                        <i class="ph ph-house"></i>
                        Home
                    </a>
                </li>
                <li class="flex-align">
                    <i class="ph ph-caret-right"></i>
                </li>
                <li class="text-sm text-main-600"> Account </li>
            </ul>
        </div>
    </div>
</div>
<!-- ========================= Breadcrumb End =============================== -->

<!-- =============================== Account Section Start =========================== -->
 <section class="account py-80">
    <div class="container container-lg">
        
            <div class="row gy-4">

                <!-- Login Card Start -->
                <div class="col-xl-6 pe-xl-5">
                    <form method="POST" action="{{ route('login') }}">
                    <div class="border border-gray-100 hover-border-main-600 transition-1 rounded-16 px-24 py-40 h-100">
                        <h6 class="text-xl mb-32">Login</h6>
                        <div class="mb-24">
                            <label for="username" class="text-neutral-900 text-lg mb-8 fw-medium">Username or email address <span class="text-danger">*</span> </label>
                            <input type="text" class="common-input" name="email" id="username" placeholder="Email">
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-24">
                            <label for="password" class="text-neutral-900 text-lg mb-8 fw-medium">Password</label>
                            <div class="position-relative">
                                <input type="password" class="common-input" name="password" id="password" placeholder="Enter Password" value="password">
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="mb-24 mt-48">
                            <div class="flex-align gap-48 flex-wrap">
                                <button type="submit" class="btn btn-main py-18 px-40">Log in</button>
                                <div class="form-check common-check">
                                    <input class="form-check-input" type="checkbox" value="" id="remember">
                                    <label class="form-check-label flex-grow-1" for="remember">Remember me</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-48">
                            <a href="#" class="text-danger-600 text-sm fw-semibold hover-text-decoration-underline">Forgot your password?</a>
                        </div>
                    </div>
                    </form>
                </div>
                <!-- Login Card End -->

            
            

                <!-- Register Card Start -->
                <div class="col-xl-6">
                    <form method="POST" action="{{ route('register') }}">
                    <div class="border border-gray-100 hover-border-main-600 transition-1 rounded-16 px-24 py-40">
                        <h6 class="text-xl mb-32">Register</h6>
                        <div class="mb-24">
                            <label for="usernameTwo" class="text-neutral-900 text-lg mb-8 fw-medium">Username <span class="text-danger">*</span> </label>
                            <input type="text" class="common-input" name="name" id="usernameTwo" placeholder="Write a username">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-24">
                            <label for="emailTwo" class="text-neutral-900 text-lg mb-8 fw-medium">Email address <span class="text-danger">*</span> </label>
                            <input type="email" name="email" class="common-input" id="emailTwo" placeholder="Enter Email Address">
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-24">
                            <label for="enter-password" class="text-neutral-900 text-lg mb-8 fw-medium">Password <span class="text-danger">*</span></label>
                            <div class="position-relative">
                                <input type="password" name="password" class="common-input" id="enter-password" placeholder="Enter Password" value="password">
                                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="my-48">
                            <p class="text-gray-500">Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our 
                                <a href="#" class="text-main-600 text-decoration-underline"> privacy policy</a>
                            .</p>
                        </div>
                        <div class="mt-48">
                            <button type="submit" class="btn btn-main py-18 px-40">Register</button>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- Register Card End -->

            </div>
        
    </div>
 </section>
<!-- =============================== Account Section End =========================== -->

@endsection


@section('script')

@endsection