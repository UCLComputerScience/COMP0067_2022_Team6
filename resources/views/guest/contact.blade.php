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
            <!-- Page content-->
            <section class="py-5">
                <div class="container px-5">
                    <!-- Contact prompt-->
                    <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                        <div class="text-center mb-5">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                            <h1 class="fw-bolder">Get in Touch</h1>
                            <p class="lead fw-normal text-muted mb-0">We'd love to hear from you</p>
                        </div>
                            <!-- Submit Button-->
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <div class="d-grid">
                                    <a href="mailto:info@ancssc.org" class="btn btn-primary btn-lg" id="submitButton" target="_blank">Send a message</a>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- Contact cards-->
                    <div class="row gx-5 row-cols-2 row-cols-lg-3 py-5" align="center">
                        <div class="col">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-geo-alt"></i></div>
                            <p class="text-muted mb-0">4 Gateway Mews <br>London, N11 2UT</p>
                        </div>
                        <div class="col">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                            <p class="text-muted mb-0">info@ancssc.org</p>
                        </div>
                        
                        <div class="col">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-telephone"></i></div>
                            <p class="text-muted mb-0">+44 020 8368 8231</p>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </body>
</html>
@endsection