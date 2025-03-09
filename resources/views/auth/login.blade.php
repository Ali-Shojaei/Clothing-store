@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-8 col-lg-5">
            <div class="card border-0 bg-white rounded-4 shadow-sm">
                <div class="card-body p-4">
                    <!-- عنوان -->
                    <h4 class="text-center mb-4" style="font-family: 'Vazir'; color: #2d3436;">
                        ورود به حساب کاربری
                    </h4>

                    <!-- فرم اصلی -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- ایمیل -->
                        <div class="mb-3">
                            <input type="email" 
                                class="form-control rounded-3 py-2 @error('email') is-invalid @enderror"
                                placeholder="ایمیل خود را وارد کنید..."
                                name="email"
                                style="font-family: 'Vazir'; background-color: #f8f9fa; border: 1px solid #e0e0e0;">
                        </div>

                        <!-- رمز عبور -->
                        <div class="mb-4">
                            <input type="password" 
                                class="form-control rounded-3 py-2 @error('password') is-invalid @enderror"
                                placeholder="رمز عبور خود را وارد کنید..."
                                name="password"
                                style="font-family: 'Vazir'; background-color: #f8f9fa; border: 1px solid #e0e0e0;">
                        </div>

                        <!-- دکمه ورود -->
                        <button type="submit" 
                            class="btn btn-primary w-100 rounded-3 py-2 mb-3"
                            style="font-family: 'Vazir'; background: #0984e3; border: none; font-size: 0.95rem;">
                            ادامه
                        </button>

                        <!-- ورود با گوگل (بدون لوگو) -->
                        <a href="{{ route('redirectToGoogle') }}" 
                            class="btn btn-light w-100 rounded-3 py-2 mb-3 text-dark"
                            style="font-family: 'Vazir'; border: 1px solid #ddd; font-size: 0.95rem;">
                            ورود با حساب گوگل
                        </a>

                        <!-- لینک های پایینی -->
                        <div class="text-center mt-3">
                            <a href="{{ route('password.request') }}" 
                                class="text-decoration-none" 
                                style="font-family: 'Vazir'; color: #636e72; font-size: 0.9rem;">
                                بازیابی رمز عبور
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        background: #dbd7d7c0 !important;
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