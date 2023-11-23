<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title') @ Laravel+Firebase || (č)vadym4che</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@200;300;400;500;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>

            html {
                --black: #131315;
                --gray: #797979;
                --white: #fffafb;

                --pink: #FF4E6B;
                --pink-a: #FF4E6B29;
                --gold: #FFBB33;
                --gold-a: #FFBB3329;
                --green: #00CC66;
                --green-a: #00CC6629;
                --blue: #4DB4FF;
                --blue-a: #4DB4FF29;
            }

            .overlay {
                background: rgba(255, 250, 251, 0.20);
                backdrop-filter: blur(2px);
            }

            * {
                box-sizing: border-box;
                line-height: 100%;
            }

            body {
                background-color: var(--black);
                color: var(--white);
                font-family: 'Lexend', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                overflow: hidden;
            }


            @media (min-width: 821px) {
                body {
                    padding: 0 9.75rem;
                }
            }


            @media (max-width: 820px) {
                body {
                    padding: 0 4rem;
                }
            }


            @media (max-width: 768px) {
                body {
                    padding: 0 2rem;
                }
            }

            @media (max-width: 480px) {
                body {
                    padding: 0 1rem;
                }
            }

            hr {
                width: 100% !important;
                min-width: 100% !important;
                border-color: var(--pink-a);
                border-bottom: none;
                margin: -1px 0 0;
                padding: 0;
            }

            h1 {
                margin: 0;
                padding: 0;
            }

            h2.title {
                text-align: left;
                padding: 0;
                margin: 2.5rem 0 1rem;
                font-size: 2.5rem;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .flex-between {
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            .flex-column {
                flex-direction: column;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .fixed-top,
            .fixed-bottom {
                position: relative;
                width: 100%;
            }

            .fixed-top {
                top: 0;
            }

            .fixed-bottom {
                bottom: 0;
            }

            .content {
                width: 100%;
                flex-grow: 1;
            }

            .header > menu,
            .footer > ul {
                list-style: none;
                margin: 0;
                padding: 0;
            }

            @media (max-width: 1199px) {
                .header > menu {
                    gap: 4rem;
                }
            }

            /* @media (max-width: 949px) {
                .header > menu {
                    gap: 0.5rem;
                }
            }

            @media (min-width: 950px) and (max-width: 1019px) {
                .header > menu {
                    gap: 1rem;
                }
            }

            @media (min-width: 1020px) and (max-width: 1076px) {
                .header > menu {
                    gap: 2rem;
                }
            }

            @media (min-width: 1077px) and (max-width: 1132px) {
                .header > menu {
                    gap: 3rem;
                }
            }

            @media (min-width: 1133px) and (max-width: 1199px) {
                .header > menu {
                    gap: 4rem;
                }
            } */

            @media (min-width: 1200px) {
                .header > menu {
                    gap: 5rem;
                }
            }

            .footer > ul {
                width: 22.5rem;
            }


            li {
                margin: 0;
                padding: 0;
            }

            a {
                display: inline-flex;
                align-items: center;
                justify-content: center;

                color: var(--white);
                font-size: 1.25rem;
                line-height: 1.25rem;
                font-weight: 200;
                text-decoration: none;
                transition: all 0.5s;

                padding: 1.5rem 0;
            }

            .header a {
                font-size: 1.25rem;
            }

            .header a {
                font-size: 1rem;
            }

            a:hover {
                background-color: #fff;
                color: #636b6f;
                position: relative;
                transform: scaleY(1.02);
            }

            a.active {
                border-bottom: 1px solid var(--pink);
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .logo {
                font-size: 2rem;
                font-weight: 600;
                color: var(--pink);
                position: relative;
                padding-top: 1.5rem;
            }

            .header > .logo {
                align-self: flex-start;
                font-size: 1.5rem;
            }

            .copyright {
                margin: 0;
                padding: 0 0 1.5rem;
                font-weight: 200;
                color: var(--gray);
            }
        </style>
    </head>
    <body>
        <div class="flex-center flex-column position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <header class="header fixed-top flex-between">
                <h1 class="logo">LOGO</h1>
                <menu class="flex-between">
                    <li><a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Main</a></li>
                    <li><a href="{{ url('events') }}" class="{{ request()->is('events') ? 'active' : '' }}">Events</a></li>
                    <li><a href="{{ url('calendar') }}" class="{{ request()->is('calendar') ? 'active' : '' }}">Calendar</a></li>
                    <li><a href="{{ url('faq') }}" class="{{ request()->is('faq') ? 'active' : '' }}">FAQ</a></li>
                </menu>
            </header>

            <hr />

            <div class="content">
                @yield('content')
            </div>

            <hr />

            <footer class="footer fixed-bottom flex-center flex-column">
                <div class="logo">LOGO</div>
                <ul class="flex-between">
                    <li><a href="{{ url('/') }}" >Main</a></li>
                    <li><a href="{{ url('events') }}" >Events</a></li>
                    <li><a href="{{ url('calendar') }}" >Calendar</a></li>
                    <li><a href="{{ url('faq') }}" >FAQ</a></li>
                </ul>

                <p class="copyright">
                    © 2023 All rights reserved
                </p>
            </footer>
        </div>
    </body>
</html>
