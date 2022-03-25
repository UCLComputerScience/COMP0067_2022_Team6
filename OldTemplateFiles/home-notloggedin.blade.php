
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Your description">
    <meta name="author" content="Your name">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on Facebook, Twitter, LinkedIn -->
    <meta property="og:site_name" content="" /> <!-- website name -->
    <meta property="og:site" content="" /> <!-- website link -->
    <meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
    <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
    <meta name="twitter:card" content="summary_large_image"> <!-- to have large image post format in Twitter -->

    <!-- Webpage Title -->
    <title>ANCSSC</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/fontawesome-all.min.css" rel="stylesheet">
    <link href="./css/aos.min.css" rel="stylesheet">
    <link href="./css/swiper.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="./assets/images/favicon.png">
</head>

<body>
    <!-- Navigation -->
    <nav id="navbar" class="navbar navbar-expand-lg fixed-top navbar-dark" aria-label="Main navigation">
        <div class="container">

            <!-- Image Logo -->
            <!-- <a class="navbar-brand logo-image" href="index.html"><img src="images/logo.svg" alt="alternative"></a> -->

            <!-- Text Logo - Use this if you don't have a graphic logo -->
            <a class="navbar-brand logo-text" href="/">ANCSSC</a>

            <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault" >
                <ul class="navbar-nav ms-auto navbar-nav-scroll">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="membership">Membership</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false" href="#">Events</a>
                        
                        <ul class="dropdown-menu" aria-labelledby="dropdown01">
                            <li><a class="dropdown-item" href="article.html">Upcoming Events</a></li>
                            <li><div class="dropdown-divider"></div></li>
                            <li><a class="dropdown-item" href="terms.html">Past Events</a></li>                                                    
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact Us</a>
                    </li>
                </ul>
                <span class="nav-item social-icons">
                    <span class="fa-stack">
                        <a href="https://www.facebook.com/ancssc/">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-facebook-f fa-stack-1x"></i>
                        </a>
                    </span>
                    <span class="fa-stack">
                        <a href="https://twitter.com/ANCSSC1">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-twitter fa-stack-1x"></i>
                        </a>
                    </span>
                </span>
                
            </div> <!-- end of navbar-collapse -->
        </div> <!-- end of container -->
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->

    


    <!-- Home -->
    <section class="home py-5 d-flex align-items-center" id="header">
        <div class="container text-light py-5"  data-aos="fade-right"> 
            <h1 class="headline"><span class="home_text">ANCSSC</span><br>The International Network <br>of NGOs and CSOs</h1>
            <p class="para para-light py-3">To target the Sustainable Development Goals through supporting capacity-building, advocacy and knowledge sharing within the Global South and within Triangular Cooperation.</p>
    <!--        <div class="d-flex align-items-center">
                <p class="p-2"><i class="fas fa-laptop-house fa-lg"></i></p>
                <p>Lorem ipsum dolor sit amet.</p>  
            </div>
            <div class="d-flex align-items-center">
                <p class="p-2"><i class="fas fa-wifi fa-lg"></i></p>
                <p>Lorem ipsum dolor sit amet.</p>  
            </div>  -->
            <div class="my-3">
                <a class="btn" href="https://www.unsouthsouth.org/partner-with-us/alliance-of-ngos-and-csos-for-south-south-cooperation/">Learn More</a>
            </div>
        </div> <!-- end of container -->
    </section> <!-- end of home -->


    <!-- Information -->
    <section class="information" id="info">
        <div class="container-fluid">  
            <div class="row text-light">
                <div class="col-lg-4 text-center p-5" data-aos="zoom-in">
                <!--<i class="fas fa-tachometer-alt fa-3x p-2"></i>  -->
                    <h4 class="py-3">OUR VISION</h4>
                    <p class="para-light">To empower civil society to establish a just world based on the values of South-South Cooperation.</p>
                </div>
                <div class="col-lg-4 text-center p-5"  data-aos="zoom-in">
                <!--<i class="fas fa-clock fa-3x p-2"></i>  -->
                    <h4 class="py-3">340</h4>
                    <p class="para-light">Global Members</p>
                </div>
                <div class="col-lg-4 text-center p-5 text-dark"  data-aos="zoom-in"> 
                <!--<i class="fas fa-headset fa-3x p-2"></i>  -->
                    <h4 class="py-3">Sustainable Development Goals </h4>
                    <p class="para-light">(1) No Poverty, (2) Zero Hunger, (3) Good Health and Well-being, (4) Quality Education, (5) Gender Equality, (6) Clean Water and Sanitation, (7) Affordable and Clean Energy, (8) Decent Work and Economic Growth, (9) Industry, Innovation and Infrastructure, (10) Reduced Inequality, (11) Sustainable Cities and Communities, (12) Responsible Consumption and Production, (13) Climate Action, (14) Life Below Water, (15) Life On Land, (16) Peace, Justice, and Strong Institutions, (17) Partnerships for the Goals.</p>
                </div>
            </div>
        </div> <!-- end of container -->
    </section> <!-- end of information -->
    

    <!-- About -->
    <section class="about d-flex align-items-center text-light py-5" id="about">
        <div class="container" >
            <div class="row d-flex align-items-center">
                <div class="col-lg-7" data-aos="fade-right">
                    <p>ABOUT US</p>
                    <h1>The Alliance of NGOs and CSOs for South-South Cooperation</h1>
                    <p class="py-2 para-light">is the International Network of NGOs and CSOs which works in collaboration with the United Nations for South-South Cooperation (UNOSSC) to enhance civil society’s understanding of the value of South-South Cooperation in developmental, humanitarian and related spheres.</p>
                    <p class="py-2 para-light">It encourages the sharing of knowledge, expertise and contextually appropriate technologies and assets among NGOs and CSOs, particularly those that have been developed in their respective organizational and operational experiences in developing countries.</p>

                    <div class="my-3">
                        <a class="btn" href="https://ancssc.com/">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-5 text-center py-4 py-sm-0" data-aos="fade-down"> 
                    <img class="img-fluid" src="./assets/images/about.png" alt="about" >
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </section> <!-- end of about -->





    <!-- Testimonials -->
    <div class="slider-1 testimonial text-light d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="text-center w-lg-75 m-auto pb-4">
                    <p>TESTIMONIALS</p>
                    <h2 class="py-2">What Our Members Says</h2>
                    <p class="para-light">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci esse facilis vel, neque ipsa mollitia impedit, commodi ab illo dignissimos, voluptatum quae amet sed tenetur dolores reprehenderit laudantium quo sint.</p>
                </div>
            </div> <!-- end of row -->
            <div class="row p-2" data-aos="zoom-in">
                <div class="col-lg-12">

                    <!-- Card Slider -->
                    <div class="slider-container">
                        <div class="swiper-container card-slider">
                            <div class="swiper-wrapper">
                                
                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="testimonial-card p-4">
                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam commodi officia laborum qui iste quidem!</p>
                                    
                                        <div class="d-flex pt-4">
                                            <div>
                                                <img class="avatar" src="./assets/images/testimonial-1.jpg" alt="testimonial">
                                            </div>
                                            <div class="ms-3 pt-2">
                                                <h6>Marlene Visconte</h6>
                                                <p>General Manager - Scouter</p>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->
        
                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="testimonial-card p-4">
                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam commodi officia laborum qui iste quidem!</p>
                                        <div class="d-flex pt-4">
                                            <div>
                                                <img class="avatar" src="./assets/images/testimonial-2.jpg" alt="testimonial">
                                            </div>
                                            <div class="ms-3 pt-2">
                                                <h6>John Spiker</h6>
                                                <p>Team Leader - Vanquish</p>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->
        
                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="testimonial-card p-4">
                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam commodi officia laborum qui iste quidem!</p>
                                        <div class="d-flex pt-4">
                                            <div>
                                                <img class="avatar" src="./assets/images/testimonial-3.jpg" alt="testimonial">
                                            </div>
                                            <div class="ms-3 pt-2">
                                                <h6>Stella Virtuoso</h6>
                                                <p>Design Chief - Upscale</p>
                                            </div>
                                        </div>
                                    </div>      
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->
        
                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="testimonial-card p-4">
                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam commodi officia laborum qui iste quidem!</p>
                                        <div class="d-flex pt-4">
                                            <div>
                                                <img class="avatar" src="./assets/images/testimonial-4.jpg" alt="testimonial">
                                            </div>
                                            <div class="ms-3 pt-2">
                                                <p>Mike tim</p>
                                                <p>Investor - TechGroww</p>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->

                            </div> <!-- end of swiper-wrapper -->
        
                            <!-- Add Arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <!-- end of add arrows -->
        
                        </div> <!-- end of swiper-container -->
                    </div> <!-- end of slider-container -->
                    <!-- end of card slider -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of testimonials -->





    <!-- Contact -->
    <section class="contact d-flex align-items-center py-5" id="contact">
        <div class="container-fluid text-light">
            <div class="row">
                <div class="col-lg-6 d-flex justify-content-center justify-content-lg-end align-items-center px-lg-5" data-aos="fade-right">
                    <div style="width:90%">
                        <div class="text-center text-lg-start py-4 pt-lg-0">
                            <h2>CONTACT</h2>
                            <h5 class="py-2">GET IN TOUCH</h5>
                            <p class="para-light">We look forward to hearing from you. We'll get in touch as soon as we can.</p>
                        </div>
                        <div>
                            <div class="row" >
                                <div class="col-lg-6">
                                    <div class="form-group py-2">
                                        <input type="text" class="form-control form-control-input" id="exampleFormControlInput1" placeholder="First Name">
                                    </div>                                
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group py-2">
                                        <input type="email" class="form-control form-control-input" id="exampleFormControlInput2" placeholder="Last Name">
                                    </div>                                 
                                </div>
                            </div>
                            <div class="row" >
                                <div class="col-lg-6">
                                    <div class="form-group py-2">
                                        <input type="text" class="form-control form-control-input" id="exampleFormControlInput1" placeholder="Email Address">
                                    </div>                                
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group py-2">
                                        <input type="email" class="form-control form-control-input" id="exampleFormControlInput2" placeholder="Web Address">
                                    </div>                                 
                                </div>
                            </div>      
                            <div class="form-group py-2">
                                <textarea class="form-control form-control-input" id="exampleFormControlTextarea1" rows="6" placeholder="Message"></textarea>
                            </div>                            
                        </div>
                        <div class="my-3">
                            <a class="btn form-control-submit-button" href="#your-link">Submit</a>
                        </div>
                    </div> <!-- end of div -->
                </div> <!-- end of col -->
                <div class="col-lg-6 d-flex align-items-center" data-aos="fade-down">
                    <img class="img-fluid d-none d-lg-block" src="./assets/images/contact.jpg" alt="contact">        
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </section> <!-- end of contact -->


    <!-- Location -->
    <section class="location text-light py-5" style="padding-left: 400px">
        <div class="container" data-aos="zoom-in">
            <div class="row">
                <div class="col-lg-3 d-flex align-items-center">
                    <div class="p-2"><i class="far fa-map fa-3x"></i></div>
                    <div class="ms-2">
                        <h6>ADDRESS</h6>
                        <p>4 Gateway Mews<br>London, N11 2UT</p>
                    </div>
                </div>
                <div class="col-lg-3 d-flex align-items-center" >
                    <div class="p-2"><i class="fas fa-mobile-alt fa-3x"></i></div>
                    <div class="ms-2">
                        <h6>PHONE</h6>
                        <p>+44 020 8368 8231</p>
                    </div>
                </div>
                <div class="col-lg-3 d-flex align-items-center" >
                    <div class="p-2"><i class="far fa-envelope fa-3x"></i></div>
                    <div class="ms-2">
                        <h6>EMAIL</h6>
                        <p>info@ancssc.org</p>
                    </div>
                </div>
             <!--   <div class="col-lg-3 d-flex align-items-center" >
                    <div class="p-2"><i class="far fa-clock fa-3x"></i></div>
                    <div class="ms-2">
                        <h6>OPENING HOURS</h6>
                        <p>09:00 AM - 18:00 PM</p>
                    </div>
                </div>  -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </section> <!-- end of location -->


    <!-- Footer -->
    <section class="footer text-light" style="padding-left: 400px">
        <div class="container">
            <div class="row" data-aos="fade-right">
                <div class="col-lg-3 py-4 py-md-5">
                    <div class="d-flex align-items-center">
                        <h4 class="">ANCSSC</h4>
                    </div>
                    <p class="py-3 para-light">To target the Sustainable Development Goals through supporting capacity-building, advocacy and knowledge sharing within the Global South and within Triangular Cooperation.</p>
                    <div class="d-flex">
                        <div class="me-3">
                            <a href="https://www.facebook.com/ancssc/">
                                <i class="fab fa-facebook-f fa-2x py-2"></i>
                            </a>
                        </div>
                        <div class="me-3">
                            <a href="https://twitter.com/ANCSSC1">
                                <i class="fab fa-twitter fa-2x py-2"></i>
                            </a>
                        </div>
                        <div class="me-3">
                            <a href="https://www.instagram.com/ancssc1/">
                                <i class="fab fa-instagram fa-2x py-2"></i>
                            </a>
                        </div>
                    </div>
                </div> <!-- end of col -->

                <div class="col-lg-3 py-9 py-md-5" style="padding-left: 176px">
                    <div>
                        <h4 class="py-0">Quick Links</h4>
                        <div class="d-flex align-items-center py-2">
                            <i class="fas fa-caret-right"></i>
                            <a href="#about"><p class="ms-3">About</p></a>
                        </div>
                        <div class="d-flex align-items-center py-2">
                            <i class="fas fa-caret-right"></i>
                            <a href="membership"><p class="ms-3">Membership</p></a>
                        </div>
                        <div class="d-flex align-items-center py-2">
                            <i class="fas fa-caret-right"></i>
                            <a href="#"><p class="ms-3">Register</p></a>
                        </div>
                        <div class="d-flex align-items-center py-2">
                            <i class="fas fa-caret-right"></i>
                            <a href="home#contact"><p class="ms-3">Contact</p></a>
                        </div>
                    </div>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </section> <!-- end of footer -->


    <!-- Bottom -->
    <div class="bottom py-2 text-light" >
        <div class="container d-flex justify-content-between">
            <div>
                <p>Al rights reserved @ ANCSSC2022</p><br>
            </div>
        </div> <!-- end of container -->
    </div> <!-- end of bottom -->
 
    
    <!-- Back To Top Button -->
    <button onclick="topFunction()" id="myBtn">
        <img src="assets/images/up-arrow.png" alt="alternative">
    </button>
    <!-- end of back to top button -->

    
    <!-- Scripts -->
    <script src="./js/bootstrap.min.js"></script><!-- Bootstrap framework -->
    <script src="./js/purecounter.min.js"></script> <!-- Purecounter counter for statistics numbers -->
    <script src="./js/swiper.min.js"></script><!-- Swiper for image and text sliders -->
    <script src="./js/aos.js"></script><!-- AOS on Animation Scroll -->
    <script src="./js/script.js"></script>  <!-- Custom scripts -->
</body>
</html>



