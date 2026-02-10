<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title-web')</title>
</head>
<body>
    <header>
        <!--include header file to use in this -->  
        @include('partial.header')
    </header>
    <main>
        <!--yield is similar class or variable to declare and define value from another page-->
        <!--yield use for ttoul section deal use bos vea-->
        @yield('body-content')
    </main>
    <footer>
        <!--include footer file to use in this-->
        @include('partial.footer')
    </footer>
</body>
</html>