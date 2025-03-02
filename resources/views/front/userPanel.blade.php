<!DOCTYPE html>
<html dir="rtl" class="dark">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <style>
        .account-section {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 1.5rem;
            max-width: 400px;
            margin: 20px auto;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .profile-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .avatar {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: #279442;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            color: #2196f3;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .user-info {
            flex-grow: 1;
        }

        .user-name {
            font-size: 1.3rem;
            margin: 0;
            color: #8d8282;
            font-weight: 600;
            
        }

        .user-email {
            color: #666;
            margin: 0.3rem 0;
            font-size: 0.9rem;
        }

        .join-date {
            color: #888;
            font-size: 0.85rem;
            margin-bottom: 1.5rem;
        }

        .logout-btn {
            width: 100%;
            padding: 0.8rem;
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        .logout-btn:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900 min-h-screen">
    <header class="bg-white dark:bg-gray-800 shadow-sm">
        <div class="container mx-auto px-4 py-4 flex items-center justify-between">
            <h1 style="font-family: vazir;" class="text-xl font-bold text-gray-800 dark:text-white">حساب کاربری</h1>
            <nav class="flex gap-4">
                <a href="{{ route('home1') }}" class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 no-underline flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                    </svg>
                    بازگشت
                </a>
                {{-- <a href="{{route('home1')}}" class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 no-underline">خانه</a> --}}
            </nav>
        </div>
    </header>
    <div  class="account-section bg-gray-50 dark:bg-gray-900">
        
        <div class="profile-header">
            
            <div class="avatar"></div>
            
            <div class="user-info">
                @if (Auth::check())
                <h2 class="user-name">{{ Auth::user()->name }}</h2>
                <p class="user-email">{{ Auth::user()->email }}</p>
                <p style="color: #2196f3;">online</p>
                @endif
                
            </div>
        </div>
        @if (Auth::check())
        <p class="join-date">تاریخ عضویت: {{ Auth::user()->created_at}}</p>
        @endif
        
        <a href="{{ route('logout') }}"><button class="logout-btn">خروج از حساب کاربری</button></a>
        
    </div>
    <!-- Dark Mode Toggle -->
    <div class="fixed bottom-4 left-4">
        <button id="togglebtn" class="p-2 rounded-full bg-white dark:bg-gray-800 shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800 dark:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
            </svg>
        </button>       
    </div>
    <script src="./app.js"></script>
</body>
</html>