<!doctype html>
<html lang="en">
<?php require_once('links_v2.php') ?>

<body>

    <!-- Header -->
    <?php require_once('header_v2.php') ?>
    <!-- END header -->

    <section class="home-slider owl-carousel">

        <div class="slider-item" style="background-image: url('img/slider-1.jpg');">
            <div class="container">
                <div class="row slider-text align-items-center justify-content-center">
                    <div class="col-md-8 text-center col-sm-12 element-animate">
                        <h1>Messages</h1>
                        <p class="mb-5"></p>
                        <p><a href="#" class="btn btn-white btn-outline-white">Support Our Ministries</a></p>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- END slider -->


    <section class="section pt-5 pb-2 bg-light">
        <div class="container">
            <div class="row mb-5 justify-content-center element-animate">
                <div class="col-md-12">
                    <h2>Latest Audio Sermons</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-4 mb-5">

                    <div class="sermon element-animate">
                        <img src="img/img_1.jpg" alt="" class="img-fluid">
                        <div class="sermon-text">
                            <h2><a href="#">Arise, Shine</a></h2>
                            <p class="sermon-meta">by <a href="#">Luis Matthew</a> on March 28, 2018</p>
                        </div>
                        <div class="player">
                            <audio id="player2" preload="none" controls style="max-width: 100%">
                                <source src="http://www.largesound.com/ashborytour/sound/AshboryBYU.mp3"
                                    type="audio/mp3">
                            </audio>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-sm-6 col-lg-4 mb-5">

                    <div class="sermon element-animate">
                        <img src="img/img_2.jpg" alt="" class="img-fluid">
                        <div class="sermon-text">
                            <h2><a href="#">Filled in Him</a></h2>
                            <p class="sermon-meta">by <a href="#">Luis Matthew</a> on March 28, 2018</p>
                        </div>
                        <div class="player">
                            <audio id="player3" preload="none" controls style="max-width: 100%">
                                <source src="http://www.largesound.com/ashborytour/sound/AshboryBYU.mp3"
                                    type="audio/mp3">
                            </audio>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-sm-6 col-lg-4 mb-5">

                    <div class="sermon element-animate">
                        <img src="img/img_3.jpg" alt="" class="img-fluid">
                        <div class="sermon-text">
                            <h2><a href="#">Jehovah the Creator</a></h2>
                            <p class="sermon-meta">by <a href="#">Luis Matthew</a> on March 28, 2018</p>
                        </div>
                        <div class="player">
                            <audio id="player4" preload="none" controls style="max-width: 100%">
                                <source src="http://www.largesound.com/ashborytour/sound/AshboryBYU.mp3"
                                    type="audio/mp3">
                            </audio>
                        </div>
                    </div>

                </div>
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
    <!-- Footer-->
    <?php require_once('footer_v2.php') ?>
    <!-- END footer -->

    <!-- loader -->
    <?php require_once('footer_links_v2.php') ?>
</body>

</html>