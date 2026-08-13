<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Admin">
    <meta name="author" content="Admin">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset(!empty($favicon->img_path) ? $favicon->img_path : '') }}">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/responsive.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous" />

    <title>{{ config('app.name') }}</title>
    <!-- ============================================================== -->
    <!-- All CSS LINKS IN BELOW FILE -->
    <!-- ============================================================== -->
    @include('layouts.front.css')
    @yield('css')
    <style>
        body {
            overflow-x: hidden;
        }

        .myaccount-tab-menu.nav a {
            display: block;
            padding: 20px;
            font-size: 16px;
            align-items: center;
            width: 100%;
            font-weight: bold;
            color: black;
            border-radius: 10px;
        }

        .myaccount-tab-menu.nav a i {
            padding-right: 10px;
        }

        .myaccount-tab-menu.nav {
            border: 1px solid;
            border-radius: 10px;
        }

        .myaccount-tab-menu.nav .active,
        .myaccount-tab-menu.nav a:hover {
            background-color: #dd1017;
            color: white;
        }

        .account-details-form label.required {
            width: 100%;
            font-weight: 500;
            font-size: 18px;
        }

        .account-details-form input {
            border-width: 1px;
            border-color: white;
            border-style: solid;
            padding-left: 15px;
            color: black;
            width: 100%;
            border-radius: 3px;
            background-color: rgb(255, 255, 255);
            height: 52px;
            padding-left: 15px;
            margin-bottom: 30px;
            color: #000000;
            font-size: 15px;
        }

        .account-details-form legend {
            font-family: CottonCandies;
            font-size: 50px;
        }

        .editable {
            position: relative;
        }

        .editable-wrapper {
            position: absolute;
            right: 0px;
            top: -50px;
        }

        .editable-wrapper a {
            background-color: #17a2b8;
            border-radius: 50px;
            width: 35px;
            height: 35px;
            display: inline-block;
            text-align: center;
            line-height: 35px;
            color: white;
            margin-left: 10px;
            font-size: 16px;
        }

        .editable-wrapper a.edit {
            background-color: #007bff;
        }
    </style>
</head>

<body class="responsive">


    @include('layouts/front.header')



    <main>
        @yield('content')
    </main>


    @include('layouts/front.footer')
    <!-- ============================================================== -->
    <!-- All SCRIPTS ANS JS LINKS IN BELOW FILE -->
    <!-- ============================================================== -->
    @include('layouts/front.scripts')
    @yield('js')

</body>

</html>
