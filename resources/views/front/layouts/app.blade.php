<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
        <!-- Styles -->
      @vite(['resources/sass/app.scss','resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-light">
        @include('front.layouts.navigation')

        <!-- Page Heading -->
        <header class="d-flex py-3 bg-light shadow-sm border-bottom">
            <div class="container">
                @yield('header')
            </div>
            <ul class="navbar-nav" style="margin-right:30px;">
                <!-- Settings Dropdown -->
                @auth
                    <nav-dropdown id="settingsDropdown">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class='nav-link dropdown-toggle' role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                        <div class="dropdown-menu dropdown-menu-end animate slideIn" aria-labelledby="navbarDropdown">
                            <!-- Authentication -->
                            <a href="{{route('profile.edit')}}" class="dropdown-item px-4">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                {{ __('profile') }}
                            </a>
                            <a href="{{route('change.password')}}" class="dropdown-item px-4">
                                <i class="fa fa-refresh" aria-hidden="true"></i>
                                {{ __('Chage Password') }}
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="route('logout')" class="dropdown-item px-4"
                                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                   <i class="fa fa-sign-out" aria-hidden="true"></i>
                                   {{ __('Log Out') }}
                            </a>
                            </form>
                        </div>
                    </li>
                    </nav-dropdown>
                @endauth
            </ul>
        </header>

        <!-- Page Content -->
        <main class="container my-5">
            @yield('content')
        </main>
        <div class="footer d-flex justify-content-center ">
            <div class="w-row">
                <div class="w-col w-col-6">
                    <div class="hint">© Copyright outreachbird. All rights reserved</div>
                </div>
                <div class="footer-right w-col w-col-6"></div>
            </div>
        </div>
        @stack('script')
    </body>
</html>
