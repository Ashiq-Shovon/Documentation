<!-- start section -->

  <main id="content" role="main" class="flex-grow-1">
    <!-- Form -->
    <div class="container-fluid">
      <div class="row">
       
        <!-- End Col -->

        <div class="col-lg-12 col-xl-12 d-flex justify-content-center align-items-center min-vh-lg-100">
          <div class="flex-grow-1 mx-auto" style="max-width: 28rem;">
            <!-- Heading -->
            <div class="text-center mb-5 mb-md-7">
              <h1 class="h2">Forgot password?</h1>
              <p>Enter your email address below and we'll get you back on track.</p>
            </div>
            <!-- End Heading -->

            <!-- Form -->
            <form class="js-validate needs-validation" action="<?php echo site_url('login/validate_login'); ?>" method="post">
              <!-- Form -->
              <div class="mb-3">
                <div class="d-flex justify-content-between align-items-center">
                  <label class="form-label" for="signupModalFormResetPasswordEmail" tabindex="0">Your email</label>

                  <a class="form-label-link" href="<?php echo site_url('login'); ?>">
                    <i class="bi-chevron-left small ms-1"></i> <?php echo site_phrase('back_to_login'); ?>
                  </a>
                </div>


              



                <input type="email" class="form-control form-control-lg" name="email" placeholder="<?php echo site_phrase('enter_your_email'); ?>" tabindex="1" placeholder="Enter your email address" aria-label="Enter your email address" required>
                <span class="invalid-feedback">Please enter a valid email address.</span>
              </div>
              <!-- End Form -->

              <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
              </div>
            </form>
            <!-- End Form -->
          </div>
        </div>
        <!-- End Col -->
      </div>
      <!-- End Row -->
    </div>
    <!-- End Form -->
  </main>
<!-- end section -->