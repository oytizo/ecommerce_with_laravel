@extends('layouts.adminlayout')

@section('body')

<div class="d-flex align-items-center justify-content-center ht-100v">
    <video id="headVideo" class="pos-absolute a-0 wd-100p ht-100p object-fit-cover" autoplay muted loop>
        <source src="{{ asset('backend/videos/video1.mp4') }}" type="video/mp4">
        <source src="{{ asset('backend/videos/video1.ogv') }}" type="video/ogg">
        <source src="{{ asset('backend/videos/video1.webm') }}" type="video/webm">
    </video><!-- /video -->
    <div class="overlay-body bg-black-7 d-flex align-items-center justify-content-center">
        <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 rounded bg-black-6">
            <div class="signin-logo tx-center tx-28 tx-bold tx-white"><span class="tx-normal">[</span> bracket <span class="tx-info">plus</span> <span class="tx-normal">]</span></div>
            <div class="tx-white-5 tx-center mg-b-60">The Admin Template For Perfectionist</div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('submitpassword') }}">
                @csrf

                <!-- Email Address -->

                <!-- Password -->
                <div class="form-group">
                    <input value="{{ $user->name }}" id="fname" class="form-control form-control fc-outline-dark" placeholder="Enter Password" type="hidden" name="fname" required autocomplete="current-password" />
                </div>
                <div class="form-group">
                    <input value="{{ $user->name }}" id="name" class="form-control form-control fc-outline-dark" placeholder="Enter Password" type="hidden" name="name" required autocomplete="current-password" />
                </div>
                <div class="form-group">
                    <input value="{{ $user->email }}" id="email" class="form-control form-control fc-outline-dark" placeholder="Enter Password" type="hidden" name="email" required autocomplete="current-password" />
                </div>
                <div class="form-group">
                    <input value="{{ $user->id }}" id="user_id" class="form-control form-control fc-outline-dark" placeholder="Enter Password" type="hidden" name="user_id" required autocomplete="current-password" />
                </div>
                <div class="form-group">
                    <input id="password" class="form-control form-control fc-outline-dark" placeholder="Enter confirm Password" type="password" name="password" required autocomplete="current-password" />
                </div>
                <div class="form-group">
                    <input id="cpassword" class="form-control form-control fc-outline-dark" placeholder="Enter confirm Password" type="password" name="cpassword" required autocomplete="current-password" />
                </div>

                <!-- Remember Me -->
                    <button type="submit" class="btn btn-info btn-block">Submit</button>
            </form>

            <div class="mg-t-60 tx-center">Not yet a member? <a href="{{ Route('register') }}" class="tx-info">Sign Up</a></div>
        </div><!-- login-wrapper -->
    </div><!-- overlay-body -->
</div><!-- d-flex -->

@endsection