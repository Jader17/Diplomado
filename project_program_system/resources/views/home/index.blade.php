<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Postgrados Departamento de Sistemas</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('home/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('home/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('home/assets/css/templatemo-edu-meeting.css') }}">
    <link rel="stylesheet" href="{{ asset('home/assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('home/assets/css/lightbox.css') }}">

</head>

<body>

    <!-- Sub Header -->
    <div class="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-8">
                    <div class="left-content">
                        <p>Sistema de Información para la gestión de los Postgrados del Departamento de Sistemas</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4">
                    <div class="right-icons">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            Postgrados Departamento de Sistemas
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="#" class="active">Home</a></li>
                            <li><a href="#services">Programas</a></li>
                            <li><a href="{{ route('welcome') }}">Log In</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <section class="section main-banner" id="top" data-section="section1">
        <video autoplay muted loop id="bg-video">
            <source src="{{ asset('home/assets/images/course-video.mp4') }}" type="video/mp4" />
        </video>

        <div class="video-overlay header-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="caption">
                            <h6>Comunidad educativa</h6>
                            <h2>Bienvenidos</h2>
                            <p>Este es el sitio web del sistema de información para la gestión de los Posgrados
                                del Departamento de Sistemas de la <a rel="nofollow" href="https://www.udenar.edu.co/"
                                    target="_blank">Universidad de Nariño</a>. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Main Banner Area End ***** -->

    <section class="services" id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-service-item owl-carousel">

                        @foreach ($programs as $program)
                            <div class="item">
                                <div class="icon">
                                    <img src="{{ $program->logo }}" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>{{ $program->title }}</h4>
                                    <p>{{ $program->description }}</p>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <section class="contact-us">
            <div class="footer">
                <p>Copyright © 2023 Postgrados Departamento de Sistemas, Ltd. Todos los derechos reservados.
                    <br>
                    Departamento de Sistemas: <a
                        href="https://www.udenar.edu.co/facultades/ingenieria/ingenieria-en-sistemas/" target="_parent"
                        title="Departamento de Sistemas">Departamento de Sistemas</a>
                    <br>
                    Universidad de Nariño: <a href="https://www.udenar.edu.co/" target="_blank"
                        title="Universidad de Nariño">Universidad de Nariño</a>
                </p>
            </div>
        </section>
    </footer>

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('home/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('home/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('home/assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('home/assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('home/assets/js/lightbox.js') }}"></script>
    <script src="{{ asset('home/assets/js/tabs.js') }}"></script>
    <script src="{{ asset('home/assets/js/video.js') }}"></script>
    <script src="{{ asset('home/assets/js/slick-slider.js') }}"></script>
    <script src="{{ asset('home/assets/js/custom.js') }}"></script>
    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
            var
                direction = section.replace(/#/, ''),
                reqSection = $('.section').filter('[data-section="' + direction + '"]'),
                reqSectionPos = reqSection.offset().top - 0;

            if (isAnimate) {
                $('body, html').animate({
                        scrollTop: reqSectionPos
                    },
                    800);
            } else {
                $('body, html').scrollTop(reqSectionPos);
            }

        };

        var checkSection = function checkSection() {
            $('.section').each(function() {
                var
                    $this = $(this),
                    topEdge = $this.offset().top - 80,
                    bottomEdge = topEdge + $this.height(),
                    wScroll = $(window).scrollTop();
                if (topEdge < wScroll && bottomEdge > wScroll) {
                    var
                        currentId = $this.data('section'),
                        reqLink = $('a').filter('[href*=\\#' + currentId + ']');
                    reqLink.closest('li').addClass('active').
                    siblings().removeClass('active');
                }
            });
        };

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function(e) {
            e.preventDefault();
            showSection($(this).attr('href'), true);
        });

        $(window).scroll(function() {
            checkSection();
        });
    </script>
</body>

</html>
