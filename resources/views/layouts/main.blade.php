<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#277ae4">
    <meta name="description"
        content="TaskFlow is a todo-type application that is designed to help users organize their tasks and manage their to-do lists efficiently. With a simple and intuitive interface, the application allows users to conveniently create, prioritize and track their tasks.">

    <title>@yield('title')</title>

    <link rel="icon" href="">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/fontawesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="/css/reset.css">
    <link rel="stylesheet" type="text/css" href="/css/fontes.css">
    <link rel="stylesheet" type="text/css" href="/css/toast.css">
    @stack('style')

    <script src="/js/jQuery.js"></script>
</head>

<body>
    @yield('content')

    @stack('scripts')
    <script src="/js/app.js"></script>
    <script src="/js/lists.js"></script>
    <script src="/js/toast.js"></script>
    <script src="/js/moment.js"></script>
    @stack('script')
</body>

</html>
