<!DOCTYPE html>
<html lang="en">

   <!-- Mirrored from askbootstrap.com/preview/vidoe-v2-3/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Nov 2022 13:21:49 GMT -->
   @include('organization.layouts.head')

   <body id="page-top">
      @include('organization.layouts.navbar')
      <div id="wrapper">

         @include('organization.layouts.sidebar')
         @include('organization.layouts.javascripts')

         @yield('content')

   </body>
   @include('organization.layouts.footer')

</html>