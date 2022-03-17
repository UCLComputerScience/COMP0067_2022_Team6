
@extends('layouts.mainlayout')



@section('content')
<!DOCTYPE html>
<html lang="en">
<body>
    <header class="bg-dark py-5">
        <div class="container px-5">
            <div class="row gx-5 align-items-center justify-content-center">
                <div class="col-lg-8 col-xl-7 col-xxl-6">
                    <div class="my-5 text-center text-xl-start">
                        <h1 class="display-5 fw-bolder text-white mb-2">ANCSSC - The Alliance of NGOs and CSOs for South-South Cooperation</h1>
                        <p class="lead fw-normal text-white-50 mb-4">We work work in collaboration with the United Nations for South-South Cooperation (UNOSSC) to enhance civil society’s understanding of the value of South-South Cooperation in developmental, humanitarian and related spheres.</p>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                            <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#features">Join Now</a>
                            <a class="btn btn-outline-light btn-lg px-4" href="#!">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="https://dummyimage.com/600x400/343a40/6c757d" alt="..." /></div>
            </div>
        </div>
    </header>
<!-- About section one-->
<section class="py-5 bg-light" id="scroll-target">
  <div class="container px-5 my-5">
      <div class="row gx-5 align-items-center">
          <div class="col-lg-6"><img class="img-fluid rounded mb-5 mb-lg-0" src="./assets/ANCSSClogo.jpg" alt="..." /></div>
          <div class="col-lg-6">
              <h2 class="fw-bolder">Our mission</h2>
              <p class="lead fw-normal text-muted mb-0">To facilitate the strengthening of capacities of NGOs and CSOs; where needed, through the sharing of expertise, best practices, staff trainings and other assets among themselves.</p>
          </div>
      </div>
  </div>
</section>


<!-- About section two-->
<section class="py-5">
  <div class="container px-5 my-5">
      <div class="row gx-5 align-items-center">
          <div class="col-lg-6 order-first order-lg-last"><img class="img-fluid rounded mb-5 mb-lg-0" src="https://i.ibb.co/9b05cKq/boardmemberlandscape-1280x640.jpg" alt="..." /></div>
          <div class="col-lg-6">
              <h2 class="fw-bolder">Our members</h2>
              <p class="lead fw-normal text-muted mb-0">We welcome NGOs and CSOs and grassroot organisations with current operations in the Global South to join our Alliance.</p>
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
                  <img class="img-fluid rounded-circle mb-4 px-4" src="https://globalone.org.uk/wp-content/uploads/2020/04/Dr_Hanaa.jpg" alt="..." />
                  <h5 class="fw-bolder">Dr. Hana</h5>
                  <div class="fst-italic text-muted">Founder</div>
              </div>
          </div>
          <div class="col mb-5 mb-5 mb-xl-0">
              <div class="text-center">
                  <img class="img-fluid rounded-circle mb-4 px-4" src="https://ancssc.com/wp-content/uploads/2019/07/Dr-Husna-Ahmad-OBE.jpg" alt="..." />
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