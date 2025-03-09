@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-8 col-lg-5">
            <div class="card border-0 bg-white rounded-4 shadow-sm">
                <div class="card-body p-4">
                    <!-- عنوان -->
                    <h4 class="text-center mb-4" style="font-family: 'Vazir'; color: #2d3436;">
                        بازیابی رمز عبور
                    </h4>

                    <!-- اعلان وضعیت -->
                    @if (session('status'))
                        <div class="alert alert-success rounded-3 py-2 mb-4" 
                            style="font-family: 'Vazir'; background: #e3f8ef; border-color: #c3e6cb; color: #155724;">
                            لینک بازیابی به ایمیل شما ارسال شد
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <!-- فیلد ایمیل -->
                        <div class="mb-4">
                            <input type="email" 
                                class="form-control rounded-3 py-2 @error('email') is-invalid @enderror"
                                placeholder="ایمیل خود را وارد کنید..."
                                name="email"
                                value="{{ old('email') }}"
                                style="font-family: 'Vazir'; background-color: #f8f9fa; border: 1px solid #e0e0e0;">
                            @error('email')
                                <small class="text-danger ps-2" style="font-family: 'Vazir'">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- دکمه ارسال -->
                        <button type="submit" 
                            class="btn btn-primary w-100 rounded-3 py-2"
                            style="font-family: 'Vazir'; background: #0984e3; border: none; font-size: 0.95rem;">
                            ارسال لینک بازیابی
                        </button>

                        <!-- لینک بازگشت -->
                        <div class="text-center mt-4">
                            <a href="{{ route('login') }}" 
                                class="text-decoration-none" 
                                style="font-family: 'Vazir'; color: #636e72; font-size: 0.9rem;">
                                بازگشت به صفحه ورود
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