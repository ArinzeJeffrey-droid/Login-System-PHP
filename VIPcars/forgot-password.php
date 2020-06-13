<?php include "includes/header.php"; ?>
    <!-- END nav -->

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/car.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <h1 class="mb-3 bread">Forgot Password</h1>
                    <?php include "db/login.php";  ?>
                    <div style="display:<?php echo $display ?>;" class='alert-<?php echo $alert;?> logic-failed'><?php echo $errorMessage ?></div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-section">
        <div class="container">
            <div class="row block-9 no-gutters">
                <div class="col-lg-12 order-md-last d-flex">
                    <form action="" method="POST" class="bg-light p-4 p-md-5 contact-form">
                        <div class="form-group">
                            <input type="email" required class="form-control" name="email" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="forgot" value="Send" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>

                </div>

                <div class="col-lg-6 d-flex">
                    <div id="map" class="bg-white"></div>
                </div>
            </div>
        </div>
    </section>
<!-- footer -->
<?php include "includes/footer.php"; ?>