<!doctype html>
<html lang="en">
<?php require_once('links_v2.php') ?>

<body>

    <!-- header -->
    <?php require_once('header_v2.php') ?>
    <!-- END header -->

    <section class="home-slider owl-carousel">

        <div class="slider-item" style="background-image: url('img/slider-1.jpg');">
            <div class="container">
                <div class="row slider-text align-items-center justify-content-center">
                    <div class="col-md-8 text-center col-sm-12 element-animate">
                        <h1>Contact Us</h1>
                        <p class="mb-5">
                            <h3 style="color:cornsilk"><b>INTERNATIONAL CENTRAL GOSPEL CHURCH<br>CAMPUS CHURCH UEW-K CHAPTER</b></h3>
                        </p>
                        <p><a href="#getInTouch" class="btn btn-white btn-outline-white">Connect With us</a></p>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- END slider -->


    <section class="section element-animate" id="getInTouch">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-md-12">
                    <h2>Get In Touch</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <form action="#" method="post">

                        <div class="row mb-4">
                            <div class="col-md-4 mb-md-0 mb-4">
                                <input type="text" class="form-control" placeholder="Full Name">
                            </div>
                            <div class="col-md-4 mb-md-0 mb-4">
                                <input type="text" class="form-control" placeholder="Email Address">
                            </div>
                            <div class="col-md-4 mb-md-0 mb-4">
                                <input type="text" class="form-control" placeholder="Phone">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <textarea name="#" id="" class="form-control"
                                    placeholder="Write some words of encouragement" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <input type="submit" class="btn btn-primary btn-block" value="Send Message">
                            </div>
                        </div>


                    </form>
                </div>

            </div>


        </div>
    </section>


    <!-- END section -->

    <section class="element-animate worship-time">
        <div class="half d-md-flex d-block">
            <div class="bg campmeeting" style="background-image: url(img/event_campmeeting.jpg);">
                <h2>Camp Meeting Will Start Soon</h2>
                <div class="mb-3" id="date-countdown"></div>
                <p><a href="#" class="btn btn-white btn-outline-white">Join Now</a></p>
            </div>
            <div>
                <h2 class="mb-5">Upcoming Events</h2>
                <a href="#" class="event-list-item first">
                    <span class="date">APR 14</span>
                    <p>Child Dedication</p>
                    <span class="more">More Info</span>
                </a>
                <a href="#" class="event-list-item">
                    <span class="date">APR 14</span>
                    <p>Church Fellowship</p>
                    <span class="more">More Info</span>
                </a>
                <a href="#" class="event-list-item">
                    <span class="date">APR 14</span>
                    <p>Mass Baptism</p>
                    <span class="more">More Info</span>
                </a>
                <a href="#" class="event-list-item">
                    <span class="date">APR 14</span>
                    <p>School of the Prophets</p>
                    <span class="more">More Info</span>
                </a>
            </div>
        </div>

    </section>
    <!-- END section -->


    <section class="section bg-light">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-md-8  text-center">
                    <h2>Personal Testimony</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="owl-carousel testimony-slider">
                        <div>
                            <img src="img/pastor_1.jpg" alt="Image placeholder">
                            <blockquote>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate quas numquam
                                    illum dolore explicabo, nobis, a dolorum inventore unde est, eveniet optio facere
                                    harum quo maiores ex quos perspiciatis? Dolor.</p>
                            </blockquote>
                            <p>&mdash; Jeremy Watson</p>
                        </div>
                        <div>
                            <img src="img/pastor_2.jpg" alt="Image placeholder">
                            <blockquote>
                                <p>Tenetur quisquam sint ad sunt ducimus tempore dolorem officia, dolor ut maxime
                                    repellendus dolores molestias libero quia, illo sit porro consectetur. Minima
                                    voluptatum, odit ab eaque quidem autem magni tempora!</p>
                            </blockquote>
                            <p>&mdash; Albert White</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php require_once('footer_v2.php') ?>
    <!-- END footer -->

    <!-- loader -->
    <?php require_once('footer_links_v2.php') ?>
</body>

</html>