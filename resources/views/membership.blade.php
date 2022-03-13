@extends('layouts.mainlayout')

@section('content')
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Modern Business - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            
            <!-- Pricing section-->
            <section class="bg-light py-5">
                <div class="container px-5 my-5">
                    <div class="text-center mb-5">
                        <h1 class="fw-bolder">Become an ANCSSC member today</h1>
                        <p class="lead fw-normal text-muted mb-0">Choose from our annual plans based on your type of organisation</p>
                    </div>
                    <div class="row gx-5 justify-content-center">
 
                        <!-- Pricing card charity-->
                        <div class="col-lg-6 col-xl-4">
                            <div class="card mb-5 mb-xl-0">
                                <div class="card-body p-5">
                                    <div class="small text-uppercase fw-bold">
                                        Charity
                                    </div>
                                    <div class="mb-3">
                                        <span class="display-4 fw-bold">£90</span>
                                        <span class="text-muted">/ year</span>
                                    </div>
                                    <div class="small text-camelcase fw-bold">
                                        If your organisation is in the non-profit sector, this is the membership for you
                                    </div>
                                    <br />
                                    <ul class="list-unstyled mb-4">
                                        <li class="mb-2">
                                            <i class="bi bi-check text-primary"></i>
                                            <strong>Unique planning resources</strong>
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-check text-primary"></i>
                                            Form a network of other like-minded organisations
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-check text-primary"></i>
                                            Unlimited private projects
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-check text-primary"></i>
                                            Dedicated support
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-check text-primary"></i>
                                            Free linked domain
                                        </li>
                                        <li class="text-muted">
                                            <i class="bi bi-x"></i>
                                            Monthly status reports
                                        </li>
                                    </ul>
                                    <div class="d-grid"><a class="btn btn-outline-primary" href="/register">Become a charity member</a></div>
                                </div>
                            </div>
                        </div>
                        <!-- Pricing card corporate-->
                        <div class="col-lg-6 col-xl-4">
                            <div class="card">
                                <div class="card-body p-5">
                                    <div class="small text-uppercase fw-bold text-muted">Corporate</div>
                                    <div class="mb-3">
                                        <span class="display-4 fw-bold">£120</span>
                                        <span class="text-muted">/ year</span>
                                    </div>
                                    <div class="small text-camelcase fw-bold">
                                        If your organisation is in the private sector run for profit, this is the membership for you
                                    </div>
                                    <br />
                                    <ul class="list-unstyled mb-4">
                                        <li class="mb-2">
                                            <i class="bi bi-check text-primary"></i>
                                            <strong>Unlimited users</strong>
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-check text-primary"></i>
                                            5GB storage
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-check text-primary"></i>
                                            Unlimited public projects
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-check text-primary"></i>
                                            Community access
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-check text-primary"></i>
                                            Unlimited private projects
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-check text-primary"></i>
                                            Dedicated support
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-check text-primary"></i>
                                            <strong>Unlimited</strong>
                                            linked domains
                                        </li>
                                        <li class="text-muted">
                                            <i class="bi bi-check text-primary"></i>
                                            Monthly status reports
                                        </li>
                                    </ul>
                                    <div class="d-grid"><a class="btn btn-outline-primary" href="/register">Become a corporate member</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


        <!-- Map-->
        <div class="text-center mb-5">
            <h1 class="fw-bolder">Where our members are located</h1>
        <section id="sidebar">
        <div id="directions_panel"></div>
        </section>

        <section id="main">
            <div id="map_canvas" style="width: 70%; height: 500px; left:12.5%"></div>
        </div>
        </section>
        
        </body>
        </main>

        
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
//<![CDATA[
var map;
// Ban Jelačić Square - Center of Zagreb, Croatia
var center = new google.maps.LatLng(45.812897, 15.97706);
function init() {
var mapOptions = {
zoom: 13,
center: center,
mapTypeId: google.maps.MapTypeId.ROADMAP
}
map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
var marker = new google.maps.Marker({
map: map,
position: center,
});
}
//]]>
</script>
</head>
<body onload="init();">


</html>
@endsection