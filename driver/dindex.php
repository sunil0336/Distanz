<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cabbooking</title>
    <link rel="stylesheet" href="driver.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>

<body>
    <header>
        <a href="#" class="logo"><img src="./img/jeep.png" alt="logo"></a>
        <div class="bx bx-menu" id="menu-icon"></div>

        <ul class="navbar">
            <li><a href="#home">Home</a></li>
            <li><a href="#ride">Ride</a></li>
            <!-- <li><a href="#services">Services</a></li> -->
            <li><a href="#about">About</a></li>
            <li><a href="#reviews">Reviews</a></li>
        </ul>
        <div class="header-btn">
            <!-- <a href="#" class="" onclick="return cancel()">Sign Up</a> -->
            <a href="dprofile.php" class="sign-up">My Profile</a>
            <a href="dlogout.php" class="sign-in">Sign Out</a>

        </div>
       
    </header>

    <section class="home" id="home">
        <div class="text">
            <h1><span>Looking</span> to <br>Get a best costumer</h1>
            <p>More than just a ride. Drive your career with Distanz</p>
            <div class="app-stores">
                <img src="./img/ios.png" alt="">
                <img src="./img/512x512.png" alt="">
            </div>
        </div>

        <div class="form-container">
            <form name="myForm" action="cust.php">
                <div class="input-box">
                    <span>Source</span>
                    <!--<input type="text" name="source" id="" placeholder="Enter Source">-->
                    <select id="source" name="source">
                        <option value="null">Select City</option>
                        <option value="pune">Pune</option>
                        <option value="jalgaon">Jalgaon</option>
                        <option value="nashik">Nashik</option>  
                    </select>
                </div>
                <div class="input-box">
                    <span>Pick-Up Date</span>
                    <input type="date" name="p-date" id="">
                </div>
                <div class="input-box">
                    <span>Per km rate</span>
                    <input type="number" name="p-km" id="">
                </div>
                <input type="submit" value="Search" name="submit" class="btn">
            </form>

        </div>
    </section>

    <section class="ride" id="ride">
        <div class="heading">
            <span>How It Works</span>
            <h1>Get a ride With 3 Easy Steps</h1>
        </div>
        <div class="ride-container">
            <div class="box">
                <i class='bx bxs-map'></i>
                <h2>Choose A Location</h2>
                <p>Choose location of your choice! select a location from where you wish to begin the journey.</p>
            </div>

            <div class="box">
                <i class='bx bxs-calendar-check'></i>
                <h2>Pick-Up Date</h2>
                <p>You choose when to ride and when to not! Select a date on which you are available to make a ride.</p>
            </div>

            <div class="box">
                <i class='bx bxs-calendar-star'></i>
                <h2>Confirm a ride</h2>
                <p>confirm a ride which suits all your interests.choose dates,location,and customer of your choice.</p>
            </div>
        </div>
    </section>


    <section class="about" id="about">
        <div class="heading">
            <span>About Us</span>
            <h1>Best Driver Experience</h1>
        </div>
        <div class="about-container">
            <div class="about-img">
                <img src="img/about.png" alt="">
            </div>
            <div class="about-text">
                <span>About Us</span>
                <p>Choose your rides, set your schedule and be your own boss. No forced shifts, no pressure, just freedom to earn your terms.</p>
                <p>We offer competitive rates and transparent earning structures. Get paid fairly for every mile you drive.</p>
                <a href="#" class="btn">Learn More</a>
            </div>
        </div>
    </section>
    <section class="reviews" id="reviews">
        <div class="heading">
            <span>Reviews</span>
            <h1>What's Our Driver's Say</h1>
        </div>
        <div class="reviews-container">
            <div class="box">
                <div class="rev-img">
                    <img src="img/rev1.jpg" alt=">">
                </div>
                <h2>Rajpal Singh</h2>
                <div class="stars">
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star-half'></i>
                </div>
                <p>Using this platform is very easy and convinient. Must try it! </p>
            </div>

            <div class="box">
                <div class="rev-img">
                    <img src="img/rev2.jpg" alt=">">
                </div>
                <h2>Amar Yadav </h2>
                <div class="stars">
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star-half'></i>
                </div>
                <p>Great experience! never had issues with bookings and payments.</p>
            </div>

            <div class="box">
                <div class="rev-img">
                    <img src="img/rev3.jpg" alt=">">
                </div>
                <h2>Rakesh Pawar</h2>
                <div class="stars">
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star-half'></i>
                </div>
                <p>Just go for it! you get to choose rides which are convinient as well as beneficial for you.</p>
            </div>

        </div>
    </section>

    <section class="newsletter">
        <h2>Subscribe To Newsletter</h2>
        <div class="box">
            <input type="text" placeholder="Enter Your Email id...">
            <a href="#" class="btn">Subscribe</a>
        </div>
    </section>

    <div class="copyright">
        <p>$#169; Distanz All Right Reserved</p>
        <div class="social">
            <a href="#"><i class='bx bxl-facebook'></i></a>
            <a href="#"><i class='bx bxl-twitter'></i></a>
            <a href="#"><i class='bx bxl-instagram'></i></a>
        </div>
    </div>

    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="main.js"></script>
</body>

</html>
