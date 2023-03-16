<!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="{{ $desc }}">
    {{-- <meta name="keywords" content="Anime, unica, creative, html"> --}}
    <meta name="keywords" content="{{ $meta_keys }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ $title }}</title>


    <!-- Google Font -->
    <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'"
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'"
        href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <!-- Css Styles -->
    {{-- <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet"> --}}
    <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    {{-- <!-- Css Styles --><link href="{{ url('css/font-awesome.min.css') }}" rel="stylesheet"> --}}
    <!-- Css Styles -->
    <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'"
        href="{{ url('css/elegant-icons.css') }}" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="{{ url('css/plyr.css') }}"
        rel="stylesheet">
    <!-- Css Styles -->
    <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'"
        href="{{ url('css/nice-select.css') }}" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'"
        href="{{ url('css/nice-select.css') }}" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'"
        href="{{ url('css/owl.carousel.min.css') }}" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'"
        href="{{ url('css/slicknav.min.css') }}" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'"
        href="{{ url('css/style.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/plyr.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css"> --}}
</head>
<?php
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$current_url = explode('?', $_SERVER['REQUEST_URI']);
$myString = $current_url[0];

$strArray = explode('/', $myString);
$name = $strArray[1];

// echo $name;
if ($current_url[0] != '/anime-filter') {
    # code...
    Session::forget('search');
} elseif ($name != 'Watch-Anime') {
    Session::forget('episode');
}

?>
<style>
    .breadcrumb__links a:after {
        position: absolute;
        right: -14px;
        top: 0;
        content: "\1F83A";
        font-size: 17px;
        font-family: "FontAwesome";
    }

    /* width */
    ::-webkit-scrollbar {
        width: 5px;
    }


    body {
        overflow-x: hidden
    }

    /* Track */
    ::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px grey;
        border-radius: 7px;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #E53637;
        border-radius: 10px;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #b30000;
    }
   .header__menu > ul > li a {
  text-decoration: none;
}
</style>

<body>
    <!-- Page Preloder -->
    {{-- <div id="preloder">
        <div class="loader"></div>
    </div> --}}


    {{-- {{$abc}} --}}

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="/">
                            <img src="{{ Storage::url('img/logo.png') }}" alt="">
                        </a>


                    </div>

                </div>
                <div class="col-lg-10">
                    <div class="header__nav">
                        {{-- {{$keys}} --}}

                        <nav class="header__menu mobile-menu" style="font-size: 1.1rem">
                            <style>
                                .dropdown>li:hover {
                                    background-color: #b3adad;
                                }
                            </style>

                            <ul>
                                <li class="active"><a href="{{ url('/') }}">Homepage</a></li>
                                <li><a data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                                        aria-controls="offcanvasExample">GENERE <i class="fa fa-arrow-down"
                                            aria-hidden="true"></i></a>


                                    {{-- <ul class="dropdown ">
                                        @foreach ($category as $cat)
                                            <li><a class="dropdown-item"
                                                    href="{{ url('/') }}/category/{{ $cat->add_anime_title }}">{{ $cat->add_anime_title }}</a>
                                            </li>
                                        @endforeach
                                        <li><a href="./anime-details.html">Anime Details</a></li>
                                        <li><a href="./anime-watching.html">Anime Watching</a></li>
                                        <li><a href="./blog-details.html">Blog Details</a></li>
                                        <li><a href="./signup.html">Sign Up</a></li>
                                        <li><a href="{{ url('/') }}\login">Login</a></li>
                                    </ul> --}}
                                </li>
                                <li style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                    <a class="dropdown-item"></span> Search <i class="fa fa-search"
                                            aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    @if (Session::has('user_email'))
                                    @else
                                        <a href="{{ url('/login') }}"><i class="fa fa-user-circle"
                                                aria-hidden="true"></i> &nbsp;
                                            Login </a>
                                    @endif

                                </li>

                                <li>

                                    @if (Session::has('user_email'))
                                        <a href="#">User Setting <i class="fa fa-arrow-down"
                                                aria-hidden="true"></i></a>
                                        <ul class="dropdown ">

                                            <li><a href="{{ url('/Favorite-Anime') }}"><i class="fa fa-heart"
                                                        aria-hidden="true"></i>
                                                    </i>
                                                    Whislist </a></li>


                                            <li><a href="{{ url('/user-setting') }}">

                                                    <i class="fa fa-address-book" aria-hidden="true"></i>
                                                    Profile </a></li>


                                                    <li><a href="{{ url('/User-comment') }}">
                                                    <i class="fa fa-comment" aria-hidden="true"></i>
                                                    Comment </a></li>


                                            <li><a href="{{ url('/logout') }}"><i class="fa fa-user-circle"
                                                        aria-hidden="true">
                                                    </i>
                                                    Logout </a></li>

                                            {{-- <li><a href="./anime-details.html">Anime Details</a></li>
                                                                                <li><a href="./anime-watching.html">Anime Watching</a></li>
                                                                                <li><a href="./blog-details.html">Blog Details</a></li> --}}
                                        </ul>
                                    @else
                                        {{-- <a href="/login"><i class="fa fa-user-circle" aria-hidden="true"></i> &nbsp;
                                            Login </a> --}}
                                    @endif


                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                {{-- <div class="col-lg-2">
                    <div class="header__right">

                        {{-- <span class="icon_search"> --}}
                {{-- <a href="/login"><i class="fa fa-user-circle" aria-hidden="true"></i>  </a> --}}


                {{-- <span class="icon_profile"></span> --}}
            </div>
        </div>
        </div>
        <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->
    <style>
        /* List */
        ul.side_bar {
            counter-reset: index;
            padding: 0;
            max-width: 300px;
        }

        /* List element */
        li.bar_list {
            counter-increment: index;
            display: flex;
            align-items: center;
            padding: 12px 0;
            color: white;
            box-sizing: border-box;
        }


        /* Element counter */
        li.bar_list::before {
            content: counters(index, ".", decimal-leading-zero);
            font-size: 1.5rem;
            text-align: right;
            font-weight: bold;
            min-width: 50px;
            padding-right: 12px;
            font-feature-settings: "tnum";
            font-variant-numeric: tabular-nums;
            align-self: flex-start;
            background-image: linear-gradient(to bottom, aquamarine, orangered);
            background-attachment: fixed;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }


        /* Element separation */
        li.bar_list+li.bar_list {
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }

        a.dropdown-items:hover {
            color: white;
            font-weight: bolder;
        }

        a.dropdown-items {
            color: #948d8d !important;
        }
    </style>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
        aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header " style="background-color:#E53637 !important ">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel" style="color: whitesmoke; font-weight: bolder">
                GENRE</h5>
            <button type="button" style="color: #b3adad" class="btn-close" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body" style="background-color: #0B0C2A !important">
            <ul class="side_bar">
                <li class="bar_list" style="cursor: pointer" data-bs-toggle="modal"
                    data-bs-target="#exampleModalCenter">
                    <a class="dropdown-item"></span> Search <i class="fa fa-search" aria-hidden="true"></i>
                    </a>
                </li>
                @foreach ($category as $cat)
                    <li class="bar_list"><a style="cursor: pointer !important" class="dropdown-item"
                            href="{{ url('/') }}/category/{{ $cat->add_anime_title }}">{{ $cat->add_anime_title }}</a>
                    </li>
                @endforeach
            </ul>

        </div>
    </div>
    {{-- {{pre($category)}} --}}
