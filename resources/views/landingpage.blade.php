<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PETA-MS</title>

    <!-- Primary Meta Tags -->
    <meta name="title" content="Petakom Management System">
    <meta name="description" content="Petakom">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="bootstrap1/assets/images/logo/logo.png" type="image/svg" />

    <!-- ===== All CSS files ===== -->
    <link rel="stylesheet" href="bootstrap1/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="bootstrap1/assets/css/animate.css" />
    <link rel="stylesheet" href="bootstrap1/assets/css/lineicons.css" />
    <link rel="stylesheet" href="bootstrap1/assets/css/ud-styles.css" />
    <style>
        body {
            background-color: #3056d3;
        }
    </style>
</head>

<body>
    <!-- ====== Header Start ====== -->
    <header class="ud-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="index.html">
                            <img src="bootstrap1/assets/images/logo/logo.png" alt="Logo" />
                        </a>
                        <button class="navbar-toggler">
                            <span class="toggler-icon"> </span>
                            <span class="toggler-icon"> </span>
                            <span class="toggler-icon"> </span>
                        </button>

                        <div class="navbar-collapse">
                            <ul id="nav" class="navbar-nav mx-auto">
                                <li class="nav-item">
                                    <a class="ud-menu-scroll" href="#home"></a>
                                </li>

                                <li class="nav-item">
                                    <a class="ud-menu-scroll" href="#about"></a>
                                </li>
                                <li class="nav-item">
                                    <a class="ud-menu-scroll" href="#pricing"></a>
                                </li>
                                <li class="nav-item">
                                    <a class="ud-menu-scroll" href="#team"></a>
                                </li>
                                <li class="nav-item">
                                    <a class="ud-menu-scroll" href="#contact"></a>
                                </li>
                            </ul>
                        </div>

                        <div class="navbar-btn d-none d-sm-inline-block navbar-nav mx-auto">
                            <a class="navbar-brand" href="index.html">
                                <img src="bootstrap1/assets/images/logo/umplogo.png" alt="Logo" />
                            </a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ====== Header End ====== -->

    <!-- ====== Hero Start ====== -->
    <section class="ud-hero" id="home">
        <div class="row">
            <div class="col-lg-12">
                <div class="ud-hero-content wow fadeInUp" data-wow-delay=".2s">
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <h1 class="ud-hero-title">
                        Welcome to Petakom Management System
                    </h1>
                    <p class="ud-hero-desc">
                        Faculty of Computing,
                        Universiti Malaysia Pahang
                    </p>

                    <ul class="ud-hero-buttons">
                        <li>
                            <a href="{{ route('login') }}" rel="nofollow noopener" class="ud-main-btn ud-white-btn">
                                Click here to Login
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- ====== Hero End ====== -->

    <!-- ====== All Javascript Files ====== -->
    <script src="bootstrap1/assets/js/bootstrap.bundle.min.js"></script>
    <script src="bootstrap1/assets/js/wow.min.js"></script>
    <script src="bootstrap1/assets/js/main.js"></script>
    <script>
        // ==== for menu scroll
        const pageLink = document.querySelectorAll(".ud-menu-scroll");

        pageLink.forEach((elem) => {
            elem.addEventListener("click", (e) => {
                e.preventDefault();
                document.querySelector(elem.getAttribute("href")).scrollIntoView({
                    behavior: "smooth",
                    offsetTop: 1 - 60,
                });
            });
        });

        // section menu active
        function onScroll(event) {
            const sections = document.querySelectorAll(".ud-menu-scroll");
            const scrollPos =
                window.pageYOffset ||
                document.documentElement.scrollTop ||
                document.body.scrollTop;

            for (let i = 0; i < sections.length; i++) {
                const currLink = sections[i];
                const val = currLink.getAttribute("href");
                const refElement = document.querySelector(val);
                const scrollTopMinus = scrollPos + 73;
                if (
                    refElement.offsetTop <= scrollTopMinus &&
                    refElement.offsetTop + refElement.offsetHeight > scrollTopMinus
                ) {
                    document
                        .querySelector(".ud-menu-scroll")
                        .classList.remove("active");
                    currLink.classList.add("active");
                } else {
                    currLink.classList.remove("active");
                }
            }
        }

        window.document.addEventListener("scroll", onScroll);
    </script>
</body>

</html>