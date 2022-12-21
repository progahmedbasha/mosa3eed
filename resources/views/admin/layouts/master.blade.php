<!DOCTYPE html>
<html lang="en">

   <!-- Mirrored from askbootstrap.com/preview/vidoe-v2-3/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Nov 2022 13:21:49 GMT -->
   @include('admin.layouts.head')

   <body id="page-top">
      @include('admin.layouts.navbar')
      <div id="wrapper">

         @include('admin.layouts.sidebar')

         @include('admin.layouts.javascripts')

         {{-- <div id="content-wrapper"> --}}
            {{-- @if (Route::is('timeline_posts.index') ) --}}
            {{-- <div class="container-fluid pb-0" style="width: 84%;margin-right: 22%;"> --}}
               {{-- @else --}}
               {{-- <div class="container-fluid pb-0"> --}}
               {{-- @endif --}}
                  {{-- <div class="top-category section-padding mb-4"> --}}
                     @yield('content')

                  {{-- </div> --}}

               {{-- </div> --}}

            {{-- </div> --}}




   </body>
   {{-- @if (Route::!is('warehouse_products.index') ) --}}
   {{-- @if (Route::currentRouteName() != 'timeline_posts.index') --}}
   @include('admin.layouts.footer')
   {{-- @endif --}}

</html>