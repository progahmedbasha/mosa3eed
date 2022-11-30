<!DOCTYPE html>
<html lang="en">

   <!-- Mirrored from askbootstrap.com/preview/vidoe-v2-3/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Nov 2022 13:21:49 GMT -->
   @include('admin.layouts.head')

   <body id="page-top">
      @include('admin.layouts.navbar')
      <div id="wrapper">

         @include('admin.layouts.sidebar')
@include('admin.layouts.javascripts')

         <div id="content-wrapper">
            <div class="container-fluid pb-0">

               <div class="top-category section-padding mb-4">
                  @yield('content')

               </div>

            </div>

         </div>



         
   </body>
   @include('admin.layouts.footer')

</html>