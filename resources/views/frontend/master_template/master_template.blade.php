<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <!-- Head -->
    @include('frontend.includes.head')

    <!-- Css -->
    @include('frontend.includes.css')
    
</head>

<body>
    <!-- Modal -->
    @include('frontend.includes.modal')
    
    <!-- Quick view -->
    @include('frontend.includes.quick_view')

    <!-- Header -->
    <header class="header-area header-style-1 header-height-2">
        <!-- Mobile Promotion -->
        @include('frontend.includes.mobile_promotion')
        
        <!-- Header Top -->
        @include('frontend.includes.header_top')

        <!-- Header Middle -->
        @include('frontend.includes.header_middle')

        <!-- Header Bottom -->
        @include('frontend.includes.header_bottom')
        
    </header>

    <!-- Start Mobile Header -->
    @include('frontend.includes.mobile_header')
    <!--End Mobile Header-->

    <main class="main">
        <!-- Start Hero Home Slider -->
        @include('frontend.includes.home_slider')
        <!--End Hero Home slider-->


        <!-- Start Popular Categories -->
        @include('frontend.includes.popular_categories')
        <!--End Popular Categories-->


        <!-- Start Banner -->
        @include('frontend.includes.banner')
        <!--End Banner-->


        <!-- Start Product Tabs -->
        @include('frontend.includes.product_tabs')
        <!-- End Products Tabs-->


        <!-- Start Best Sales -->
        @include('frontend.includes.best_sales')
        <!--End Best Sales-->


        <!-- Start Deals -->
        @include('frontend.includes.best_deals')
        <!--End Deals-->


        <!-- Start Product Listing -->
        @include('frontend.includes.product_listing')
        <!--End Product Listing-->
    </main>

    <!-- Start Footer -->
    <footer class="main">
        <!-- Start Newsletter -->
        @include('frontend.includes.newsletter')
        <!-- End Newsletter -->


        <!-- Start Featured -->
        @include('frontend.includes.featured')
        <!-- End Featured -->
        

        <!-- Start Footer Top -->
        @include('frontend.includes.footer_top')
        <!-- End Footer Top -->


        <!-- Start Footer Bottom -->
        @include('frontend.includes.footer_bottom')
        <!-- End Footer Bottom -->
    </footer>
    <!-- End Footer -->


    <!-- Preloader Start -->
    @include('frontend.includes.preloader')
    <!-- Preloader End -->
    


    <!-- Vendor JS-->
    @include('frontend.includes.js')
</body>

</html>