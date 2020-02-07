<?php
    echo '
            <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#f4b214" /></svg></div>

    <script src="front/js/jquery-3.2.1.min.js"></script>
    <script src="front/js/popper.min.js"></script>
    <script src="front/js/bootstrap.min.js"></script>
    <script src="front/js/owl.carousel.min.js"></script>
    <script src="front/https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelement-and-player.min.js"></script>
    <script src="front/js/jquery.waypoints.min.js"></script>
    <script src="front/js/jquery.countdown.min.js"></script>
    <script src="front/js/main.js"></script>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var mediaElements = document.querySelectorAll("video, audio"),
            total = mediaElements.length;

        for (var i = 0; i < total; i++) {
            new MediaElementPlayer(mediaElements[i], {
                pluginPath: "https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/",
                shimScriptAccess: "always",
                success: function() {
                    var target = document.body.querySelectorAll(".player"),
                        targetTotal = target.length;
                    for (var j = 0; j < targetTotal; j++) {
                        target[j].style.visibility = "visible";
                    }
                }
            });
        }
    });
    </script>
    ';
?>