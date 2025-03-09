@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-8 col-lg-5">
            <div class="card border-0 bg-white rounded-4 shadow-sm">
                <div class="card-body p-4">
                    <h4 class="text-center mb-4" style="font-family: 'Vazir'; color: #2d3436;">
                        تنظیم مجدد رمز عبور
                    </h4>

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <!-- ایمیل -->
                        <div class="mb-3">
                            <input type="email" 
                                class="form-control rounded-3 py-2 @error('email') is-invalid @enderror"
                                placeholder="ایمیل خود را وارد کنید..."
                                name="email"
                                value="{{ $email ?? old('email') }}"
                                style="font-family: 'Vazir'; background-color: #f8f9fa; border: 1px solid #e0e0e0;">
                            @error('email')
                                <small class="text-danger ps-2" style="font-family: 'Vazir'">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- رمز جدید -->
                        <div class="mb-3">
                            <input type="password" 
                                class="form-control rounded-3 py-2 @error('password') is-invalid @enderror"
                                placeholder="رمز عبور جدید"
                                name="password"
                                style="font-family: 'Vazir'; background-color: #f8f9fa; border: 1px solid #e0e0e0;">
                            @error('password')
                                <small class="text-danger ps-2" style="font-family: 'Vazir'">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- تکرار رمز -->
                        <div class="mb-4">
                            <input type="password" 
                                class="form-control rounded-3 py-2"
                                placeholder="تکرار رمز عبور"
                                name="password_confirmation"
                                style="font-family: 'Vazir'; background-color: #f8f9fa; border: 1px solid #e0e0e0;">
                        </div>

                        <!-- دکمه ارسال -->
                        <button type="submit" 
                            class="btn btn-primary w-100 rounded-3 py-2"
                            style="font-family: 'Vazir'; background: #0984e3; border: none; font-size: 0.95rem;">
                            بروزرسانی رمز عبور
                        </button>
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