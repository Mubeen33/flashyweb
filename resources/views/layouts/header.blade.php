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
    <title>Flashybuy - Multi Vendor &amp; Marketplace</title>
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700&amp;amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('fonts/Linearicons/Linearicons/Font/demo-files/demo.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/owl-carousel/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/owl-carousel/assets/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/slick/slick/slick.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/nouislider/nouislider.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/lightGallery-master/dist/css/lightgallery.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">


    @stack('styles')
    <!-- common -->
    <style type="text/css">
        .border-danger-alert{
          border:1px solid red;
       }
    </style>
</head>

<body>