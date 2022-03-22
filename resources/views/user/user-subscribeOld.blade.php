@extends('layouts.mainlayout')

@section('content')
<!DOCTYPE html>
<html lang="en">
    <body class="d-flex flex-column">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            
            <!-- Pricing section-->
            <section class="bg-light py-5">
                <div class="container px-5 my-5">
                    <div class="text-center mb-5">
                        <h1 class="fw-bolder">Welcome <?php echo Auth::user()->id ?>, subscribe to aceess the members area</h1>
                        <p class="lead fw-normal text-muted mb-0"></p>
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
                                    <div class="d-grid"><a class="btn btn-outline-primary" href="checkout">Become a charity member</a></div>
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
                                        <li class="text-muted">
                                            <i class="bi bi-check text-primary"></i>
                                            Monthly status reports
                                        </li>
                                    </ul>
                                    <div class="d-grid"><a class="btn btn-outline-primary" href="https://buy.stripe.com/test_eVa4jXe870Lt18s4gh">Become a corporate member</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            

@endsection