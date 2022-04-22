@extends('layouts.mainlayout-not-subscribed')
@extends('layouts.partials.nav-logged-in-not-subscribed')


@section('content')

<!DOCTYPE html>
<html lang="en">
    <body class="d-flex flex-column">
        <main class="flex-shrink-0">
            
            <section class="bg-light py-5">
                <div class="container px-5 my-5">
                    <div class="text-center mb-5">
                        <h1 class="fw-bolder">Welcome <?php echo Auth::user()->name ?>, subscribe below to access the Members area</h1>
                        <p class="lead fw-normal text-muted mb-0"></p>
                    </div>
                    <div class="row gx-5 justify-content-center">
 
                        
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
                                        If your organisation is an NGO, this is the membership for you
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
                                    <div class="d-grid"><a class="btn btn-outline-primary" href="checkoutNGO">Become a charity member</a></div>                                  </form>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-xl-4">
                            <div class="card">
                                <div class="card-body p-5">
                                    <div class="small text-uppercase fw-bold text-muted">Corporate</div>
                                    <div class="mb-3">
                                        <span class="display-4 fw-bold">£120</span>
                                        <span class="text-muted">/ year</span>
                                    </div>
                                    <div class="small text-camelcase fw-bold">
                                        If your organisation is private sector, this is the membership for you
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
                                  
                                    </ul>
                                    <div class="d-grid"><a class="btn btn-outline-primary" href="checkoutCorporate">Become a corporate member</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

@endsection