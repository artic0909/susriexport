<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{env('APP_NAME')}}</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    @include('front.layout.partials.headdoc')

</head>

<body>
    @include('front.layout.partials.header')

   

    @yield('content')

    
    @include('front.layout.partials.footer')
    @include('front.layout.partials.footerscript')
    
</body>

</html>
