<?php
session_start();
$status = isset($_GET['status']) ? $_GET['status'] : null;

// Archivo donde se almacenará el contador
$archivo = 'contador.txt';

// Verificar si el archivo existe, si no, lo crea
if (!file_exists($archivo)) {
  file_put_contents($archivo, '0');
}

// Leer el número actual de visitas
$contador = (int) file_get_contents($archivo);

// Incrementar el contador
$contador++;

// Guardar el nuevo valor en el archivo
file_put_contents($archivo, $contador);
// ------------------------- Contador de visitas ------------------------------------
?>

<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
  <!--- basic page needs
    ================================================== -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Angel Tech</title>
  <style>
    .alert {
      position: fixed;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      width: 400px;
      background: #f8f9fa;
      padding: 15px 20px;
      border: 1px solid #ddd;
      border-radius: 5px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
      z-index: 9999;
      display: none;
      flex-direction: column;
      text-align: center;
      /* Centra todo el contenido */
    }

    .alert-success {
      background: #d4edda;
      color: #155724;
      border-color: #c3e6cb;
    }

    .alert-error {
      background: #f8d7da;
      color: #721c24;
      border-color: #f5c6cb;
    }

    .alert-heading {
      margin: 0 0 10px;
      font-size: 1.5rem;
      font-weight: bold;
      color: #000;
      /* Negro */
    }

    .alert p {
      margin: 5px 0;
    }

    hr {
      margin: 10px 0;
      border: 0;
      border-top: 1px solid rgba(0, 0, 0, 0.1);
    }

    .close-btn {
      margin-top: 15px;
      align-self: center;
      background-color: #ffffff;
      border: 1px solid #ccc;
      border-radius: 5px;
      color: #000;
      font-size: 0.95rem;
      padding: 8px 16px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .close-btn:hover {
      background-color: #f0f0f0;
    }
  </style>

  <script>
    document.documentElement.classList.remove("no-js");
    document.documentElement.classList.add("js");
  </script>

  <!-- CSS
    ================================================== -->
  <link rel="stylesheet" href="css/vendor.css" />
  <link rel="stylesheet" href="css/styles.css" />
  <link rel="stylesheet" href="css/styles2.css" />
  <link rel="stylesheet" href="css/contador.css" />

  <!-- favicons
    ================================================== -->
  <link rel="apple-touch-icon" sizes="180x180" href="white_on_trans.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="white_on_trans.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="white_on_trans.png" />
  <link rel="manifest" href="site.webmanifest" />
</head>

<body id="top">
  <!-- preloader
    ================================================== -->
  <div id="preloader">
    <div id="loader" class="dots-fade">
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>

  <!-- page wrap
    ================================================== -->
  <div id="page" class="s-pagewrap">
    <!-- # site header 
        ================================================== -->
    <header class="s-header">
      <div class="row s-header__inner">
        <div class="s-header__block">
          <div class="s-header__logo">
            <a class="logo" href="index.php">
              <img src="images/white_on_trans.png" alt="Angel Tech" />
            </a>
          </div>

          <a class="s-header__menu-toggle" href="#0"><span>Menu</span></a>
        </div>
        <!-- end s-header__block -->

        <nav class="s-header__nav">
          <ul class="s-header__menu-links">
            <li class="current">
              <a class="smoothscroll" href="#intro">Inicio</a>
            </li>
            <li><a class="smoothscroll" href="#about">Acerca de</a></li>
            <li><a class="smoothscroll" href="#works">Servicios</a></li>
            <li><a class="smoothscroll" href="#footer">Contactame</a></li>
          </ul>
          <!-- s-header__menu-links -->
        </nav>
        <!-- end s-header__nav -->
      </div>
      <!-- end s-header__inner -->
    </header>
    <!-- end s-header -->

    <!-- # intro
        ================================================== -->
    <section id="intro" class="s-intro target-section">
      <div class="row s-intro__content width-sixteen-col">
        <div class="column lg-12 s-intro__content-inner grid-block grid-16">
          <div class="s-intro__content-text">
            <div class="s-intro__content-pretitle text-pretitle">Hola</div>
            <h1 class="s-intro__content-title">
              Soy Angel,<br />
              programador Frontend <br />
              y Backend.
            </h1>

            <div class="s-intro__content-btns">
              <a class="smoothscroll btn" href="#about">Acerca de mi...</a>
              <a class="smoothscroll btn btn--stroke" href="#footer">Contactame!</a>
            </div>
            <!-- s-intro__content-btns -->
          </div>
          <!-- s-intro__content-text -->
        </div>
        <!-- s-intro__content-inner -->
      </div>
      <!-- s-intro__content -->

      <ul class="s-intro__social social-list">
        <li>
          <a href="#0">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
              style="fill: rgba(0, 0, 0, 1); transform: ; -ms-filter: ">
              <path
                d="M20,3H4C3.447,3,3,3.448,3,4v16c0,0.552,0.447,1,1,1h8.615v-6.96h-2.338v-2.725h2.338v-2c0-2.325,1.42-3.592,3.5-3.592 c0.699-0.002,1.399,0.034,2.095,0.107v2.42h-1.435c-1.128,0-1.348,0.538-1.348,1.325v1.735h2.697l-0.35,2.725h-2.348V21H20 c0.553,0,1-0.448,1-1V4C21,3.448,20.553,3,20,3z">
              </path>
            </svg>
            <span class="u-screen-reader-text">Facebook</span>
          </a>
        </li>
        <li>
          <a href="#0">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
              style="fill: rgba(0, 0, 0, 1); transform: ; -ms-filter: ">
              <path
                d="M11.999,7.377c-2.554,0-4.623,2.07-4.623,4.623c0,2.554,2.069,4.624,4.623,4.624c2.552,0,4.623-2.07,4.623-4.624 C16.622,9.447,14.551,7.377,11.999,7.377L11.999,7.377z M11.999,15.004c-1.659,0-3.004-1.345-3.004-3.003 c0-1.659,1.345-3.003,3.004-3.003s3.002,1.344,3.002,3.003C15.001,13.659,13.658,15.004,11.999,15.004L11.999,15.004z">
              </path>
              <circle cx="16.806" cy="7.207" r="1.078"></circle>
              <path
                d="M20.533,6.111c-0.469-1.209-1.424-2.165-2.633-2.632c-0.699-0.263-1.438-0.404-2.186-0.42 c-0.963-0.042-1.268-0.054-3.71-0.054s-2.755,0-3.71,0.054C7.548,3.074,6.809,3.215,6.11,3.479C4.9,3.946,3.945,4.902,3.477,6.111 c-0.263,0.7-0.404,1.438-0.419,2.186c-0.043,0.962-0.056,1.267-0.056,3.71c0,2.442,0,2.753,0.056,3.71 c0.015,0.748,0.156,1.486,0.419,2.187c0.469,1.208,1.424,2.164,2.634,2.632c0.696,0.272,1.435,0.426,2.185,0.45 c0.963,0.042,1.268,0.055,3.71,0.055s2.755,0,3.71-0.055c0.747-0.015,1.486-0.157,2.186-0.419c1.209-0.469,2.164-1.424,2.633-2.633 c0.263-0.7,0.404-1.438,0.419-2.186c0.043-0.962,0.056-1.267,0.056-3.71s0-2.753-0.056-3.71C20.941,7.57,20.801,6.819,20.533,6.111z M19.315,15.643c-0.007,0.576-0.111,1.147-0.311,1.688c-0.305,0.787-0.926,1.409-1.712,1.711c-0.535,0.199-1.099,0.303-1.67,0.311 c-0.95,0.044-1.218,0.055-3.654,0.055c-2.438,0-2.687,0-3.655-0.055c-0.569-0.007-1.135-0.112-1.669-0.311 c-0.789-0.301-1.414-0.923-1.719-1.711c-0.196-0.534-0.302-1.099-0.311-1.669c-0.043-0.95-0.053-1.218-0.053-3.654 c0-2.437,0-2.686,0.053-3.655c0.007-0.576,0.111-1.146,0.311-1.687c0.305-0.789,0.93-1.41,1.719-1.712 c0.534-0.198,1.1-0.303,1.669-0.311c0.951-0.043,1.218-0.055,3.655-0.055c2.437,0,2.687,0,3.654,0.055 c0.571,0.007,1.135,0.112,1.67,0.311c0.786,0.303,1.407,0.925,1.712,1.712c0.196,0.534,0.302,1.099,0.311,1.669 c0.043,0.951,0.054,1.218,0.054,3.655c0,2.436,0,2.698-0.043,3.654H19.315z">
              </path>
            </svg>
            <span class="u-screen-reader-text">Instagram</span>
          </a>
        </li>
        <li>
          <a href="https://wa.me/7206079185">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
              <path
                d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z" />
            </svg>
            <path
              d="M20.66 6.98a9.932 9.932 0 0 0-3.641-3.64C15.486 2.447 13.813 2 12 2s-3.486.447-5.02 1.34c-1.533.893-2.747 2.107-3.64 3.64S2 10.187 2 12s.446 3.487 1.34 5.02a9.924 9.924 0 0 0 3.641 3.64C8.514 21.553 10.187 22 12 22s3.486-.447 5.02-1.34a9.932 9.932 0 0 0 3.641-3.64C21.554 15.487 22 13.813 22 12s-.446-3.487-1.34-5.02zM12 3.66c2 0 3.772.64 5.32 1.919-.92 1.174-2.286 2.14-4.1 2.9-1.002-1.813-2.088-3.327-3.261-4.54A7.715 7.715 0 0 1 12 3.66zM5.51 6.8a8.116 8.116 0 0 1 2.711-2.22c1.212 1.201 2.325 2.7 3.34 4.5-2 .6-4.114.9-6.341.9-.573 0-1.006-.013-1.3-.04A8.549 8.549 0 0 1 5.51 6.8zM3.66 12c0-.054.003-.12.01-.2.007-.08.01-.146.01-.2.254.014.641.02 1.161.02 2.666 0 5.146-.367 7.439-1.1.187.373.381.793.58 1.26-1.32.293-2.674 1.006-4.061 2.14S6.4 16.247 5.76 17.5c-1.4-1.587-2.1-3.42-2.1-5.5zM12 20.34c-1.894 0-3.594-.587-5.101-1.759.601-1.187 1.524-2.322 2.771-3.401 1.246-1.08 2.483-1.753 3.71-2.02a29.441 29.441 0 0 1 1.56 6.62 8.166 8.166 0 0 1-2.94.56zm7.08-3.96a8.351 8.351 0 0 1-2.58 2.621c-.24-2.08-.7-4.107-1.379-6.081.932-.066 1.765-.1 2.5-.1.799 0 1.686.034 2.659.1a8.098 8.098 0 0 1-1.2 3.46zm-1.24-5c-1.16 0-2.233.047-3.22.14a27.053 27.053 0 0 0-.68-1.62c2.066-.906 3.532-2.006 4.399-3.3 1.2 1.414 1.854 3.027 1.96 4.84-.812-.04-1.632-.06-2.459-.06z">
            </path>
            </svg>
            <span class="u-screen-reader-text">WhatsApp</span>
          </a>
        </li>
        <li>
          <a class="smoothscroll" href="#FormularioCorreo">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <path
                d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z" />
            </svg>
            <path
              d="M11.99 2C6.472 2 2 6.473 2 11.99c0 4.232 2.633 7.85 6.35 9.306-.088-.79-.166-2.006.034-2.868.182-.78 1.172-4.966 1.172-4.966s-.299-.599-.299-1.484c0-1.388.805-2.425 1.808-2.425.853 0 1.264.64 1.264 1.407 0 .858-.546 2.139-.827 3.327-.235.994.499 1.805 1.479 1.805 1.775 0 3.141-1.872 3.141-4.575 0-2.392-1.719-4.064-4.173-4.064-2.843 0-4.512 2.132-4.512 4.335 0 .858.331 1.779.744 2.28a.3.3 0 0 1 .069.286c-.076.315-.245.994-.277 1.133-.044.183-.145.222-.335.134-1.247-.581-2.027-2.405-2.027-3.871 0-3.151 2.289-6.045 6.601-6.045 3.466 0 6.159 2.469 6.159 5.77 0 3.444-2.171 6.213-5.184 6.213-1.013 0-1.964-.525-2.29-1.146l-.623 2.374c-.225.868-.834 1.956-1.241 2.62a10 10 0 0 0 2.958.445c5.517 0 9.99-4.473 9.99-9.99S17.507 2 11.99 2">
            </path>
            </svg>
            <span class="u-screen-reader-text">Gmail</span>
          </a>
        </li>
      </ul>
      <!-- end s-intro__social -->

      <div class="s-intro__content-media">
        <img src="images/retouch_2025040811312177.jpg"
          srcset="images/retouch_2025040811312177.jpg 1x, images/retouch_2025040811312177.jpg 2x" alt="Angel Tech" />
      </div>
      <!-- s-intro__content-media -->

      <div class="s-intro__btn-download">
        <a class="btn btn--stroke" href="#0">Obten mi CV</a>
      </div>
      <!-- end s-intro__btn-download -->

      <div class="s-intro__scroll-down">
        <a href="#about" class="smoothscroll">
          <div class="scroll-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
              style="fill: rgba(0, 0, 0, 1); transform: ; msfilter: ">
              <path
                d="M11.178 19.569a.998.998 0 0 0 1.644 0l9-13A.999.999 0 0 0 21 5H3a1.002 1.002 0 0 0-.822 1.569l9 13z">
              </path>
            </svg>
          </div>
          <span class="scroll-text u-screen-reader-text">Desliza hacia abajo</span>
        </a>
      </div>
      <!-- s-intro__scroll-down -->
    </section>
    <!-- end s-intro -->

    <!-- # about
        ================================================== -->
    <section id="about" class="s-about target-section">
      <div class="row s-about__content">
        <div class="column xl-12">
          <div class="section-header" data-num="01">
            <h2 class="text-display-title">Acerca de mi.</h2>
          </div>
          <!-- end section-header -->

          <p class="attention-getter">
            Soy un desarrollador especializado en diseño web profesional,
            aplicaciones móviles y software de escritorio, con un enfoque
            en crear soluciones tecnológicas que no solo se ven bien, sino
            que también funcionan con eficiencia y escalabilidad.
            Transformo ideas en productos digitales robustos, intuitivos
            y visualmente impactantes, alineados con los objetivos de cada
            cliente.
          </p>

          <p class="attention-getter">
            Mi trabajo combina experiencia de usuario, rendimiento
            y tecnología de vanguardia para ofrecer resultados que generan
            valor real. Si buscas una presencia digital sólida, moderna y
            competitiva, estás en el lugar correcto.
          </p>

          <div class="grid-list-items s-about__blocks">
            <div class="grid-list-items__item s-about__block">
              <h4 class="s-about__block-title">Mision</h4>
              <p class="attention-getter">
                Crear experiencias digitales centradas en el usuario que
                combinen diseño, funcionalidad y estrategia, para generar
                impacto y resultados tangibles.
              </p>
            </div>
            <!--end s-about__block -->

            <div class="grid-list-items__item s-about__block">
              <h4 class="s-about__block-title">Vision</h4>
              <p class="attention-getter">
                Ser reconocidos como líderes en el desarrollo de soluciones
                digitales efectivas, capaces de transformar ideas en productos
                innovadores que conecten con las personas y hagan crecer negocios.
              </p>
            </div>
            <!--end s-about__block -->

            <div class="grid-list-items__item s-about__block">
              <h4 class="s-about__block-title">Valores</h4>
              <ul class="s-about__list">
                <li>
                  Innovación:
                  <span>Buscamos siempre nuevas formas de crear valor.</span>
                </li>
                <li>
                  Calidad:
                  <span>Cuidamos cada detalle para lograr resultados profesionales.</span>
                </li>
                <li>
                  Compromiso:
                  <span>Nos enfocamos en cumplir objetivos reales para cada cliente.</span>
                </li>
                <li>
                  Colaboración:
                  <span>Creemos en construir juntos, escuchando y aportando.</span>
                </li>
                <li>
                  Transparencia:
                  <span>Comunicación clara y procesos honestos.</span>
                </li>
              </ul>
            </div>
            <!--end s-about__block -->
          </div>
          <!-- grid-list-items -->
        </div>
        <!--end column -->
      </div>
      <!--end s-about__content -->
    </section>
    <!-- end s-about -->

    <!-- # works
        ================================================== -->
    <section id="works" class="s-works target-section">
      <div class="row">
        <div class="column xl-12">
          <div class="section-header" data-num="02">
            <h2 class="text-display-title">Servicios ofrecidos.</h2>
          </div>
          <!-- end section-header -->
        </div>
      </div>

      <div class="row folio-entries">
        <?php include 'trabajos_destacados.php'; ?>
      </div>

      <!-- folio entries -->

      <div class="row s-testimonials">
        <div class="column xl-12">
          <h3 class="s-testimonials__header">
            La opinion de mis clientes !
          </h3>

          <div class="swiper-container s-testimonials__slider">
            <div class="swiper-wrapper">
              <?php include 'seccion_testimonios.php'; ?>
              <!-- end s-testimonials__slide -->
            </div>
            <!-- end swiper-wrapper -->

            <div class="swiper-pagination"></div>
          </div>
          <!-- end swiper-container -->
        </div>
        <!-- end column -->
      </div>
      <!-- end s-testimonials -->
    </section>
    <!-- end s-works -->

    <!-- # numbers
        ================================================== -->
    <section id="numbers" class="s-numbers">
      <div class="row counter-items">
        <div class="column counter-items__item">
          <div class="num">
            80
            <span>+</span>
          </div>
          <h5>Clientes felices</h5>
          <p>
            Más que usuarios, construimos relaciones con personas
            que confían en nuestro trabajo. Su satisfacción es el
            mayor reflejo de nuestro compromiso con la calidad y
            la innovación.
          </p>
        </div>
        <!-- end counter-items__item -->

        <div class="column counter-items__item">
          <div class="num">
            56
            <span>+</span>
          </div>
          <h5>Projectos completados</h5>
          <p>
            Hemos trabajado en más de 56 proyectos únicos,
            diseñando soluciones a medida para impulsar marcas,
            negocios y sueños digitales con un enfoque real en resultados.
          </p>
        </div>
        <!-- end counter-items__item -->

        <div class="column counter-items__item">
          <div class="num">
            23k
            <span>+</span>
          </div>
          <h5>Lineas de codigo</h5>
          <p>
            Detrás de cada diseño funcional hay miles de líneas
            de código escritas con precisión, creatividad y pasión
            por la tecnología que transforma ideas en realidad.
          </p>
        </div>
        <!-- end counter-items__item -->

        <div class="column counter-items__item">
          <div class="num">
            85
            <span>+</span>
          </div>
          <h5>Respuestas positivas</h5>
          <p>
            Las opiniones de nuestros clientes son prueba
            del impacto que generamos. Cada mensaje positivo
            nos motiva a seguir creando experiencias digitales inolvidables.
          </p>
        </div>
        <!-- end counter-items__item -->
      </div>
      <!-- end counter-items -->
    </section>
    <!-- end s-numbers -->

    <!-- # footer 
        ================================================== -->
    <footer id="footer" class="s-footer target-section">
      <div class="row">
        <div class="column lg-12">
          <div class="section-header light-on-dark" data-num="03">
            <h2 class="text-display-title">Mantengamonos en contacto.</h2>
          </div>
          <!-- end section-header -->
        </div>
      </div>

      <div class="row s-footer__content">
        <div class="column xl-6 md-12 s-footer__block s-footer__about">
          <p class="attention-getter">
            Estoy aquí para ayudarte a llevar tu presencia digital al siguiente
            nivel. Si tienes una idea, proyecto o simplemente quieres conversar
            sobre cómo impulsar tu marca, no dudes en escribirme. ¡Tu próximo
            gran paso comienza con un mensaje!
          </p>

        </div>
        <!-- end section-footer__about -->

        <div class="column xl-6 md-12 s-footer__block s-footer__site-links">
          <div class="row">
            <div class="column xl-4 lg-5 md-6 tab-12">
              <h5>Sigueme</h5>
              <ul class="link-list">
                <li><a href="#0">Facebook</a></li>
                <li><a href="#0">Instagram</a></li>
              </ul>
            </div>
            <div class="column xl-6 md-6 tab-12">
              <h5>Contactame</h5>
              <ul class="link-list">
                <li><a href="mailto:angeltech@caisolutions.store">angeltech@caisolutions.store</a></li>
                <li><a href="https://wa.me/7206079185">+52 7206079185</a></li>
              </ul>
            </div>
          </div>
        </div>
        <!-- end section-footer__site-links -->
      </div>
      <!-- end section-footer__content -->

      <div id="FormularioCorreo" class="row s-footer__buttons">
        <div class="column2 xl-12 tab-12">
          <div class="form-card">
            <h3 class="form-title">Envíame un mensaje</h3>
            <form action="enviar_correo.php" method="POST" class="form-contact" onsubmit="return validateForm()">
              <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" required placeholder="Tu nombre">
              </div>
              <div class="form-group">
                <label for="correo">Correo electrónico</label>
                <input type="email" id="correo" name="correo" required placeholder="Tu correo electrónico">
              </div>
              <div class="form-group">
                <label for="mensaje">Mensaje</label>
                <textarea id="mensaje" name="mensaje" rows="4" required
                  placeholder="Escribe tu mensaje aquí..."></textarea>
              </div>
              <button type="submit" class="submit-btn">Enviar mensaje</button>
            </form>
          </div>
        </div>
      </div>


      <!-- end section-footer__buttons -->

      <div class="row s-footer__bottom">
        <div class="column xl-6 lg-12">
          <ul class="s-footer__social social-list">
            <li>
              <a href="#0">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                  style="fill: rgba(0, 0, 0, 1); transform: ; -ms-filter: ">
                  <path
                    d="M20,3H4C3.447,3,3,3.448,3,4v16c0,0.552,0.447,1,1,1h8.615v-6.96h-2.338v-2.725h2.338v-2c0-2.325,1.42-3.592,3.5-3.592 c0.699-0.002,1.399,0.034,2.095,0.107v2.42h-1.435c-1.128,0-1.348,0.538-1.348,1.325v1.735h2.697l-0.35,2.725h-2.348V21H20 c0.553,0,1-0.448,1-1V4C21,3.448,20.553,3,20,3z">
                  </path>
                </svg>
                <span class="u-screen-reader-text">Facebook</span>
              </a>
            </li>
            <li>
              <a href="#0">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                  style="fill: rgba(0, 0, 0, 1); transform: ; -ms-filter: ">
                  <path
                    d="M11.999,7.377c-2.554,0-4.623,2.07-4.623,4.623c0,2.554,2.069,4.624,4.623,4.624c2.552,0,4.623-2.07,4.623-4.624 C16.622,9.447,14.551,7.377,11.999,7.377L11.999,7.377z M11.999,15.004c-1.659,0-3.004-1.345-3.004-3.003 c0-1.659,1.345-3.003,3.004-3.003s3.002,1.344,3.002,3.003C15.001,13.659,13.658,15.004,11.999,15.004L11.999,15.004z">
                  </path>
                  <circle cx="16.806" cy="7.207" r="1.078"></circle>
                  <path
                    d="M20.533,6.111c-0.469-1.209-1.424-2.165-2.633-2.632c-0.699-0.263-1.438-0.404-2.186-0.42 c-0.963-0.042-1.268-0.054-3.71-0.054s-2.755,0-3.71,0.054C7.548,3.074,6.809,3.215,6.11,3.479C4.9,3.946,3.945,4.902,3.477,6.111 c-0.263,0.7-0.404,1.438-0.419,2.186c-0.043,0.962-0.056,1.267-0.056,3.71c0,2.442,0,2.753,0.056,3.71 c0.015,0.748,0.156,1.486,0.419,2.187c0.469,1.208,1.424,2.164,2.634,2.632c0.696,0.272,1.435,0.426,2.185,0.45 c0.963,0.042,1.268,0.055,3.71,0.055s2.755,0,3.71-0.055c0.747-0.015,1.486-0.157,2.186-0.419c1.209-0.469,2.164-1.424,2.633-2.633 c0.263-0.7,0.404-1.438,0.419-2.186c0.043-0.962,0.056-1.267,0.056-3.71s0-2.753-0.056-3.71C20.941,7.57,20.801,6.819,20.533,6.111z M19.315,15.643c-0.007,0.576-0.111,1.147-0.311,1.688c-0.305,0.787-0.926,1.409-1.712,1.711c-0.535,0.199-1.099,0.303-1.67,0.311 c-0.95,0.044-1.218,0.055-3.654,0.055c-2.438,0-2.687,0-3.655-0.055c-0.569-0.007-1.135-0.112-1.669-0.311 c-0.789-0.301-1.414-0.923-1.719-1.711c-0.196-0.534-0.302-1.099-0.311-1.669c-0.043-0.95-0.053-1.218-0.053-3.654 c0-2.437,0-2.686,0.053-3.655c0.007-0.576,0.111-1.146,0.311-1.687c0.305-0.789,0.93-1.41,1.719-1.712 c0.534-0.198,1.1-0.303,1.669-0.311c0.951-0.043,1.218-0.055,3.655-0.055c2.437,0,2.687,0,3.654,0.055 c0.571,0.007,1.135,0.112,1.67,0.311c0.786,0.303,1.407,0.925,1.712,1.712c0.196,0.534,0.302,1.099,0.311,1.669 c0.043,0.951,0.054,1.218,0.054,3.655c0,2.436,0,2.698-0.043,3.654H19.315z">
                  </path>
                </svg>
                <span class="u-screen-reader-text">Instagram</span>
              </a>
            </li>
            <li>
              <a href="https://wa.me/7206079185">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                  <path
                    d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z" />
                </svg>
                <path
                  d="M20.66 6.98a9.932 9.932 0 0 0-3.641-3.64C15.486 2.447 13.813 2 12 2s-3.486.447-5.02 1.34c-1.533.893-2.747 2.107-3.64 3.64S2 10.187 2 12s.446 3.487 1.34 5.02a9.924 9.924 0 0 0 3.641 3.64C8.514 21.553 10.187 22 12 22s3.486-.447 5.02-1.34a9.932 9.932 0 0 0 3.641-3.64C21.554 15.487 22 13.813 22 12s-.446-3.487-1.34-5.02zM12 3.66c2 0 3.772.64 5.32 1.919-.92 1.174-2.286 2.14-4.1 2.9-1.002-1.813-2.088-3.327-3.261-4.54A7.715 7.715 0 0 1 12 3.66zM5.51 6.8a8.116 8.116 0 0 1 2.711-2.22c1.212 1.201 2.325 2.7 3.34 4.5-2 .6-4.114.9-6.341.9-.573 0-1.006-.013-1.3-.04A8.549 8.549 0 0 1 5.51 6.8zM3.66 12c0-.054.003-.12.01-.2.007-.08.01-.146.01-.2.254.014.641.02 1.161.02 2.666 0 5.146-.367 7.439-1.1.187.373.381.793.58 1.26-1.32.293-2.674 1.006-4.061 2.14S6.4 16.247 5.76 17.5c-1.4-1.587-2.1-3.42-2.1-5.5zM12 20.34c-1.894 0-3.594-.587-5.101-1.759.601-1.187 1.524-2.322 2.771-3.401 1.246-1.08 2.483-1.753 3.71-2.02a29.441 29.441 0 0 1 1.56 6.62 8.166 8.166 0 0 1-2.94.56zm7.08-3.96a8.351 8.351 0 0 1-2.58 2.621c-.24-2.08-.7-4.107-1.379-6.081.932-.066 1.765-.1 2.5-.1.799 0 1.686.034 2.659.1a8.098 8.098 0 0 1-1.2 3.46zm-1.24-5c-1.16 0-2.233.047-3.22.14a27.053 27.053 0 0 0-.68-1.62c2.066-.906 3.532-2.006 4.399-3.3 1.2 1.414 1.854 3.027 1.96 4.84-.812-.04-1.632-.06-2.459-.06z">
                </path>
                </svg>
                <span class="u-screen-reader-text">WhatsApp</span>
              </a>
            </li>
            <li>
              <a class="smoothscroll" href="#FormularioCorreo">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                  <path
                    d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z" />
                </svg>
                <path
                  d="M11.99 2C6.472 2 2 6.473 2 11.99c0 4.232 2.633 7.85 6.35 9.306-.088-.79-.166-2.006.034-2.868.182-.78 1.172-4.966 1.172-4.966s-.299-.599-.299-1.484c0-1.388.805-2.425 1.808-2.425.853 0 1.264.64 1.264 1.407 0 .858-.546 2.139-.827 3.327-.235.994.499 1.805 1.479 1.805 1.775 0 3.141-1.872 3.141-4.575 0-2.392-1.719-4.064-4.173-4.064-2.843 0-4.512 2.132-4.512 4.335 0 .858.331 1.779.744 2.28a.3.3 0 0 1 .069.286c-.076.315-.245.994-.277 1.133-.044.183-.145.222-.335.134-1.247-.581-2.027-2.405-2.027-3.871 0-3.151 2.289-6.045 6.601-6.045 3.466 0 6.159 2.469 6.159 5.77 0 3.444-2.171 6.213-5.184 6.213-1.013 0-1.964-.525-2.29-1.146l-.623 2.374c-.225.868-.834 1.956-1.241 2.62a10 10 0 0 0 2.958.445c5.517 0 9.99-4.473 9.99-9.99S17.507 2 11.99 2">
                </path>
                </svg>
                <span class="u-screen-reader-text">Gmail</span>
              </a>
            </li>
          </ul>
        </div>
        <!-- end section-footer__social -->

        <div class="column xl-6 lg-12">
          <p class="ss-copyright">
            <span>© Copyright Angel Tech 2025</span>
            <span>Diseño por
              <a href="Dashboard/index.php">Angel Tech</a></span>
          </p>
        </div>
      </div>
      <!-- end section-footer__bottom -->

      <div class="ss-go-top">
        <a class="smoothscroll" title="Back to Top" href="#top">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
            style="fill: rgba(0, 0, 0, 1); transform: ; msfilter: ">
            <path
              d="M5.536 21.886a1.004 1.004 0 0 0 1.033-.064l13-9a1 1 0 0 0 0-1.644l-13-9A1 1 0 0 0 5 3v18a1 1 0 0 0 .536.886z">
            </path>
          </svg>
        </a>
        <span>Inicio</span>
      </div>
      <!-- end ss-go-top -->
    </footer>
    <!-- end s-footer -->
  </div>
  <!-- end page-wrap -->

  <!-- Java Script
    ================================================== -->
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>

  <!-- Script para notificaciones y correos -->
  <script>
    // Validación del formulario
    function validateForm() {
      var correo = document.getElementById('correo').value;
      var correoPattern = /^[a-zA-Z0-9._%+-]+@(gmail\.com|outlook\.com|hotmail\.com)$/;

      if (!correoPattern.test(correo)) {
        alert("Por favor ingresa un correo válido con uno de los siguientes dominios: gmail.com u outlook.com");
        return false; // Evita el envío del formulario si el correo no es válido
      }
      return true; // Envía el formulario si el correo es válido
    }
  </script>

  <script>
    window.addEventListener('load', () => {
      const status = "<?php echo isset($_SESSION['status']) ? $_SESSION['status'] : ''; ?>";

      if (status === "success") {
        showAlert('success', '¡Realizado!',
          'Se ha enviado un enlace de confirmación a tu correo. Revisa en tu bandeja de SPAM si no lo encuentras.',
          'Recuerda verificar el correo para completar la confirmación.');
      } else if (status === "error") {
        showAlert('error', '¡Error!',
          'Error al enviar el correo de confirmación. Por favor, inténtalo de nuevo más tarde.',
          'Si el problema persiste, contacta con el soporte.');
      }

      // Eliminar el estado de la sesión después de mostrar el mensaje
      <?php unset($_SESSION['status']); ?>
    });

    function showAlert(type, title, message, footer) {
      var div = document.createElement('div');
      div.classList.add('alert', `alert-${type}`);
      div.setAttribute('role', 'alert');
      div.innerHTML = `
                <h4 class="alert-heading">${title}</h4>
                <p>${message}</p>
                <hr>
                <p class="mb-0">${footer}</p>
                <button type="button" class="close-btn" onclick="closeAlert(this)">Cerrar</button>
            `;
      document.body.appendChild(div);
      setTimeout(() => {
        div.style.display = "block"; // Mostrar alerta
      }, 100);
    }

    // Función para cerrar la alerta
    function closeAlert(button) {
      button.parentElement.style.display = 'none'; // Ocultar alerta
    }
  </script>
</body>

</html>