@extends('layouts.mainlayout')

@section('content')
<head>
    <title>Membership</title>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-N3FNXXEJL4"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-N3FNXXEJL4');
    </script>
    
    </head>
<!DOCTYPE html>
<html lang="en">
    <body class="d-flex flex-column">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            
            <!-- Pricing section-->
            <section class="py-5">
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
                                            <strong>Lorem ipsum dolor sit amet</strong>
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-check text-primary"></i>
                                            Lorem ipsum dolor sit amet
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-check text-primary"></i>
                                            Lorem ipsum dolor sit amet
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-check text-primary"></i>
                                            Lorem ipsum dolor sit amet
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-check text-primary"></i>
                                            Lorem ipsum dolor sit amet
                                        </li>
                                        <li class="text-muted">
                                            <i class="bi bi-x"></i>
                                            Lorem ipsum dolor sit amet
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
                                        If your organisation is in the private sector, this is the membership for you
                                    </div>
                                    <br />
                                    <ul class="list-unstyled mb-4">
                                        <li class="mb-2">
                                            <i class="bi bi-check text-primary"></i>
                                            <strong>Lorem ipsum dolor sit amet</strong>
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-check text-primary"></i>
                                            Lorem ipsum dolor sit amet
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-check text-primary"></i>
                                            Lorem ipsum dolor sit amet
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-check text-primary"></i>
                                            Lorem ipsum dolor sit amet
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-check text-primary"></i>
                                            Lorem ipsum dolor sit amet
                                        </li>
                                        <li class="text-muted">
                                            <i class="bi bi-check text-primary"></i>
                                            Lorem ipsum dolor sit amet
                                        </li>
                                    </ul>
                                    <div class="d-grid"><a class="btn btn-outline-primary" href="/register">Become a corporate member</a></div>
                                </div>
                            </div>
            </section>


        <!-- Map-->
     
<h1 class="fw-bolder" style="text-align:center">Where our members are located</h1>
<br>
<body>
<div id="map" style="width: 80%; height: 500px; margin: auto; margin-bottom: 2%;"></div>

<?php $userlocs = DB::table('users')->select(array('org', 'latitude', 'longitude','sdg1','country'))->get();
?>

<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap"
        type="text/javascript"></script>
<script type="text/javascript">
    var locations = <?php echo $userlocs ?>;
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 3,
        center: new google.maps.LatLng(14.3291267,-18.4540299),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i]['latitude'], locations[i]['longitude']),
            map: map,
            title: locations[i]['org'],
            

        });
    }

</script>

</head>
<body onload="init();">

</html>
@endsection