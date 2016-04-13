<div class="container-fluid accueil--header">
    <div class="row">
        <div class="col-lg-3 col-md-2 col-xs-0 "></div>
        <div class="col-lg-6 col-md-8 col-xs-12">
            <img src = "images/robot.jpg" alt = "robot" width = "100%" >
        </div>
        <div class="col-lg-3 col-md-2 col-xs-0 "></div>
    </div>
</div>

<div class="container-fluid accueil">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-xs-12 accueil__first">
            <?php if (userSignedIn()) { ?>
            <p>You already signed in so you have access to all our product. Make sure you have all the information you need otherwise feel free to contact us</p>
            <?php } else { ?>
            <p>If you are not registred, please do it here :</p>
            <a href="index.php?module=membres&amp;action=register"><button>Click here to register</button></a>
            <?php } ?>
        </div>

        <div class="col-lg-6 col-lg-push-1 col-md-3 col-xs-12 accueil__second">
            <iframe width="420" height="315" src="https://www.youtube.com/embed/W0_DPi0PmF0?autoplay=1" ></iframe>
        </div>

        <div class="col-lg-3 col-md-12 col-xs-12 accueil__third">
            <div class="accueil__third--title">
                <h3>Last added article...</h3>
            </div>

            <div class="accueil__third--img">

            </div>

<!--            <img src = "images/leg4.jpg" alt = "robot" width = "60%" >-->
        </div>
    </div>
</div>



