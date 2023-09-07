<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="ColtriCat">
        <meta name="generator" content="ColtriCat">
        <title>Tommify</title>

{{--        @vite(['resources/css/app.css', 'resources/js/app.js'])--}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }

            .b-example-divider {
                width: 100%;
                height: 3rem;
                background-color: rgba(0, 0, 0, .1);
                border: solid rgba(0, 0, 0, .15);
                border-width: 1px 0;
                box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
            }

            .b-example-vr {
                flex-shrink: 0;
                width: 1.5rem;
                height: 100vh;
            }

            .bi {
                vertical-align: -.125em;
                fill: currentColor;
            }

            .nav-scroller {
                position: relative;
                z-index: 2;
                height: 2.75rem;
                overflow-y: hidden;
            }

            .nav-scroller .nav {
                display: flex;
                flex-wrap: nowrap;
                padding-bottom: 1rem;
                margin-top: -1px;
                overflow-x: auto;
                text-align: center;
                white-space: nowrap;
                -webkit-overflow-scrolling: touch;
            }

            .btn-bd-primary {
                --bd-violet-bg: #712cf9;
                --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

                --bs-btn-font-weight: 600;
                --bs-btn-color: var(--bs-white);
                --bs-btn-bg: var(--bd-violet-bg);
                --bs-btn-border-color: var(--bd-violet-bg);
                --bs-btn-hover-color: var(--bs-white);
                --bs-btn-hover-bg: #6528e0;
                --bs-btn-hover-border-color: #6528e0;
                --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
                --bs-btn-active-color: var(--bs-btn-hover-color);
                --bs-btn-active-bg: #5a23c8;
                --bs-btn-active-border-color: #5a23c8;
            }
            .bd-mode-toggle {
                z-index: 1500;
            }

            body {
                min-height: 40rem;
                padding-top: 4.5rem;
                background: #1f2937;
            }
        </style>

        @yield('head')

    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Fixed navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        @guest
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('home')}}" wire:navigate>Home</a>
                        </li>
                        @endguest

                        @auth
                            @if(auth()->user()->isAdmin())
                                @include('components.layouts.menuAdmin')
                            @endif
                            @if(auth()->user()->isArtist())
                                @include('components.layouts.menuArtist')
                            @endif
                            @if(auth()->user()->isUser())
                                @include('components.layouts.menuUser')
                            @endif
                        @endauth
                    </ul>
                    @auth
                        <li class="nav-item dropdown" style="transform: translateY(-10px)">
                            <a class="nav-link dropdown-toggle text-white"
                               data-bs-toggle="dropdown"
                               href="#" role="button"
                               aria-expanded="false">
                                {{auth()->user()->name}}
                            </a>
                            <ul class="dropdown-menu" style="transform: translateX(-90px)">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                <li ><a class="dropdown-item" href="{{route('logout')}}"
                                       onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                    >Logout</a></li>
                                </form>
                            </ul>
                        </li>
                    @else
                        <div class="d-flex">
                            <li class="nav-item text-white" style="list-style: none; margin-right: 10px">
                                <a href="{{'login'}}" class="nav-link" aria-disabled="true">Login</a>
                            </li>
                            <li class="nav-item text-white" style="list-style: none">
                                <a href="{{'register'}}" class="nav-link" aria-disabled="true">Register</a>
                            </li>
                        </div>
                    @endauth
                </div>
            </div>
        </nav>

        <main class="container">
            <div class="bg-body-tertiary p-5 mt-3 rounded">
                {{ $slot }}
            </div>
        </main>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        @yield('foot')
    </body>
</html>
