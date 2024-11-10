<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="modinatheme">
        <!-- Page title -->
        <title>Marketing</title>
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('front/assets/img/favicon/favicon.png') }}">
        <!-- Bootstrap min.css -->
        <link rel="stylesheet" href="{{ asset('front/assets/css/bootstrap.min.css') }}">
        <!-- Font Awesome.css -->
        <link rel="stylesheet" href="{{ asset('front/assets/css/font-awesome.css') }}">
        <!-- Animate.css -->
        <link rel="stylesheet" href="{{ asset('front/assets/css/animate.css') }}">
        <!-- Magnific Popup.css -->
        <link rel="stylesheet" href="{{ asset('front/assets/css/magnific-popup.css') }}">
        <!-- MeanMenu.css -->
        <link rel="stylesheet" href="{{ asset('front/assets/css/meanmenu.css') }}">
        <!-- Swiper Bundle.css -->
        <link rel="stylesheet" href="{{ asset('front/assets/css/swiper.min.css') }}">
        <!-- Nice Select.css -->
        <link rel="stylesheet" href="{{ asset('front/assets/css/nice-select.css') }}">
        <!-- Main.css -->
        <link rel="stylesheet" href="{{ asset('front/assets/css/main.css') }}">
        <!-- Style.css -->
        <link rel="stylesheet" href="{{ asset('style.css') }}">

        <!-- template main style css file -->

        <style>
            .details-thumb-wrapper {
                overflow-x: auto; 
                padding: 10px 0;
            }

            .details-thumb-scroll {
                display: flex; 
                gap: 10px; 
            }

            .details-thumb-scroll img {
                max-height: 550px; 
                flex-shrink: 0;
                border-radius: 8px;
            }

        </style>
    </head>

    <body>



    @yield('content')






      <!-- Jquery Latest -->
      <script src="{{ asset('front/assets/js/jquery-3.7.1.min.js') }}"></script>
<!-- Viewport Js -->
<script src="{{ asset('front/assets/js/viewport.jquery.js') }}"></script>
<!-- Bootstrap Js -->
<script src="{{ asset('front/assets/js/bootstrap.min.js') }}"></script>
<!-- Nice Select Js -->
<script src="{{ asset('front/assets/js/jquery.nice-select.min.js') }}"></script>
<!-- Waypoints Js -->
<script src="{{ asset('front/assets/js/jquery.waypoints.js') }}"></script>
<!-- Counterup Js -->
<script src="{{ asset('front/assets/js/jquery.counterup.min.js') }}"></script>
<!-- Swiper Slider Js -->
<script src="{{ asset('front/assets/js/swiper.min.js') }}"></script>
<!-- MeanMenu Js -->
<script src="{{ asset('front/assets/js/jquery.meanmenu.min.js') }}"></script>
<!-- Magnific Popup Js -->
<script src="{{ asset('front/assets/js/jquery.magnific-popup.min.js') }}"></script>
<!-- Wow Animation Js -->
<script src="{{ asset('front/assets/js/wow.min.js') }}"></script>
<!-- Circle Progress Js -->
<script src="{{ asset('front/assets/js/circle-progress.js') }}"></script>
<!-- Main.js -->
<script src="{{ asset('front/assets/js/main.js') }}"></script>


        <script>
            document.addEventListener('DOMContentLoaded', function() {
    const categoryButtons = document.querySelectorAll('.category-btn');
    const packageItems = document.querySelectorAll('.package-item');

    categoryButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Remove active class from all buttons
            categoryButtons.forEach(btn => btn.classList.remove('active'));
            // Add active class to the clicked button
            button.classList.add('active');

            // Get the selected category
            const selectedCategory = button.getAttribute('data-category');

            // Show/hide packages based on category
            packageItems.forEach(item => {
                const itemCategory = item.getAttribute('data-category');
                if (selectedCategory === 'all' || itemCategory === selectedCategory) {
                    item.style.display = 'block'; // Show item
                } else {
                    item.style.display = 'none'; // Hide item
                }
            });
        });
    });
});

        </script>
    </body>
</html>