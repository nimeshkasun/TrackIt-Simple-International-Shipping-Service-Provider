<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
      require_once 'pageutil/head.php';
    ?>
    
    <link rel="stylesheet" href="access/style.css">
  </head>
  <body>
    
	  <?php
      require_once 'pageutil/navbar.php';
    ?>
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2 ftco-degree-bg js-fullheight" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">SignIn / SignUp</h1>
          </div>
        </div>
      </div>
    </section>

		<section class="ftco-section contact-section">
      <div class="container">
        <div class="row block-9 justify-content-center mb-5">
          <div class="col-md-8 mb-md-5">
            <div class="cont">
              <div class="form sign-in">
                <h2>Welcome back,</h2>
                <label>
                  <span>Email</span>
                  <input type="email" />
                </label>
                <label>
                  <span>Password</span>
                  <input type="password" />
                </label>
                <p class="forgot-pass">Forgot password?</p>
                <button type="button" class="submit">Sign In</button>
              </div>
              <div class="sub-cont">
                <div class="img">
                  <div class="img__text m--up">
                    <h2>New here?</h2>
                    <p>Sign up and Manage Shipments+
                    </p>
                  </div>
                  <div class="img__text m--in">
                    <h2>One of us?</h2>
                    <p>If you already has an account, just sign in. We''ve missed you!</p>
                  </div>
                  <div class="img__btn">
                    <span class="m--up">Sign Up</span>
                    <span class="m--in">Sign In</span>
                  </div>
                </div>
                <div class="form sign-up">
                  <h2>Time to feel like home,</h2>
                  <label>
                    <span>Name</span>
                    <input type="text" />
                  </label>
                  <label>
                    <span>Email</span>
                    <input type="email" />
                  </label>
                  <label>
                    <span>Password</span>
                    <input type="password" />
                  </label>
                  <button type="button" class="submit">Sign Up</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

   <?php
      require_once 'pageutil/footer.php';
    ?>
    
  </body>
</html>