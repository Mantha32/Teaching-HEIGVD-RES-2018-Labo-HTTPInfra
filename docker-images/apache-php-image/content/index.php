<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RES INFRA WEB</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Cabin:700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/grayscale.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top"> Home </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#download">Download</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Intro Header -->
    <header class="masthead">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h1 class="brand-heading">HTTP INFRASTRUCTURE LAB</h1>
                        <p class="intro-text">The last labo of RES. </p>
                        <span class="ip-static">  static ip address:</span>
                        <?php echo getHostByName(getHostName()); ?>
                        <p>dynamic ip address: <span class="ip-dynamic"> </span></p>
                        <div class="col-6 col-md-7 mx-auto">
                            <table class="table table-dark  rounded">
                                <thead>
                                    <tr>
                                        <th scope="col"> <span class="border-bottom">FAMOUS WINE</span> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> <span class="float-left" style="width: 130px;"> Name: </span> <span class="wine-name"> </span></td>
                                    </tr>
                                    <tr>
                                        <td> <span class="float-left" style="width: 130px;"> Domain: </span> <span class="wine-domain"> </span> </td>
                                    </tr>
                                    <tr>
                                        <td> <span class="float-left" style="width: 130px;">AOC-origin: </span> <span class="wine-AOC-Origin"> </span> </td>
                                    </tr>
                                    <tr>
                                        <td> <span class="float-left" style="width: 130px;">Millesime: </span> <span class="wine-millesime"> </span></td>
                                    </tr>
                                    <tr>
                                        <td> <span class="float-left" style="width: 130px;">Type: </span> <span class="wine-type"> </span></td>
                                    </tr>
                                    <tr>
                                        <td> <span class="float-left" style="width: 130px;">Owner: </span> <span class="wine-owner"> </span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="#about" class="btn btn-circle js-scroll-trigger">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="content-section text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2>About HTTP INFRA</h2>
                    <p>This labo is a last labo of RES. The first objective of this lab is to get familiar with software tools that will allow us to build a complete web infrastructure </p>

                </div>
            </div>
        </div>
    </section>

    <!-- Download Section -->
    <section id="download" class="download-section content-section text-center">
        <div class="container">
            <div class="col-lg-8 mx-auto">
                <h2>Template Grayscale</h2>
                <p>We use this template to fulfill our objectives. You can download Grayscale for free on the preview page at Start Bootstrap.</p>
                <a href="http://startbootstrap.com/template-overviews/grayscale/" class="btn btn-default btn-lg">Visit Download Page</a>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="content-section text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2>Contact our team </h2>
                    <p>Feel free to leave us a comment on this RES INFRASTRUCTURE LAB to give some feedback about this project!</p>
                    <li class="list-inline-item">
                        <a href="https://github.com/Mantha32/Teaching-HEIGVD-RES-2018-Labo-HTTPInfra" class="btn btn-default btn-lg">
                            <i class="fa fa-github fa-fw"></i>
                            <span class="network-name">Github</span>
                        </a>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <div id="map"></div>

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>Copyright &copy; Yosra & Mantha32 2018</p>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>


    <!-- Custom scripts for this template -->
    <script src="js/grayscale.min.js"></script>

    <!-- Costum scripts to load students -->
    <script src="js/wine.js"></script>

</body>

</html>