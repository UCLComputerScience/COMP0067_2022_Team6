@extends('layouts.mainlayout')
@section('content')
<!DOCTYPE html>
<html lang="en">
<body>

    <header class="bg-white py-5">

        <div class="container px-5">
            <div class="row gx-5 align-items-center justify-content-center">
                <div class="col-lg-8 col-xl-7 col-xxl-6">
                    <div class="my-5 text-center text-xl-start">

                        <h1 class="display-5 fw-bolder text-dark mb-2">ANCSSC</h1>
                        <p class="lead fw-normal text-dark-50 mb-4">The Alliance of NGOs and CSOs for South-South Cooperation is the International Network of NGOs and CSOs which works in collaboration with the United Nations for South-South Cooperation (UNOSSC) to enhance civil society’s understanding of the value of South-South Cooperation in developmental, humanitarian and related spheres.</p>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                            <a class="btn btn-primary btn-lg px-4 me-sm-3" href="register">Join Us</a>
                            <a class="btn btn-outline-secondary btn-lg px-4" href="https://ancssc.com/">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="./assets/ANCSSClogo.jpg" width="85%" alt="..." /></div>
            </div>
        </div>
    </header>   
    <!-- Features section-->
    <section class="py-5" id="features">
        <div class="container px-5 my-5">
            <div class="row gx-5">
                <div class="col-lg-4 mb-5 mb-lg-0"><h2 class="fw-bolder mb-0">Quick Start Guides</h2></div>
                <div class="col-lg-8">
                    <div class="row gx-5 row-cols-1 row-cols-md-2">
                        <div class="col mb-5 h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-people-fill"></i></div>
                            <h2 class="h5">Membership</h2>
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                        <div class="col mb-5 h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-calendar-event"></i></div>
                            <h2 class="h5">Events</h2>
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                        <div class="col mb-5 mb-md-0 h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-chat-left-dots"></i></div>
                            <h2 class="h5">Contact</h2>
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                        <div class="col h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-check-circle"></i></div>
                            <h2 class="h5">SDGs</h2>
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Team members section-->
    <section class="py-5 bg-light">
    <div class="container px-5 my-5">
        <div class="text-center">
            <h2 class="fw-bolder">Our team</h2>
            <p class="lead fw-normal text-muted mb-5">Supporing collaboration and progress</p>
        </div>
        <div class="row gx-5 row-cols-1 row-cols-sm-2 row-cols-xl-4 justify-content-center">
            <div class="col mb-5 mb-5 mb-xl-0">
                <div class="text-center">
                    <img class="img-fluid rounded-circle mb-4 px-4" src="https://globalone.org.uk/wp-content/uploads/2020/04/Dr_Hanaa.jpg" width="200" height="200" alt="..." />
                    <h5 class="fw-bolder">Dr. Hana</h5>
                    <div class="fst-italic text-muted">Founder</div>
                </div>
            </div>
            <div class="col mb-5 mb-5 mb-xl-0">
                <div class="text-center">
                    <img class="img-fluid rounded-circle mb-4 px-4" src="https://ancssc.com/wp-content/uploads/2019/07/Dr-Husna-Ahmad-OBE.jpg" width="200" height="200" alt="..." />
                    <h5 class="fw-bolder">Dr. Husna</h5>
                    <div class="fst-italic text-muted">Founder</div>
                </div>
            </div>
            <div class="col mb-5 mb-5 mb-sm-0">
                <div class="text-center">
                    <img class="img-fluid rounded-circle mb-4 px-4" src="https://dummyimage.com/150x150/ced4da/6c757d" alt="..." />
                    <h5 class="fw-bolder">Ines Belliard</h5>
                    <div class="fst-italic text-muted">Project Manager</div>
                </div>
            </div> 
            <div class="col mb-5">
                <div class="text-center">
                    <img class="img-fluid rounded-circle mb-4 px-4" src="https://dummyimage.com/150x150/ced4da/6c757d" alt="..." />
                    <h5 class="fw-bolder">Amel </h5>
                    <div class="fst-italic text-muted">Project Officer</div>
                </div>
            </div>
        </div>
    </div>
    </section>

</body>
</html>
@endsection