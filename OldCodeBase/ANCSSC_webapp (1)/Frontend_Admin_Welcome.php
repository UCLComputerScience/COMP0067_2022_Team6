<?php require 'auth_redirect.php'; ?>

<!DOCTYPE html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<title>ANCSSC | About</title>

<style>
    .topnav {
        padding-bottom: 9vw;
    }

    .main_title {
        font-size:calc(14px + 1.5vw);
        font-family: sans-serif;
        color: #4E515B;
        font-weight: bold;
        padding: 1vw;
        text-align: center;
        margin-top: 2vw;
    }

    * {box-sizing: border-box;}
    body {font-family: Verdana, sans-serif;}
    .mySlides {display: none;}
    img {vertical-align: middle;}

    /* Slideshow container */
    .slideshow-container {
        width: 50%;
        position: relative;
        margin-top: 0.5vw;
        margin-left:25%;
    }

    /* The dots/bullets/indicators */
    .dot {
        height: 0.5vw;
        width: 0.5vw;
        margin: 0 0.2vw;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
    }


    /* Fading animation */
    .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 3.5s;
        animation-name: fade;
        animation-duration: 6.5s;
    }

    @-webkit-keyframes fade {
        from {opacity: .9}
        to {opacity: 1}
    }

    @keyframes fade {
        from {opacity: .9}
        to {opacity: 1}
    }
</style>

<div class="topnav">
    <?php
    require 'Frontend_header_admin.php';
    ?>
</div>

<body>
<div class="main_title">Welcome <?php echo $_SESSION['user']['username']; ?>!</div>

<?php
require "db_connect.php";
$count_query='SELECT COUNT(id_project) FROM projects ';
$average_budget_query='SELECT AVG(project_budget) FROM projects';

if ($result = mysqli_query($link,$count_query)) {
	$row=mysqli_fetch_array($result);
	echo "<a style='font-size:calc(7px + 0.8vw);
        font-family: sans-serif;
        color: #4E515B;
        font-weight: bold;
        padding: 1vw;
        text-align: center;
        margin-top: 2vw;
		position: relative;
		margin-left: 40%;'>Total Projects Registered: ".$row['COUNT(id_project)']."</a><br></br>";
}
?>

<div class="slideshow-container">
    <div class="mySlides fade">
        <div class="numbertext">1 / 2</div>
        <a class="btn" href='Frontend_Admin_Latest_Announcements.php'><img src="Announcements.png" style="width:100%"></a>
    </div>
    <div class="mySlides fade">
        <div class="numbertext">2 / 2</div>
        <a class="btn" href='Frontend_SDGs.php'><img src="All_SDGs.png" style="width:100%"></a>
    </div>
</div>

<div style="text-align:center">
    <span class="dot"></span>
    <span class="dot"></span>
</div>




<script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        setTimeout(showSlides, 4000); // Change image every 3 seconds
    }
</script>