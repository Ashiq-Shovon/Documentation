
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<main id="content" role="main" class="flex-grow-1">
    <!-- Form -->
    <div class="container-fluid">
      <div class="row">
       
        <!-- End Col -->

        <div class="col-lg-12 col-xl-12 d-flex justify-content-center align-items-center min-vh-lg-100">
          <div class="flex-grow-1 mx-auto" style="max-width: 28rem;">
            <!-- Heading -->
            <div class="text-center mb-5 mb-md-7">
              <h1 class="h2">Welcome back</h1>
              <p>Login to manage your account.</p>
            </div>
            <!-- End Heading -->

            <!-- Form -->
            <form class="" action="<?php echo site_url('login/validate_login'); ?>" method="post">
              <!-- Form -->
              <div class="mb-4">
                <label class="form-label"><?php echo site_phrase('email_address'); ?></label>
                <input type="email" class="form-control form-control-lg" name="email" id="email"  placeholder="<?php echo site_phrase('enter_your_email'); ?>" aria-label="email@site.com" required>
                <span class="invalid-feedback">Please enter a valid email address.</span>
               
              </div>

              <!-- End Form -->

              <!-- Form -->
              <div class="mb-4">
                <div class="d-flex justify-content-between align-items-center">
                  <label class="form-label" for="password"><?php echo site_phrase('password'); ?></label>

                  <a class="form-label-link" href="<?php echo site_url('login/forget_password'); ?>">Forgot Password?</a>
                </div>
               
                <div class="input-group input-group-merge" data-hs-validation-validate-class>
                  <input type="password" class="js-toggle-password form-control form-control-lg" name="password" id="password" placeholder="<?php echo site_phrase('Enter_your_password'); ?>" aria-label="8+ characters required" required minlength="8"
                        data-hs-toggle-password-options='{
                         "target": "#changePassTarget",
                         "defaultClass": "bi-eye-slash",
                         "showClass": "bi-eye",
                         "classChangeTarget": "#changePassIcon"
                       }'>
                  <a id="changePassTarget" class="input-group-append input-group-text" href="javascript:;">
                    <i id="changePassIcon" class="bi-eye"></i>
                  </a>
                </div>

                <span class="invalid-feedback">Please enter a valid password.</span>
              </div>
              <!-- End Form -->

              <div class="mb-2">
                <div class="g-recaptcha mb-2" data-sitekey="<?php echo get_settings('recaptcha_sitekey') ?>" required></div>
              </div>

              <div class="mb-3">
                <input class="d-inline-block align-middle w-auto mb-0 margin-5px-right" type="checkbox" name="remember_me" value="1">
                  <span class="d-inline-block align-middle"><?php echo site_phrase('remember_me'); ?></span>
              </div>

              <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary btn-lg">Log in</button>
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

<script>
    var email;
    var password;

    $(document).ready(function() {
        if ($.cookie("creativeitem-login-credentials") == "true") {

            var email = $.cookie('creativeitem-login-email');
            var password = $.cookie('creativeitem-login-password');
            // autofill the fields
            $('#email').val(email);
            $('#password').val(password);

            $('input[name="remember_me"]').prop('checked', true);
        }
    });

    function submitLoginForm() {
        if ($('input[name="remember_me"]').is(":checked")) {
            email = $('#email').val();
            password = $('#password').val();

            // set cookies to expire in 14 days
            $.cookie('creativeitem-login-email', email, {
                expires: 14
            });
            $.cookie('creativeitem-login-password', password, {
                expires: 14
            });
            $.cookie('creativeitem-login-credentials', true, {
                expires: 14
            });
        } else {

            // reset cookies
            $.removeCookie("creativeitem-login-email");
            $.removeCookie("creativeitem-login-password");
            $.removeCookie("creativeitem-login-credentials");
            // $.cookie('creativeitem-login-email', null);
            // $.cookie('creativeitem-login-password', null);
            // $.cookie('creativeitem-login-credentials', null);
        }

        // SUBMITTING THE FORM
        $("#loginForm").submit();
    }
</script>