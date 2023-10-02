<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}" class="bg-light">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
    <title>Airnacle/ @yield('title')</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <link rel="icon" type="image/png" href="{{asset('frontend/assets/img/favicon.png')}}"> -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">
        <!-- Animate CSS --> 
        <link rel="stylesheet" href="{{asset('frontend/assets/css/animate.min.css')}}">
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="{{asset('frontend/assets/css/meanmenu.css')}}">
        <!-- Boxicons CSS -->
        <link rel="stylesheet" href="{{asset('frontend/assets/css/boxicons.min.css')}}">
        <!-- Flaticon CSS -->
        <link rel="stylesheet" href="{{asset('frontend/assets/css/flaticon.css')}}">
        <!-- Nice Select CSS -->
        <link rel="stylesheet" href="{{asset('frontend/assets/css/nice-select.min.css')}}">
        <!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.min.css')}}">
        <!-- Owl Carousel Default CSS -->
        <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.theme.default.min.css')}}">
        <!-- Odometer CSS -->
        <link rel="stylesheet" href="{{asset('frontend/assets/css/odometer.min.css')}}">
        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="{{asset('frontend/assets/css/magnific-popup.min.css')}}">
        <!-- Style CSS -->
        <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
        <!-- Dark CSS -->
        <link rel="stylesheet" href="{{asset('frontend/assets/css/dark.css')}}">
        <!-- Responsive CSS -->
		<link rel="stylesheet" href="{{asset('frontend/assets/css/responsive.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('mainuser/assets/css/gencss.css')}}"> -->
    <style>
        .buy-now-btn{
            display:none !important;
        }
    </style>
</head>