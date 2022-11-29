<!-- end page title -->
<section class=" pt-0  pt-5 margin-6-rem-top">
    <div class="container">
        <div class="row">
            <!-- start sidebar -->
            <aside class="col-12 col-lg-3 col-md-4 ">
                <div class="bg-white border-radius-5px box-shadow-medium">
                    <div class="padding-1-rem-lr padding-1-half-rem-tb">
                        <div class="text-center userdata">
                            <div class="circular-img">
                                <img src="<?php echo $this->user_model->get_user_image_url($this->session->userdata('user_id')); ?>">
                            </div>

                            <div class="username margin-15px-bottom">
                                <?php echo $this->session->userdata('name'); ?>
                            </div>
                        </div>
                        <ul class="list-style-07 user-navigation">
                            <a href="<?php echo site_url('customer/downloads'); ?>">
                                <li class="<?php if ($active_page == "downloads") echo 'active'; ?>"> <i class="fas fa-cloud-download-alt"></i> <?php echo site_phrase('your_downloads'); ?></li>
                            </a>
                            <a href="<?php echo site_url('customer/profile'); ?>">
                                <li class="<?php if ($active_page == "profile") echo 'active'; ?>"> <i class="fas fa-user-cog"></i> <?php echo site_phrase('profile'); ?></li>
                            </a>
                            <a href="https://creativeitem.zendesk.com/hc/en-us/requests/new" target="_blank">
                                <li class="<?php if ($active_page == "support") echo 'active'; ?>"> <i class="far fa-life-ring"></i> <?php echo site_phrase('support'); ?></li>
                            </a>
                            <a href="<?php echo site_url('login/logout'); ?>">
                                <li class=""> <i class="fas fa-sign-out-alt"></i> <?php echo site_phrase('logout'); ?></li>
                            </a>
                        </ul>
                    </div>
                </div>
            </aside>
            <!-- end sidebar -->

            <!-- STARTING USER PANEL BODY -->
            <div class="col-12 col-lg-9 col-md-8 mt-5 mt-md-0">
                <div class="bg-white border-radius-5px box-shadow-medium min-height-477px">
                    <div class="text-extra-dark-gray font-weight-500 text-extra-large alt-font page-title">
                        <div class="padding-3-rem-lr padding-1-half-rem-tb">
                            <i class="fas fa-quote-left"></i> <?php echo $page_title; ?>
                        </div>
                    </div>
                    <div class="page-body padding-3-rem-lr padding-2-half-rem-tb">
                        <?php include $active_page . '.php'; ?>
                    </div>
                </div>
            </div>
            <!-- ENDING USER PANEL BODY -->
        </div>
    </div>
</section>