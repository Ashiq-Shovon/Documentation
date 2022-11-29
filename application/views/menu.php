<!-- <header id="header" class="navbar navbar-expand-lg navbar-end navbar-absolute-top navbar-light navbar-show-hide"
    data-hs-header-options='{
    "fixMoment": 1000,
    "fixEffect": "slide"
    }'> -->
<header id="header"
    class="navbar navbar-expand-lg navbar-end navbar-absolute-top navbar-light navbar-show-hide navbar-scrolled"
    data-hs-header-options='{
    "fixMoment": 100,
    "fixEffect": "slide"
    }' style="z-index: 2000; position: fixed !important;
  top: 0 !important;
  left: 0 !important;
  right: 0 !important;
  bottom: auto !important;
  background-color: #fff; padding-top: 0px;">


    
    <?php echo htmlspecialchars_decode(get_settings('campaign_bar')) ?> 

    <div class="container">
        <nav class="js-mega-menu navbar-nav-wrap">
            <!-- Default Logo -->
            <a class="navbar-brand" href="<?php echo site_url(''); ?>" aria-label="Front">
                <img class="navbar-brand-logo"
                    src="<?php echo base_url('assets/pages/common/logo-fast-blue-black-big.png'); ?>" alt="Logo"
                    style="min-width: 12rem;">
            </a>
            <!-- End Default Logo -->
            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-default">
                    <i class="bi-list"></i>
                </span>
                <span class="navbar-toggler-toggled">
                    <i class="bi-x"></i>
                </span>
            </button>
            <!-- End Toggler -->
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <div class="navbar-absolute-top-scroller">
                    <ul class="navbar-nav">
                        <!-- Products -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url("") ?>" role="button"
                                aria-expanded="false">Home</a>
                        </li>
                        <li class="hs-has-mega-menu nav-item">
                            <a id="landingsMegaMenu" class="hs-mega-menu-invoker nav-link dropdown-toggle"
                                aria-current="page" href="https://www.creativeitem.com/products" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Products</a>
                            <!-- Mega Menu -->
                            <div class="hs-mega-menu dropdown-menu w-100" aria-labelledby="demosMegaMenu"
                                style="min-width: 40rem;">
                                <!-- Promo -->
                                <div class="navbar-dropdown-menu-promo">
                                    <!-- Promo Item -->
                                    <div class="navbar-dropdown-menu-promo-item">
                                        <!-- Promo Link -->
                                        <a class="navbar-dropdown-menu-promo-link"
                                            href="<?php echo site_url('academy'); ?>">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <img class="mt-2"
                                                        src="<?php echo site_url('uploads/frontend/academy/menu-logo-academy.png'); ?>"
                                                        alt="Logo" style="width: 35px;">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <span class="navbar-dropdown-menu-media-title">Academy Lms</span>
                                                    <p class="navbar-dropdown-menu-media-desc">Online learning
                                                        management system.</p>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- End Promo Link -->
                                    </div>

                                    <!-- End Promo Item -->
                                    <!-- Promo Item -->
                                    <div class="navbar-dropdown-menu-promo-item">
                                        <!-- Promo Link -->
                                        <a class="navbar-dropdown-menu-promo-link "
                                            href="<?php echo base_url("neoflex") ?>">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <img src="<?php echo site_url('uploads/frontend/neoflex/neoflex-logo.jpeg'); ?>"
                                                        alt="Logo" style="width: 60px;">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <span class="navbar-dropdown-menu-media-title">Neoflex Movie
                                                        Portal</span>
                                                    <p class="navbar-dropdown-menu-media-desc">Video subscription system
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- End Promo Link -->
                                    </div>
                                    <!-- End Promo Item -->
                                    <!-- Promo Item -->
                                    <div class="navbar-dropdown-menu-promo-item">
                                        <!-- Promo Link -->
                                        <a class="navbar-dropdown-menu-promo-link "
                                            href="<?php echo base_url("learny") ?>">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <span class="svg-icon svg-icon-sm text-primary">
                                                        <img class="mt-1"
                                                            src="<?php echo site_url('uploads/frontend/learny/menu-logo-learny.png'); ?>"
                                                            alt="Logo" style="width: 45px;">
                                                    </span>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <span class="navbar-dropdown-menu-media-title">Learny Lms Wordpress
                                                        Plugin</span>
                                                    <p class="navbar-dropdown-menu-media-desc">Lms for your wordpress
                                                        website</p>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- End Promo Link -->
                                    </div>
                                    <!-- End Promo Item -->
                                </div>
                                <!-- End Promo -->
                                <!-- Promo -->
                                <div class="navbar-dropdown-menu-promo">
                                    <!-- Promo Item -->
                                    <div class="navbar-dropdown-menu-promo-item">
                                        <!-- Promo Link -->
                                        <a class="navbar-dropdown-menu-promo-link "
                                            href="<?php echo site_url('ekattor') ?>">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <span class="svg-icon svg-icon-sm text-primary">
                                                        <img class="mt-1"
                                                            src="<?php echo site_url('uploads/frontend/ekattor/menu-logo-ekattor.png'); ?>"
                                                            alt="Logo" style="width: 45px;">
                                                    </span>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <span class="navbar-dropdown-menu-media-title">Ekattor School Erp
                                                    </span>
                                                    <p class="navbar-dropdown-menu-media-desc">Run your school
                                                        completely online</p>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- End Promo Link -->
                                    </div>
                                    <!-- End Promo Item -->
                                    <!-- Promo Item -->
                                    <div class="navbar-dropdown-menu-promo-item">
                                        <!-- Promo Link -->
                                        <a class="navbar-dropdown-menu-promo-link "
                                            href="<?php echo base_url("mastery") ?>">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <span class="svg-icon svg-icon-sm text-primary">
                                                        <img class="mt-1"
                                                            src="<?php echo base_url(); ?>uploads/frontend/mastery/mastery-logo.png"
                                                            alt="Atlas Logo" style="width: 45px;">
                                                    </span>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <span class="navbar-dropdown-menu-media-title">Mastery Subscription
                                                        Lms</span>
                                                    <p class="navbar-dropdown-menu-media-desc">Choose an online store
                                                        &amp; get your business online today!</p>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- End Promo Link -->
                                    </div>
                                    <!-- End Promo Item -->
                                    <!-- Promo Item -->
                                    <div class="navbar-dropdown-menu-promo-item">
                                        <!-- Promo Link -->
                                        <a class="navbar-dropdown-menu-promo-link " href="javascript:;">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <span class="svg-icon svg-icon-sm text-primary">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3"
                                                                d="M18 10V20C18 20.6 18.4 21 19 21C19.6 21 20 20.6 20 20V10H18Z"
                                                                fill="#035A4B" />
                                                            <path opacity="0.3"
                                                                d="M11 10V17H6V1ΩH4V20C4 20.6 4.4 21 5 21H12C12.6 21 13 20.6 13 20V10H11Z"
                                                                fill="#035A4B" />
                                                            <path opacity="0.3"
                                                                d="M10 10C10 11.1 9.1 12 8 12C6.9 12 6 11.1 6 10H10Z"
                                                                fill="#035A4B" />
                                                            <path opacity="0.3"
                                                                d="M18 10C18 11.1 17.1 12 16 12C14.9 12 14 11.1 14 10H18Z"
                                                                fill="#035A4B" />
                                                            <path opacity="0.3" d="M14 4H10V10H14V4Z" fill="#035A4B" />
                                                            <path opacity="0.3" d="M17 4H20L22 10H18L17 4Z"
                                                                fill="#035A4B" />
                                                            <path opacity="0.3" d="M7 4H4L2 10H6L7 4Z" fill="#035A4B" />
                                                            <path
                                                                d="M6 10C6 11.1 5.1 12 4 12C2.9 12 2 11.1 2 10H6ZM10 10C10 11.1 10.9 12 12 12C13.1 12 14 11.1 14 10H10ZM18 10C18 11.1 18.9 12 20 12C21.1 12 22 11.1 22 10H18ZM19 2H5C4.4 2 4 2.4 4 3V4H20V3C20 2.4 19.6 2 19 2ZM12 17C12 16.4 11.6 16 11 16H6C5.4 16 5 16.4 5 17C5 17.6 5.4 18 6 18H11C11.6 18 12 17.6 12 17Z"
                                                                fill="#035A4B" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <span class="navbar-dropdown-menu-media-title">Coursepro WordPress
                                                        Theme </span>
                                                    <p class="navbar-dropdown-menu-media-desc">WordPress theme for
                                                        learny lms</p>
                                                    <span class="badge bg-success rounded-pill">Coming Soon</span>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- End Promo Link -->
                                    </div>
                                    <!-- End Promo Item -->
                                </div>
                                <!-- End Promo -->
                                <!-- Promo -->
                                <div class="navbar-dropdown-menu-promo">
                                    <!-- Promo Item -->
                                    <div class="navbar-dropdown-menu-promo-item">
                                        <!-- Promo Link -->
                                        <a class="navbar-dropdown-menu-promo-link "
                                            href="<?php echo base_url("atlas") ?>">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <span class="svg-icon svg-icon-sm text-primary">
                                                        <img class="mt-1"
                                                            src="<?php echo site_url('uploads/frontend/atlas/atlas-favicon.png'); ?>"
                                                            alt="Atlas Logo" style="width: 45px;">
                                                    </span>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <span class="navbar-dropdown-menu-media-title">Atlas Directory
                                                        Listing</span>
                                                    <p class="navbar-dropdown-menu-media-desc">A customer service demo
                                                        that helps you balance customer needs.</p>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- End Promo Link -->
                                    </div>
                                    <!-- End Promo Item -->
                                    <!-- Promo Item -->
                                    <div class="navbar-dropdown-menu-promo-item">
                                        <!-- Promo Link -->
                                        <a class="navbar-dropdown-menu-promo-link"
                                            href="<?php echo base_url("checkout")?>">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0">
                                                    <span class="svg-icon svg-icon-sm text-primary">
                                                        <img class="mt-1"
                                                            src="<?php echo site_url('uploads/frontend/checkout/checkout-favicon.png'); ?>"
                                                            alt="Atlas Logo" style="width: 45px;">
                                                    </span>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <span class="navbar-dropdown-menu-media-title">Checkout Online
                                                        Grocery Store</span>
                                                    <p class="navbar-dropdown-menu-media-desc">
                                                        Send us your suggestions
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- End Promo Link -->
                                    </div>
                                    <!-- End Promo Item -->
                                    <!-- Promo Item -->
                                    <div class="navbar-dropdown-menu-promo-item">
                                        <!-- Promo Link -->
                                        <a class="btn btn-primary mt-3" href="<?php echo site_url('products'); ?>">
                                            All products
                                            <i class="bi bi-arrow-right"></i>
                                        </a>
                                        <!-- End Promo Link -->
                                    </div>
                                    <!-- End Promo Item -->
                                </div>
                                <!-- End Promo -->
                            </div>
                            <!-- End Mega Menu -->
                        </li>
                        <!-- End Products -->
                        <!-- Products -->

                        <!-- End Products -->
                        <!-- Documentation -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url("docs") ?>" role="button"
                                aria-expanded="false">Documentation</a>
                        </li>
                        <!-- End Documentation -->
                        <!-- Blog -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url("blog") ?>" role="button"
                                aria-expanded="false">Blog</a>
                        </li>
                        <!-- End Blog -->
                        <!-- Contact -->
                        <li class="nav-item">
                            <a class="nav-link" href="https://creativeitem.zendesk.com/hc/en-us/requests/new"
                                target="_blank" role="button" aria-expanded="false">Contact us</a>
                        </li>
                        <!-- End Contact -->
                        <!-- Button -->
                        <li class="nav-item">
                            <a class="btn btn-primary btn-transition" href="<?php echo site_url("login") ?>">Login</a>
                        </li>
                        <!-- End Button -->
                    </ul>
                </div>
            </div>
            <!-- End Collapse -->
        </nav>
    </div>
</header>