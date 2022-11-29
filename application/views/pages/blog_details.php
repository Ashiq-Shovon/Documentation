<!-- Article Description -->
    <div class="container content-space-t-3 content-space-t-lg-4 content-space-b-2">
      <div class="w-lg-65 mx-lg-auto">
        <div class="mb-4">
          <h1 class="h2"><?php echo $blog_details['blog_title']; ?></h1>
        </div>

        <div class="row align-items-sm-center mb-5">
          <div class="col-sm-7 mb-4 mb-sm-0">
            <!-- Media -->
            <div class="d-flex align-items-center">
              <div class="flex-shrink-0">
                <img class="avatar avatar-circle" src="<?php echo $this->user_model->get_user_image_url($blog_details['id']); ?>" alt="Image Description">
              </div>

              <div class="flex-grow-1 ms-3">
                <h5 class="mb-0">
                  <a class="text-dark" href="javascript:;"><?php echo $blog_details['name']; ?></a>
                </h5>
                <span class="d-block small"><?php echo get_time_ago($blog_details['blog_date_added']); ?></span>
              </div>
            </div>
            <!-- End Media -->
          </div>
          <!-- End Col -->

          <div class="col-sm-5">
            <div class="d-flex justify-content-sm-end align-items-center">
              <span class="text-cap mb-0 me-2">Share:</span>

              <div class="d-flex gap-2">
                <a class="btn btn-soft-secondary btn-sm btn-icon rounded-circle" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo site_url('blog/' . $blog_details['blog_slug']); ?>" target="_blank">
                  <i class="bi-facebook"></i>
                </a>
                <a class="btn btn-soft-secondary btn-sm btn-icon rounded-circle" href="https://twitter.com/intent/tweet?url=<?php echo site_url('blog/' . $blog_details['blog_slug']); ?>" target="_blank">
                  <i class="bi-twitter"></i>
                </a>
                <a class="btn btn-soft-secondary btn-sm btn-icon rounded-circle" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo site_url('blog/' . $blog_details['blog_slug']); ?>" target="_blank">
                  <i class="bi-linkedin"></i>
                </a>
              </div>
            </div>
          </div>
          <!-- End Col -->
        </div>
        <!-- End Row -->
      </div>
      <style type="text/css">
          #blog-details-page *{
            max-width: 100%;
          }
      </style>
      <div class="w-lg-65 mx-lg-auto" id="blog-details-page">
          <?php echo reformat_image_path($blog_details['blog_details'], true); ?>
      </div>

      <div class="w-lg-65 mx-lg-auto">
        <!-- Card -->
        <div class="card bg-dark text-center my-4" style="background-image: url(./assets/svg/components/wave-pattern-light.svg);">
          <div class="card-body">
            <h4 class="text-white mb-4">SUBSCRIBE TO GET INSPIRATION TIPS AND TRICKS UPDATES.</h4>

            <div class="w-lg-75 mx-lg-auto">
              <form>
                <!-- Input Card -->
                <div class="input-card input-card-sm border">
                  <div class="input-card-form">
                    <label for="email-for-subscription" class="form-label visually-hidden">Enter email</label>
                    <input type="email" class="form-control" id="email-for-subscription" placeholder="Enter email" aria-label="Enter email">
                  </div>
                  <button type="button" onclick="subscribe()" class="btn btn-primary">Subscribe</button>
                </div>
                <!-- End Input Card -->
              </form>
            </div>
          </div>
        </div>
        <!-- End Card -->

        <div class="row justify-content-sm-between align-items-sm-center mt-5">
          <div class="col-sm mb-2 mb-sm-0">
            <div class="d-flex align-items-center">
              <?php foreach (explode(',', $blog_details['blog_tags']) as $tag) : ?>
                <a class="btn btn-soft-secondary btn-xs m-1" href="<?php echo site_url('blog?tag=' . $tag); ?>"><?php echo ucfirst($tag); ?></a>
              <?php endforeach; ?>
            </div>
          </div>
          <!-- End Col -->

          <div class="col-sm-auto">
            <a class="likes-count btn btn-soft-secondary btn-sm" id="like-btn" href="javascript:void(0)" onclick="react()"><i class="bi bi-heart not-liked"></i><i class="bi bi-heart liked text-danger d-none"></i><span id="number-of-likes"><?php echo $blog_details['blog_likes']; ?></span> <?php echo site_phrase('likes'); ?></a>
          </div>
          <!-- End Col -->
        </div>
        <!-- End Row -->
      </div>
    </div>
    <!-- End Article Description -->

    <!-- User Profile -->
    <div class="container content-space-t-1">
      <div class="row justify-content-lg-center">
        <div class="col-lg-8">
          <div class="mb-5">
            <h4>About the author</h4>
          </div>

          <!-- Media -->
          <div class="d-sm-flex">
            <div class="flex-shrink-0 mb-3 mb-sm-0">
              <img class="avatar avatar-xl avatar-circle" src="<?php echo $this->user_model->get_user_image_url($blog_details['id']); ?>" alt="Image Description">
            </div>

            <div class="flex-grow-1 ms-sm-4">
              <!-- Media -->
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="mb-0">
                  <a class="text-dark" href="./blog-author-profile.html"><?php echo $blog_details['name']; ?></a>
                  <small class="text-muted" style="font-size: 10px; font-weight: 400px;"> (<?php echo $blog_details['designation']; ?>)</small>
                </h3>
              </div>
              <!-- End Media -->

              <p><?php echo $blog_details['about']; ?></p>
            </div>
          </div>
          <!-- End Media -->
        </div>
      </div>
    </div>
    <!-- End User Profile -->

    <!-- Comment -->
   <section id="comment-section">
       <?php include 'comment-section.php'; ?>
   </section>
    

   <?php if($blog_details['ability_to_comment']): ?>
        <!-- Post a Comment -->
        <div class="container content-space-b-2">
            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
          <!-- Heading -->
          <div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5 mb-md-9">
            <h2>Post a comment</h2>
          </div>
          <!-- End Heading -->

          <div class="row justify-content-lg-center">
            <div class="col-lg-8">
              <!-- Card -->
              <div class="card card-lg border shadow-none">
                <div class="card-body">
                  <form action="javascript:;" id="comment-form" method="post">
                    <div class="d-grid gap-4">
                      <!-- Form -->
                      <div class="row">
                        <div class="col-sm-12 mb-4 mb-sm-0">
                          <label class="form-label" for="basic-name">Your name</label>
                          <input type="text" class="form-control form-control-lg" name="name" id="basic-name" placeholder="First name" aria-label="First name">
                        </div>
                      </div>
                      <!-- End Form -->

                      <!-- Form -->
                      <span class="d-block">
                        <label class="form-label" for="basic-email">Your email</label>
                        <input type="email" class="form-control form-control-lg" name="email" id="basic-email" placeholder="email@site.com" aria-label="email@site.com">
                      </span>
                      <!-- End Form -->

                      <!-- Form -->
                      <span class="d-block">
                        <label class="form-label" for="basic-comment">Comment</label>
                        <textarea class="form-control form-control-lg" id="basic-comment" name="comment" placeholder="Leave your comment here..." aria-label="Leave your comment here..." rows="5"></textarea>
                      </span>
                      <!-- End Form -->
                      <div class="row">
                           <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="g-recaptcha mb-2" data-callback="captchaCallback" data-sitekey="<?php echo get_settings('recaptcha_sitekey') ?>" required></div>
                            </div>
                      </div>
                      
                      <div class="d-grid">
                        <button type="button" onclick="postComment()" class="btn btn-primary btn-lg">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!-- End Card -->
            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->
        </div>
        <!-- End Post a Comment -->
    <?php endif; ?>

    <!-- Card Grid -->
    <div class="container">
      <div class="w-lg-75 border-top content-space-2 mx-lg-auto">
        <!-- Heading -->
        <div class="mb-3 mb-sm-5">
          <h2>Related articles (<?php echo $related_blogs->num_rows(); ?>)</h2>
        </div>
        <!-- End Heading -->

        <div class="row">
          <div class="col-md-4">
            Thumbnail
          </div>
          <!-- End Col -->

          <div class="col-md-4">
            Blog
          </div>
          <!-- End Col -->

          <div class="col-md-4">
            Blog excerpt
          </div>
          <!-- End Col -->
          <div class="col-12 border-top mt-3 pt-3">
            <?php foreach($related_blogs->result_array() as $related_blog): ?>
                  <div class="row mt-3">
                      <div class="col-md-4">
                        <img src="<?php echo base_url('uploads/thumbnails/blog_thumbnails/'.$related_blog['blog_thumbnail']); ?>" width="100%">
                      </div>
                      <!-- End Col -->

                      <div class="col-md-4">
                        <a href="<?php echo site_url('blog/' . $related_blog['blog_slug']); ?>"><?php echo $related_blog['blog_title']; ?></a>
                      </div>
                      <!-- End Col -->

                      <div class="col-md-4">
                        <?php echo $related_blog['blog_excerpt']; ?>
                      </div>
                  </div>
            <?php endforeach; ?>
          </div>
              <!-- End Col -->
        </div>
        <!-- End Row -->
      </div>
    </div>
    <!-- End Card Grid -->






<script type="text/javascript">
    $(document).ready(function() {
        toggleLikeIcon();
        toggleSubscrptionForm();
    });

    function toggleLikeIcon() {
        let blogId = '<?php echo $blog_details['blog_id']; ?>';
        if ($.cookie("react_on_blog_id_" + blogId) === "1") {
            $('.not-liked').addClass('d-none');
            $('.liked').removeClass('d-none');
        } else {
            $('.not-liked').removeClass('d-none');
            $('.liked').addClass('d-none');
        }
    }

    function toggleSubscrptionForm() {

        if ($.cookie("is_subscribed") === "1") {
            $('.subscription-form').addClass('d-none');
        } else {
            $('.subscription-form').removeClass('d-none');
        }
    }

    function react() {
        let numberOfLikes = parseInt($('#number-of-likes').text());
        let blogId = '<?php echo $blog_details['blog_id']; ?>';

        if ($.cookie("react_on_blog_id_" + blogId) == "1") {

            $.removeCookie("react_on_blog_id_" + blogId);

            $.cookie("react_on_blog_id_" + blogId, 0, {
                expires: 90 // the cookie will be expired after 90 days from now.
            });

            if (numberOfLikes > 0) {
                $('#number-of-likes').text(numberOfLikes - 1)
            }

        } else {

            $.removeCookie("react_on_blog_id_" + blogId);

            $.cookie("react_on_blog_id_" + blogId, 1, {
                expires: 90 // the cookie will be expired after 90 days from now.
            });

            if (numberOfLikes => 0) {
                $('#number-of-likes').text(numberOfLikes + 1)
            }
        }

        toggleLikeIcon();

        $.ajax({
            url: '<?php echo site_url('site/react/') ?>' + blogId + '/' + $.cookie("react_on_blog_id_" + blogId),
            success: function(response) {
                // do something magical
            }
        });
    }

    function subscribe() {
        if ($('#checkbox-of-terms-and-condition').is(":checked")) {
            let emailForSubscription = $("#email-for-subscription").val();
            emailForSubscription = emailForSubscription.trim();
            if (!emailForSubscription) {
                toastr.error('<?php echo site_phrase('it_seems_you_provided_an_invalid_email_address'); ?>');
            } else {
                $('.fa-spinner').removeClass('d-none');
                $('.fa-spinner').addClass('fa-spin');
                $.ajax({
                    url: '<?php echo site_url('site/subscribe/') ?>',
                    type: "POST",
                    data: {
                        emailForSubscription: emailForSubscription
                    },
                    success: function(response) {

                        // SAVING TO THE COOKIE FOR NEXT 90 DAYS
                        $.cookie("is_subscribed", 1, {
                            expires: 90 // the cookie will be expired after 90 days from now.
                        });

                        toastr.success('<?php echo site_phrase('thanks_for_subscribing'); ?>');
                        $('.fa-spinner').addClass('d-none');
                        $('.fa-spinner').removeClass('fa-spin');
                        toggleSubscrptionForm();
                    }
                });
            }
        } else {
            toastr.error('<?php echo site_phrase('please_agree_the_terms_and_condition_first'); ?>');
        }
    }


    var gRecaptchaResponse;

    function postComment() {
        var response = grecaptcha.getResponse();

        if (response.length == 0) {
            toastr.error('<?php echo site_phrase('you_sure_you_are_not_a_robot'); ?>?');
        } else {
            let name = $('#basic-name').val();
            let email = $('#basic-email').val();
            let comment = $('#basic-comment').val();

            if (!name.trim() || !email.trim() || !comment.trim()) {
                toastr.error('<?php echo site_phrase('fill_all_the_fields_with_valid_info'); ?>');
            } else {
                $('.comment-spinner').removeClass('d-none');
                $.ajax({
                    url: '<?php echo site_url('site/post_comment/') ?>',
                    type: "POST",
                    data: {
                        name: name,
                        email: email,
                        comment: comment,
                        gRecaptchaResponse: gRecaptchaResponse,
                        blogId: '<?php echo $blog_details['blog_id']; ?>'
                    },
                    success: function(response) {
                        if (!response) {
                            toastr.error('<?php echo site_phrase('an_error_occurred'); ?>');
                        } else {
                            toastr.success('<?php echo site_phrase('your_comment_has_been_posted'); ?>');
                        }
                        $('#comment-section').html(response);
                        $('.comment-spinner').addClass('d-none');
                        grecaptcha.reset();
                        $("#comment-form").find("input[type=text], input[type=email],textarea").val("");
                    }
                });
            }
        }
    }

    function captchaCallback(response) {
        gRecaptchaResponse = response;
    }

    function toggleReplyForm(commentId) {
        if ($("#reply-form-for-" + commentId).hasClass('d-none')) {
            $("#reply-form-for-" + commentId).removeClass('d-none');
            $("#reply-form-for-" + commentId).addClass('d-block');
        } else {
            $("#reply-form-for-" + commentId).addClass('d-none');
            $("#reply-form-for-" + commentId).removeClass('d-block');
        }
    }

    function postReply(commentId) {
        let reply = $("#admin-reply-for-" + commentId).val();
        $('.reply-spinner').removeClass('d-none');
        $.ajax({
            url: '<?php echo site_url('site/post_reply/') ?>',
            type: "POST",
            data: {
                reply: reply,
                commentId: commentId,
                blogId: '<?php echo $blog_details['blog_id']; ?>'
            },
            success: function(response) {
                if (!response) {
                    toastr.error('<?php echo site_phrase('an_error_occurred'); ?>');
                } else {
                    toastr.success('<?php echo site_phrase('your_reply_has_been_posted'); ?>');
                }
                $('.reply-spinner').addClass('d-none');
                $('#comment-section').html(response);
            }
        });
    }
</script>