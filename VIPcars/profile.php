<?php include "includes/header.php"; ?>
    <!-- END nav -->

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/car.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <h1 class="mb-3 bread">Profile</h1>
                    <?php include "db/login.php";  ?>
                    <?php if(isset($_SESSION['email'])){
                        if(isset($_SESSION['profile'])){
                        echo $_SESSION['profile'];
                        }
                        unset($_SESSION['profile']);
                    }else{
                        header("Location: login.php");
                    } ?>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-section">
        <div class="container">
            <div class="row block-9 no-gutters">
                <div class="col-lg-12 order-md-last d-flex">
                    <form action="#" method="POST" class="bg-light p-4 p-md-5 contact-form">
                        <div class="form-group">
                            <input type="text" value="<?php echo $_SESSION['user_id']; ?>" hidden required class="form-control" name="user_id" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <input type="text" value="<?php echo $_SESSION['firstName']; ?>" required class="form-control" name="firstName" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <input type="text" value="<?php echo $_SESSION['lastName']; ?>" required class="form-control" name="lastName" placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <input type="email" value="<?php  echo$_SESSION['email']; ?>" required class="form-control" name="email" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <textarea name="address" required id="" cols="30" rows="7" class="form-control" placeholder="Address"><?php echo $_SESSION['address']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="edit" value="Edit" class="btn btn-primary py-3 px-5">
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