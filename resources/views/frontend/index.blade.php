<!DOCTYPE html>
<html lang="en">
    <head>
        @section('title' , 'Home page')
        @include('frontend.layouts.css')
    </head>
    <body>
        <!-- Navigation-->
       @include('frontend.layouts.navbar')
        <!-- Header-->
        @include('frontend.layouts.products')
        <!-- Footer-->
        @include('frontend.layouts.footer')
        <!-- Bootstrap core JS-->
        @include('frontend.layouts.scripts')
    </body>
</html>
