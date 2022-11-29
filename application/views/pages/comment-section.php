<div class="container content-space-1 content-space-lg-3">
         <?php
        $blog_id = isset($blog_details['blog_id']) ? $blog_details['blog_id'] : $blog_id;
        $blog_comments = $this->blog_model->get_comments($blog_id);
    ?>
      <!-- Heading -->
      <div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5 mb-md-9">
        <h2><?php echo $blog_comments->num_rows(); ?> <?php echo site_phrase('Comments'); ?></h2>
      </div>
      <!-- End Heading -->

      <div class="row justify-content-lg-center">
        <div class="col-lg-8">
          <!-- Comment -->
          <ul class="list-comment">
            <!-- Item -->
            <?php foreach ($blog_comments->result_array() as $blog_comments_key => $blog_comment) :
                $replies = $this->blog_model->get_replies($blog_comment['comment_id']); ?>
                <li class="list-comment-item">
                  <!-- Media -->
                  <div class="d-flex align-items-center mb-3">
                    <div class="flex-shrink-0">
                      <img class="avatar avatar-circle" src="<?php echo $this->blog_model->get_commenters_image($blog_comment['commenter_email']); ?>" alt="Image Description">
                    </div>

                    <div class="flex-grow-1 ms-3">
                      <div class="d-flex justify-content-between align-items-center">
                        <h6><?php echo $blog_comment['commenter_name']; ?></h6>
                        <span class="d-block small text-muted"><?php echo get_time_ago($blog_comment['date_added']); ?></span>
                      </div>
                    </div>
                  </div>
                  <!-- End Media -->

                  <p><?php echo $blog_comment['comment']; ?></p>

                  <?php if ($this->session->userdata('admin_login')) : ?>
                    <a href="javascript:void(0)" class="link" onclick="toggleReplyForm('<?php echo $blog_comment['comment_id']; ?>')"><?php echo site_phrase('Reply'); ?></a>
                  <?php endif; ?>
                  <div class="d-none" id="reply-form-for-<?php echo $blog_comment['comment_id']; ?>">
                        <div class="row align-items-center">
                            <div class="col-md-12 col-sm-12 col-xs-12 mt-5">
                                <textarea class="form-control" rows="4" id="admin-reply-for-<?php echo $blog_comment['comment_id']; ?>" name="reply" placeholder="Enter your reply"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-secondary mt-4" type="button" onclick="postReply('<?php echo $blog_comment['comment_id']; ?>')" name="submit">
                                    <?php echo site_phrase('post_reply'); ?> <i class="bi-reply"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                  <!-- Comment -->
                  <ul class="list-comment">
                    <!-- Item -->
                    <?php foreach ($replies->result_array() as $replyKey => $reply) : ?>
                        <li class="list-comment-item">
                          <!-- Media -->
                          <div class="d-flex align-items-center mb-3">
                            <div class="flex-shrink-0">
                              <img class="avatar avatar-circle" src="<?php echo $this->blog_model->get_commenters_image($reply['commenter_email']); ?>" alt="Image Description">
                            </div>

                            <div class="flex-grow-1 ms-3">
                              <div class="d-flex justify-content-between align-items-center">
                                <h6><?php echo $reply['commenter_name']; ?></h6>
                                <span class="d-block small text-muted"><?php echo get_time_ago($reply['date_added']); ?></span>
                              </div>
                            </div>
                          </div>
                          <!-- End Media -->

                          <p><?php echo $reply['comment']; ?></p>
                        </li>
                    <?php endforeach; ?>
                    <!-- End Item -->
                  </ul>
                  <!-- End Comment -->
                </li>
            <!-- End Item -->
            <?php endforeach; ?>
          </ul>
          <!-- End Comment -->
        </div>
        <!-- End Col -->
      </div>
      <!-- End Row -->
    </div>
    <!-- End Comment -->