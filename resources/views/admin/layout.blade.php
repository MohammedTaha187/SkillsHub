<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>@yield('head')</title>

    <link rel="stylesheet" href="{{ asset('admin/css/fontawesome.all.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/css/adminlte.css') }}">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    @yield('styles')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

       

        @yield('body')




        
        <footer class="main-footer">

            <div class="float-right d-none d-sm-inline">
                Get in touch with me!
            </div>
        
            <strong>Copyright &copy; 2025 <a href="">EngMohammed Taha</a>.</strong> All rights reserved.
            
            <div class="mt-3">
                <p>About Me: I am a software developer with expertise in Full Stack Development, specializing in creating dynamic and responsive web applications. Feel free to contact me for any project collaboration or inquiries.</p>
                <p>Email: engmohammed1872@gmail.com | Phone: +20 1212299383</p>
            </div>
        
        </footer>
        
    </div>

    <script src="{{ asset('admin/js/jquery.js') }}"></script>

    <script src="{{ asset('admin/js/bootstrap.bundle.js') }}"></script>

    <script src="{{ asset('admin/js/adminlte.js') }}"></script>

    @yield('scribts')
</body>

</html>