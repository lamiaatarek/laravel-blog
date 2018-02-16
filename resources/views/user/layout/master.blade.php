<!DOCTYPE html>
<html lang="en">

  <head>

    @include('user.layout.head')

  </head>

  <body>

    <!-- Navigation -->
   @include('user.layout.header')

    <!-- Main Content -->
   @yield('content')

    <!-- Footer -->
    @include('user.layout.footer')

  </body>

</html>