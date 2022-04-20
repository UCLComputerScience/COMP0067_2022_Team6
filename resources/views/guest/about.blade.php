@extends('layouts.mainlayout')
@section('content')
<!DOCTYPE html>
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-N3FNXXEJL4"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-N3FNXXEJL4');
    </script>
    
    </head>
<html lang="en">

    <body class="d-flex flex-column">
        <main class="flex-shrink-0">

            <!-- Header-->
            <header class="py-5">
                <div class="container px-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-xxl-6">
                            <div class="text-center my-5">
                                <h1 class="fw-bolder">Our Mission</h1>
                                <p class="lead fw-normal text-muted mb-4">To target the Sustainable Development Goals through supporting capacity-building, advocacy and knowledge sharing within the Global South and within Triangular Cooperation </p>
                                <!-- <a class="btn btn-primary btn-lg" href="https://ancssc.com/">Learn More</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- About section one-->
            <section class="py-5 bg-light" id="scroll-target">
                <div class="container px-5 my-5">
                    <div class="row gx-5 align-items-center">
                        <div class="col-lg-6"><img class="img-fluid rounded mb-5 mb-lg-0" src="./assets/ANCSSClogo.jpg" alt="..." /></div>
                        <div class="col-lg-6">
                            <h2 class="fw-bolder">Our Founding</h2>
                            <p class="lead fw-normal text-muted mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto est, ut esse a labore aliquam beatae expedita. Blanditiis impedit numquam libero molestiae et fugit cupiditate, quibusdam expedita, maiores eaque quisquam.</p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- About section two-->
            <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="row gx-5 align-items-center">
                        <div class="col-lg-6 order-first order-lg-last"><img class="img-fluid rounded mb-5 mb-lg-0" src="https://ancssc.com/wp-content/uploads/event-manager-uploads/event_banner/2020/09/FORUM-IDA.png" alt="..." /></div>
                        <div class="col-lg-6">
                            <h2 class="fw-bolder">Growth &amp; Beyond</h2>
                            <p class="lead fw-normal text-muted mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto est, ut esse a labore aliquam beatae expedita. Blanditiis impedit numquam libero molestiae et fugit cupiditate, quibusdam expedita, maiores eaque quisquam.</p>
                        </div>
                    </div>
                </div>
            </section>
            
        </main>


    </body>
</html>
@endsection
