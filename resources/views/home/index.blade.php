<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.css')
</head>
<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#"/></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
        @include('home.header')     
    </header>
    <!-- end header -->
    
    <!-- banner -->
    @include('home.slider')
    <!-- end banner -->

    <!-- about -->
    <div id="about">
        @include('home.about')
    </div>
    <!-- end about -->

    <!-- our_room -->
    <div id="room">
        @include('home.room')
    </div>
    <!-- end our_room -->

    <!-- gallery -->
    <div id="gallery">
        @include('home.gallery')
    </div>
    <!-- end gallery -->
    
    <!-- contact -->
    <div id="contact">
        @include('home.contact')
    </div>
    <!-- end contact -->

    <!-- footer -->
    @include('home.footer')
    <!-- end footer -->

    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>