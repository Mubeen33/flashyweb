<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('meta_title')
    @yield('meta_description')
    @yield('meta_keywords')
    @yield('meta')
    <title>Flashybuy - Multi Vendor &amp; Marketplace</title>


    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700&amp;amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('theme/plugins/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('theme/fonts/Linearicons/Linearicons/Font/demo-files/demo.css')}}">
    <link rel="stylesheet" href="{{ asset('theme/plugins/bootstrap4/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('theme/plugins/owl-carousel/assets/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{ asset('theme/plugins/slick/slick/slick.css')}}">
    <link rel="stylesheet" href="{{ asset('theme/plugins/lightGallery-master/dist/css/lightgallery.min.css')}}">
    <link rel="stylesheet" href="{{ asset('theme/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css')}}">
    <link rel="stylesheet" href="{{ asset('theme/plugins/jquery-ui/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{ asset('theme/plugins/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('theme/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('theme/css/custom.css')}}">




    @livewireStyles

    @stack('styles')
    <!-- common -->
    <style type="text/css">
        .border-danger-alert{
          border:1px solid red;
       }
        td{
            text-align: center !important;
        }
        .ps-btn-cancel, button.ps-btn-cancel {
            display: inline-block;
            padding: 15px 45px;
            font-size: 16px;
            font-weight: 600;
            line-height: 20px;
            color: white;
            border: none;
            font-weight: 600;
            border-radius: 4px;
            background-color: #000;
            transition: all .4s ease;
            cursor: pointer;
        }
        .ps-btn-cancel--sm, button.ps-btn-cancel--sm {
            padding: .5rem 2rem;
            font-size: 1.2rem;
        }

        .ps-btn-cancel--sm.ps-btn--curve, button.ps-btn-cancel--sm.ps-btn-cancel--curve {
            border-radius: 3px;
        }
        .ps-btn-cancel:hover, .ps-btn-cancel:active, button.ps-btn-cancel:hover, button.ps-btn-cancel:active {
            background-color: #fcb800;
            color: #000;
        }
        .error-text{
            color: red;
        }

    </style>
</head>

<body>
