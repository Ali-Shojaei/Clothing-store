@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-8 col-lg-5">
            <div class="card border-0 bg-white rounded-4 shadow-sm">
                <div class="card-body p-4">
                    <h4 class="text-center mb-4" style="font-family: 'Vazir'; color: #2d3436;">
                        تأیید رمز عبور
                    </h4>

                    <p class="text-muted mb-4 text-center" style="font-family: 'Vazir';">
                        لطفا قبل از ادامه، رمز عبور خود را تأیید کنید
                    </p>

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <!-- فیلد رمز عبور -->
                        <div class="mb-4">
                            <input type="password" 
                                class="form-control rounded-3 py-2 @error('password') is-invalid @enderror"
                                placeholder="رمز عبور فعلی"
                                name="password"
                                style="font-family: 'Vazir'; background-color: #f8f9fa; border: 1px solid #e0e0e0;">
                            @error('password')
                                <small class="text-danger ps-2" style="font-family: 'Vazir'">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- دکمه تأیید -->
                        <button type="submit" 
                            class="btn btn-primary w-100 rounded-3 py-2 mb-3"
                            style="font-family: 'Vazir'; background: #0984e3; border: none; font-size: 0.95rem;">
                            تأیید هویت
                        </button>

                        <!-- لینک بازیابی رمز -->
                        @if (Route::has('password.request'))
                            <div class="text-center">
                                <a href="{{ route('password.request') }}" 
                                    class="text-decoration-none" 
                                    style="font-family: 'Vazir'; color: #636e72; font-size: 0.9rem;">
                                    رمز عبور خود را فراموش کرده‌اید؟
                                </a>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        background: #ffffff !important;
    }
    .min-vh-100 {
        min-height: 100vh;
    }
    .rounded-4 {
        border-radius: 1rem;
    }
    .form-control:focus {
        box-shadow: 0 0 0 2px rgba(9, 132, 227, 0.2);
        border-color: #0984e3;
    }
</style>
@endsection