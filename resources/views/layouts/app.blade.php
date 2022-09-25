<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Constructora Hesse</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="/css/app.css" >

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="/css/fontawesome.css">
    <link rel="stylesheet" href="/css/templatemo-grad-school.css">
    <link rel="stylesheet" href="/css/owl.css">
    <link rel="stylesheet" href="/css/lightbox.css">
    <!--

    TemplateMo 557 Grad School

    https://templatemo.com/tm-557-grad-school

    -->
</head>

<body>


<!--header-->

<header class="main-header clearfix" role="header">
    <div class="logo">
        <a href="#"><em>Constructora</em> Hesse</a>
    </div>
    <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
    <nav id="menu" class="main-nav" role="navigation">
        <ul class="main-menu">
            <li><a href="#section1">Inicio</a></li>
            <li class="has-submenu"><a href="#section2">Sobre nosotros</a>
                <ul class="sub-menu">
                    <li><a href="#section5">¿Quienes somos?</a></li>
                    <li><a href="#section2">¿Que hacemos?</a></li>
                </ul>
            </li>

            <li><a href="#section6">Contacto</a></li>
            <li><a href="{{ route('login') }}" class="external">Sistema Hesse</a></li>
        </ul>
    </nav>
</header>

<!-- ***** Main Banner Area Start ***** -->
<section class="section main-banner" id="top" data-section="section1">

        <img src="../images/Lean-construction-infog-header.jpg" alt="" id="bg-video">

    <div class="video-overlay header-text">
        <div class="caption">
            <h6>Somos especialistas</h6>
            <h2>Constructora <em>Hesse</em></h2>
        </div>
    </div>
</section>
<!-- ***** Main Banner Area End ***** -->



<section class="section video" data-section="section5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 align-self-center">
                <div class="left-content">
                    <span>¿Quienes somos?</span>
                    <h4>Somos una empresa dedicada al rubro de la <em>construccion.</em></h4>
                    <p>Con muchos años de experiencia en el area, hemos realizados un monton de proyectos de construccion y remodelacion. Tambien hemos realizado trabajos con el Estado de Chile en cojunto con el<em>
                            <b> Ministerio De Vivienda y Urbanismo. </b></em>
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>
<section class="section why-us" data-section="section2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>¿Que hacemos?</h2>
                </div>
            </div>
            <div class="col-md-12">
                <div id='tabs'>
                    <ul>
                        <li><a href='#tabs-1'>Construccion</a></li>
                        <li><a href='#tabs-2'>Remodelacion</a></li>
                        <li><a href='#tabs-3'>Reparaciones</a></li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</section>






<section class="section contact" data-section="section6">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Contacto</h2>
                </div>
               <b style="color: #f5a425">Direccion</b> :  <p style="color: white; font-size: medium"> Calle nueva 11, La Florida, Santiago.</p>
                <b style="color: #f5a425">Telefono</b> : <p style="color: white; font-size: medium">999999999 </p>
               <b style="color: #f5a425">Email</b> :  <p style="color: white; font-size: medium">hesse@gmail.com</p>
            </div>

            <div class="col-md-12">
                <div style="width: 100%"><iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Calle%20Nueva%20121+(Hesse)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.maps.ie/distance-area-calculator.html">measure distance on map</a></iframe></div>
            </div>
        </div>
    </div>

</section>


<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p><i class="fa fa-copyright"></i> CONSTRUCTORA HESSE


            </div>
        </div>
    </div>
</footer>


<!-- Scripts -->
<!-- Bootstrap core JavaScript -->
<script src="/jquery/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>

<script src="/js/isotope.min.js"></script>
<script src="/js/owl-carousel.js"></script>
<script src="/js/lightbox.js"></script>
<script src="/js/tabs.js"></script>
<script src="/js/video.js"></script>
<script src="/js/slick-slider.js"></script>
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
                    scrollTop: reqSectionPos },
                800);
        } else {
            $('body, html').scrollTop(reqSectionPos);
        }

    };

    var checkSection = function checkSection() {
        $('.section').each(function () {
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

    $('.main-menu, .scroll-to-section').on('click', 'a', function (e) {
        if($(e.target).hasClass('external')) {
            return;
        }
        e.preventDefault();
        $('#menu').removeClass('active');
        showSection($(this).attr('href'), true);
    });

    $(window).scroll(function () {
        checkSection();
    });
</script>
</body>
</html>
