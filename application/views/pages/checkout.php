<!-- Hero -->
<div class="position-relative overflow-hidden"
    style="background-image: url(../assets/svg/components/wave-pattern-light.svg); background-color:#09a5be">
    <div
        class="container position-relative zi-2 content-space-t-3 content-space-t-lg-4 content-space-b-2 content-space-b-md-3">
        <div class="row align-items-lg-center">
            <div class="col-lg-6 mb-7 mb-lg-0">
                <!-- Heading -->
                <div class="mb-6">
                    <h1 class="display-6 text-white">

                        <span class="text-warning">
                            <span class="js-typedjs" data-hs-typed-options='{
                      "strings": ["ideal", "fastest", "convenient"],
                      "typeSpeed": 60,
                      "loop": true,
                      "backSpeed": 25,
                      "backDelay": 1500
                    }'></span>
                        </span>
                        <br>
                        Checkout
                    </h1>

                    <p class="lead text-white-70">Checkout is a complete solution for creating an online grocery store.
                        Sell your products by taking orders from customers and grow your grocery business.</p>
                </div>
                <!-- End Title & Description -->

                <div class="d-grid d-sm-flex gap-3">
                    <a class="btn btn-dark btn-transition"
                        href="https://demo.creativeitem.com/index.php?product=checkout" target="_blank"><i
                            class="bi  bi-credit-card-fill"></i> Buy now</a>
                    <a class="btn btn-warning btn-transition" href="https://www.youtube.com/playlist?list=PLR1GrQCi5ZqsTvA8F5rtMAeXepfIvKk0V"
                        target="_blank">
                        <i class="bi bi-display"></i> Watch video <i class="bi-chevron-right small ms-1"></i></a>
                    <a class="btn btn-warning btn-transition"
                        href="<?php echo base_url('docs') ?>/checkout/what-is-checkout" target="_blank">
                        <i class="bi bi-book"></i> documentation <i class="bi-chevron-right small ms-1"></i></a>
                </div>
            </div>
            <!-- End Col -->
            <style>
            @media screen and (max-width:992px) {
                .responsive {
                    width: 90%;
                    height: auto;
                    margin: 0 auto;
                }

            }
            </style>
            <div class="col-lg-6 ">
                <div class="position-relative">
                    <!-- Browser Device -->
                    <div id="youTubeVideoPlayer" class="video-player video-player-inline-btn bg-transparent "
                        style="height:340px">

                        <img class="video-player-preview responsive"
                            src="<?php echo base_url('uploads/frontend/checkout/checkout-thumbnail.png'); ?>"
                            alt="Checkout Checkout online grocery store" height="300px">

                        <!-- Play Button -->
                        <a class="js-inline-video-player video-player-btn video-player-centered" href="javascript:;"
                            onclick="add_youtube_iframe();" data-hs-video-player-options="{
                 &quot;videoId&quot;: &quot;HHhJUGQPeU&quot;,
                 &quot;parentSelector&quot;: &quot;#youTubeVideoPlayer&quot;,
                 &quot;targetSelector&quot;: &quot;#youTubeVideoIframe&quot;,
                 &quot;isAutoplay&quot;: true
               }">
                            <span class="video-player-icon shadow-sm">
                                <i class="bi-play-fill" style="color:red"></i>
                            </span>
                        </a>
                        <!-- End Play Button -->
                    </div>
                    <script type="text/javascript">
                    function add_youtube_iframe() {
                        $('#youTubeVideoPlayer').html(
                            '<iframe width="642" height="340" src="https://www.youtube.com/embed/ZIBbVzIrzyg?controls=0&autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
                        );


                    }
                    </script>
                    <!-- End Browser Device -->


                </div>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>

    <!-- Shape -->

    <!-- End Shape -->
</div>
<!-- End Hero -->
<div class="container content-space-1">
    <!-- Heading -->

    <div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5">
        <h1 class="display-6">3 Apps included</h1>
    </div>
    <div class="card">
        <div class="row mb-5 mb-md-0">
            <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0 ">
                <!-- Card -->
                <div class="card card-sm h-100 text-center">
                    <div class="p-2">
                        <img class="card-img"
                            src="<?php echo base_url("uploads/frontend/checkout/screenshots/admin/admin_photo.jpg"); ?>"
                            alt="Checkout Image Description">
                    </div>

                    <div class="card-body">
                        <h1 class="card-title ">1. Admin web <br> app</h1>
                        <p class="card-text">Create your own grocery store with a robust backend web application. Upload
                            and manage your products. Deliver your orders to customers and earn money.</p>

                    </div>
                    <div class="border-top"></div>
                    <div class="m-2">
                        <a class="btn btn-primary btn-transition"
                            href="https://demo.creativeitem.com/index.php?product=checkout" target="_blank"><i
                                class="bi bi-display"></i> Watch demo</a>

                    </div>


                </div>
                <!-- End Card -->
            </div>
            <!-- End Col -->

            <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
                <!-- Card -->
                <div class="card card-sm h-100 text-center">
                    <div class="p-2">
                        <img class="card-img"
                            src="<?php echo base_url("uploads/frontend/checkout/screenshots/customer/customer.jpg"); ?>"
                            alt="Image Description">
                    </div>

                    <div class="card-body">
                        <h1 class="card-title ">2. Customer mobile <br>app</h1>
                        <p class="card-text">Customers download and log in to the mobile app. They can order products,
                            add wish lists, and make payments through several gateways along with cash on delivery
                            options.
                        </p>

                        <!-- List Pointer -->

                        <!-- End List Pointer -->
                    </div>
                    <div class="border-top"></div>
                    <div class="m-2 ">
                        <a class="btn btn-primary btn-transition"
                            href="https://drive.google.com/file/d/1zPScrvUXizqYozVwdpAWi6anzkHilM83/view?usp=sharing"
                            target="_blank"><i class="bi bi-download"></i> Download demo app</a>

                    </div>


                </div>
                <!-- End Card -->
            </div>
            <!-- End Col -->

            <div class="col-sm-6 col-lg-4">
                <!-- Card -->
                <div class="card card-sm h-100 text-center">
                    <div class="p-2">
                        <img class="card-img"
                            src="<?php echo base_url("uploads/frontend/checkout/screenshots/delivery-boy/delivery_boy.jpg"); ?>"
                            alt="Image Description">
                    </div>

                    <div class="card-body">
                        <h1 class="card-title">3. Delivery boy mobile app</h1>
                        <p class="card-text">The delivery boy logs in to the mobile application to deliver the products.
                            They deliver products to the customers, update order status, and receive payments.</p>


                    </div>
                    <div class="border-top"></div>
                    <div class="m-2 d-grid justify-content-center">
                        <a class="btn btn-primary btn-transition"
                            href="https://drive.google.com/file/d/1-g3-mJOUA1kfOeiZO8dJDMh4aL0Mn1F3/view?usp=sharing"
                            target="_blank"><i class="bi bi-download"></i> Downoad demo app</a>

                    </div>


                </div>
                <!-- End Card -->
            </div>
            <!-- End Col -->
        </div>
    </div>
    <!-- End Row -->
</div>
<div class="container text-center mt-4">
    <h1 class="display-6">How admin manages own store</h1>
</div>

<div class="container content-space-1">



    <div class="w-xxl-65 w-xl-75 w-lg-75 w-md-75 w-sm-100 w-xs-100  mx-auto">
        <h1 class="text-center">Order management</h1>
        <p class="text-center">
            You can manage the orders, update the status, cancel or delete the orders if required. Approve the pending
            orders and assign them to the delivery boy for processing and delivery. If the payment is in cash on
            delivery, the delivery boy will collect payment after delivering the product.
        </p>

    </div>
    <div class="py-4 w-100 text-center ">
        <a class="btn btn-outline-primary me-1 mb-1" href="https://www.youtube.com/watch?v=YQcTTnNmPzU&list=PLR1GrQCi5ZqsTvA8F5rtMAeXepfIvKk0V&index=3" target="_blank">
            <i class="bi bi-display"></i>
            Watch video
        </a>
        <a class="btn btn-outline-secondary me-1 mb-1" href="<?php echo site_url('docs') ?>/checkout/pending-orders"
            target="_blank">
            <i class="bi bi-journal-code"></i>
            Read documentation
        </a>

    </div>

    <div class="row">
        <div class="col-xl-6 col-xxl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <figure class="device-browser">
                <div class="device-browser-header">
                    <div class="device-browser-header-btn-list">
                        <span class="device-browser-header-btn-list-btn"></span>
                        <span class="device-browser-header-btn-list-btn"></span>
                        <span class="device-browser-header-btn-list-btn"></span>
                    </div>
                    <div class="device-browser-header-browser-bar">www.creativeitem.com</div>
                </div>

                <div class="device-browser-frame">

                    <a class="media-viewer"
                        href="<?php echo base_url('uploads/frontend/checkout/screenshots/admin/checkout-order-management-1.png') ?>"
                        data-fslightbox="jobOverviewGallery">
                        <img class="device-browser-img"
                            src="<?php echo base_url('uploads/frontend/checkout/screenshots/admin/checkout-order-management-1.png') ?>"
                            alt="Checkout order management" title="Checkout order management">
                        <span class="media-viewer-container">
                            <span class="media-viewer-icon">
                                <i class="bi-plus media-viewer-icon-inner"></i>
                            </span>
                        </span>
                    </a>
                </div>
            </figure>

        </div>
        <div class="col-xl-6 col-xxl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 mt-sm-4 mt-xs-4">
            <figure class="device-browser">
                <div class="device-browser-header">
                    <div class="device-browser-header-btn-list">
                        <span class="device-browser-header-btn-list-btn"></span>
                        <span class="device-browser-header-btn-list-btn"></span>
                        <span class="device-browser-header-btn-list-btn"></span>
                    </div>
                    <div class="device-browser-header-browser-bar">www.creativeitem.com</div>
                </div>
                <div class="device-browser-frame">

                    <a class="media-viewer"
                        href="<?php echo base_url('uploads/frontend/checkout/screenshots/admin/checkout-order-management-2.png') ?>"
                        data-fslightbox="jobOverviewGallery">
                        <img class="device-browser-img"
                            src="<?php echo base_url('uploads/frontend/checkout/screenshots/admin/checkout-order-management-2.png') ?>"
                            alt="Checkout order management" title="Checkout order management">
                        <span class="media-viewer-container">
                            <span class="media-viewer-icon">
                                <i class="bi-plus media-viewer-icon-inner"></i>
                            </span>
                        </span>
                    </a>
                </div>
            </figure>
        </div>
        <!-- End Col -->


        <!-- End Col -->
    </div>
    <!-- End Row -->

</div>

<div class="container content-space-1">


    <div class="w-xxl-65 w-xl-75 w-lg-75 w-md-75 w-sm-100 w-xs-100  mx-auto">
        <h1 class="text-center">Product management</h1>

        <p class="text-center">You can find the available products inside the products menu. Add products from the
            products list or menu
            with all necessary data. You can create units and add dynamic product units.</p>

    </div>
    <div class="py-4 w-100 text-center ">
        <a class="btn btn-outline-primary me-1 mb-1" href="https://www.youtube.com/watch?v=YQcTTnNmPzU&list=PLR1GrQCi5ZqsTvA8F5rtMAeXepfIvKk0V&index=3" target="_blank">
            <i class="bi bi-display"></i>
            Watch video
        </a>
        <a class="btn btn-outline-secondary me-1 mb-1"
            href="<?php echo site_url('docs') ?>/checkout/how-to-add-a-product" target="_blank">
            <i class="bi bi-journal-code"></i>
            Read documentation
        </a>

    </div>
    <div class="row">
        <div class="col-xl-6 col-xxl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <figure class="device-browser">
                <div class="device-browser-header">
                    <div class="device-browser-header-btn-list">
                        <span class="device-browser-header-btn-list-btn"></span>
                        <span class="device-browser-header-btn-list-btn"></span>
                        <span class="device-browser-header-btn-list-btn"></span>
                    </div>
                    <div class="device-browser-header-browser-bar">www.creativeitem.com</div>
                </div>

                <div class="device-browser-frame">

                    <a class="media-viewer"
                        href="<?php echo base_url('uploads/frontend/checkout/screenshots/admin/checkout_product_info.jpg') ?>"
                        data-fslightbox="jobOverviewGallery">
                        <img class="device-browser-img"
                            src="<?php echo base_url('uploads/frontend/checkout/screenshots/admin/checkout_product_info.jpg') ?>"
                            alt="Checkout product info" title="Checkout product info">
                        <span class="media-viewer-container">
                            <span class="media-viewer-icon">
                                <i class="bi-plus media-viewer-icon-inner"></i>
                            </span>
                        </span>
                    </a>
                </div>
            </figure>

        </div>
        <div class="col-xl-6 col-xxl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 mt-sm-4 mt-xs-4">
            <figure class="device-browser">
                <div class="device-browser-header">
                    <div class="device-browser-header-btn-list">
                        <span class="device-browser-header-btn-list-btn"></span>
                        <span class="device-browser-header-btn-list-btn"></span>
                        <span class="device-browser-header-btn-list-btn"></span>
                    </div>
                    <div class="device-browser-header-browser-bar">www.creativeitem.com</div>
                </div>
                <div class="device-browser-frame">

                    <a class="media-viewer"
                        href="<?php echo base_url('uploads/frontend/checkout/screenshots/admin/checkout_product_info_2.jpg') ?>"
                        data-fslightbox="jobOverviewGallery">
                        <img class="device-browser-img"
                            src="<?php echo base_url('uploads/frontend/checkout/screenshots/admin/checkout_product_info_2.jpg') ?>"
                            alt="Checkout product info" title="Checkout product info">
                        <span class="media-viewer-container">
                            <span class="media-viewer-icon">
                                <i class="bi-plus media-viewer-icon-inner"></i>
                            </span>
                        </span>
                    </a>
                </div>
            </figure>
        </div>
        <!-- End Col -->


        <!-- End Col -->
    </div>

</div>
<div class="container content-space-1">


    <!-- End Row -->


    <div class="w-xxl-65 w-xl-75 w-lg-75 w-md-75 w-sm-100 w-xs-100  mx-auto">
        <h1 class="text-center">Category management</h1>

        <p class="text-center">You can add multiple categories to make your store more user-friendly. Add parent, sub,
            and sub sub
            categories for your products in your grocery store.</p>
    </div>
    <div class="py-4 w-100 text-center ">
        <a class="btn btn-outline-primary me-1 mb-1" href="https://www.youtube.com/watch?v=YQcTTnNmPzU&list=PLR1GrQCi5ZqsTvA8F5rtMAeXepfIvKk0V&index=3" target="_blank">
            <i class="bi bi-display"></i>
            Watch video
        </a>
        <a class="btn btn-outline-secondary me-1 mb-1"
            href="<?php echo site_url('docs') ?>/checkout/how-to-create-a-category" target="_blank">
            <i class="bi bi-journal-code"></i>
            Read documentation
        </a>

    </div>



    <div class="row">
        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <figure class="device-browser">
                <div class="device-browser-header">
                    <div class="device-browser-header-btn-list">
                        <span class="device-browser-header-btn-list-btn"></span>
                        <span class="device-browser-header-btn-list-btn"></span>
                        <span class="device-browser-header-btn-list-btn"></span>
                    </div>
                    <div class="device-browser-header-browser-bar">www.creativeitem.com</div>
                </div>
                <div class="device-browser-frame">

                    <a class="media-viewer"
                        href="<?php echo base_url('uploads/frontend/checkout/screenshots/admin/checkout-parent-category.jpg') ?>"
                        data-fslightbox="jobOverviewGallery">
                        <img class="device-browser-img"
                            src="<?php echo base_url('uploads/frontend/checkout/screenshots/admin/checkout-parent-category.jpg') ?>"
                            alt="Checkout parent category" title="Checkout parent category">
                        <span class="media-viewer-container">
                            <span class="media-viewer-icon">
                                <i class="bi-plus media-viewer-icon-inner"></i>
                            </span>
                        </span>
                    </a>
                </div>
            </figure>

        </div>
        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 mt-sm-4 mt-xs-4">


            <figure class="device-browser">
                <div class="device-browser-header">
                    <div class="device-browser-header-btn-list">
                        <span class="device-browser-header-btn-list-btn"></span>
                        <span class="device-browser-header-btn-list-btn"></span>
                        <span class="device-browser-header-btn-list-btn"></span>
                    </div>
                    <div class="device-browser-header-browser-bar">www.creativeitem.com</div>
                </div>
                <div class="device-browser-frame">

                    <a class="media-viewer"
                        href="<?php echo base_url('uploads/frontend/checkout/screenshots/admin/checkout-sub-category.jpg') ?>"
                        data-fslightbox="jobOverviewGallery">
                        <img class="device-browser-img"
                            src="<?php echo base_url('uploads/frontend/checkout/screenshots/admin/checkout-sub-category.jpg') ?>"
                            alt="Checkout sub category" title="Checkout sub category">
                        <span class="media-viewer-container">
                            <span class="media-viewer-icon">
                                <i class="bi-plus media-viewer-icon-inner"></i>
                            </span>
                        </span>
                    </a>
                </div>
            </figure>
        </div>
        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 mt-sm-4 mt-xs-4">


            <figure class="device-browser">
                <div class="device-browser-header">
                    <div class="device-browser-header-btn-list">
                        <span class="device-browser-header-btn-list-btn"></span>
                        <span class="device-browser-header-btn-list-btn"></span>
                        <span class="device-browser-header-btn-list-btn"></span>
                    </div>
                    <div class="device-browser-header-browser-bar">www.creativeitem.com</div>
                </div>
                <div class="device-browser-frame">

                    <a class="media-viewer"
                        href="<?php echo base_url('uploads/frontend/checkout/screenshots/admin/checkout-sub-sub-category.jpg') ?>"
                        data-fslightbox="jobOverviewGallery">
                        <img class="device-browser-img"
                            src="<?php echo base_url('uploads/frontend/checkout/screenshots/admin/checkout-sub-sub-category.jpg') ?>"
                            alt="Checkout sub sub category" title="Checkout sub sub category">
                        <span class="media-viewer-container">
                            <span class="media-viewer-icon">
                                <i class="bi-plus media-viewer-icon-inner"></i>
                            </span>
                        </span>
                    </a>
                </div>
            </figure>
        </div>
    </div>

</div>
<div class="container content-space-1">





    <div class="row align-items-lg-center">
        <div class="col-lg-5 mb-5 mb-lg-0 order-lg-2 ">



            <div class="pe-lg-6 w-xxl-65 w-xl-75 w-lg-75 w-md-75 w-sm-75 w-xs-100  mx-auto ">

                <h1 class="">Managing customer</h1>

                <p>You can manage your customer's account from the administrative panel. Here you can add a customer
                    manually, update their info, password, etc.</p>




            </div>
            <div class="py-4 w-100 text-center ">
                <a class="btn btn-outline-primary me-1 mb-1" href="https://www.youtube.com/watch?v=3Z2GsvdDAbI&list=PLR1GrQCi5ZqsTvA8F5rtMAeXepfIvKk0V&index=5" target="_blank">
                    <i class="bi bi-display"></i>
                    Watch video
                </a>
                <a class="btn btn-outline-secondary me-1 mb-1"
                    href="<?php echo site_url('docs') ?>/checkout/how-to-add-a-customer-manually" target="_blank">
                    <i class="bi bi-journal-code"></i>
                    Read documentation
                </a>

            </div>
        </div>


        <!-- End Col -->

        <div class="col-lg-7 order-lg-1">
            <!-- Browser Device -->
            <figure class="device-browser">
                <div class="device-browser-header">
                    <div class="device-browser-header-btn-list">
                        <span class="device-browser-header-btn-list-btn"></span>
                        <span class="device-browser-header-btn-list-btn"></span>
                        <span class="device-browser-header-btn-list-btn"></span>
                    </div>
                    <div class="device-browser-header-browser-bar">www.creativeitem.com</div>
                </div>
                <div class="device-browser-frame">

                    <a class="media-viewer"
                        href="<?php echo base_url('uploads/frontend/checkout/screenshots/admin/checkout-add-customer.jpg') ?>"
                        data-fslightbox="jobOverviewGallery">
                        <img class="device-browser-img"
                            src="<?php echo base_url('uploads/frontend/checkout/screenshots/admin/checkout-add-customer.jpg') ?>"
                            alt="Checkout payment history" title="Checkout payment history">
                        <span class="media-viewer-container">
                            <span class="media-viewer-icon">
                                <i class="bi-plus media-viewer-icon-inner"></i>
                            </span>
                        </span>
                    </a>
                </div>
            </figure>
            <!-- End Browser Device -->
        </div>
        <!-- End Col -->
    </div>

</div>
<div class="container content-space-1">





    <div class="row align-items-lg-center">
        <div class="col-lg-5 mb-5 mb-lg-0 order-lg-1 ">


            <h1 class="text-center ms-3">Managing delivery boy</h1>
            <div class="pe-lg-6 w-xxl-65 w-xl-75 w-lg-75 w-md-75 w-sm-75 w-xs-100  mx-auto">



                <p>You can find the delivery boy list in their corresponding menus. Here you can add an account, manage
                    info, password and monitor their account. </p>




            </div>
            <div class="py-4 w-100 text-center ">
                <a class="btn btn-outline-primary me-1 mb-1" href="https://www.youtube.com/watch?v=3Z2GsvdDAbI&list=PLR1GrQCi5ZqsTvA8F5rtMAeXepfIvKk0V&index=5" target="_blank">
                    <i class="bi bi-display"></i>
                    Watch video
                </a>
                <a class="btn btn-outline-secondary me-1 mb-1"
                    href="<?php echo site_url('docs') ?>/checkout/how-to-add-a-delivery-boy" target="_blank">
                    <i class="bi bi-journal-code"></i>
                    Read documentation
                </a>

            </div>
        </div>

        <!-- End Col -->

        <div class="col-lg-7 order-lg-2">
            <!-- Browser Device -->
            <figure class="device-browser">
                <div class="device-browser-header">
                    <div class="device-browser-header-btn-list">
                        <span class="device-browser-header-btn-list-btn"></span>
                        <span class="device-browser-header-btn-list-btn"></span>
                        <span class="device-browser-header-btn-list-btn"></span>
                    </div>
                    <div class="device-browser-header-browser-bar">www.creativeitem.com</div>
                </div>
                <div class="device-browser-frame">

                    <a class="media-viewer"
                        href="<?php echo base_url('uploads/frontend/checkout/screenshots/admin/checkout-add-delivery-boy.jpg') ?>"
                        data-fslightbox="jobOverviewGallery">
                        <img class="device-browser-img"
                            src="<?php echo base_url('uploads/frontend/checkout/screenshots/admin/checkout-add-delivery-boy.jpg') ?>"
                            alt="Checkout payment history" title="Checkout payment history">
                        <span class="media-viewer-container">
                            <span class="media-viewer-icon">
                                <i class="bi-plus media-viewer-icon-inner"></i>
                            </span>
                        </span>
                    </a>
                </div>
            </figure>
            <!-- End Browser Device -->
        </div>
        <!-- End Col -->
    </div>

</div>

<div class="container content-space-1">

    <div class="row align-items-lg-center">
        <div class="col-lg-5 mb-5 mb-lg-0 order-lg-2 ">



            <div class="pe-lg-6 w-xxl-65 w-xl-75 w-lg-75 w-md-75 w-sm-75 w-xs-100  mx-auto">

                <h1>Payment History</h1>

                <p>You can overview customer payment history with a customized filtering feature.</p>




            </div>
            <div class="py-4 w-100 text-center ">
                <a class="btn btn-outline-primary me-1 mb-1" href="https://www.youtube.com/watch?v=i6XS84rITWE&list=PLR1GrQCi5ZqsTvA8F5rtMAeXepfIvKk0V&index=6" target="_blank">
                    <i class="bi bi-display"></i>
                    Watch video
                </a>
                <a class="btn btn-outline-secondary me-1 mb-1" href="" target="_blank">
                    <i class="bi bi-journal-code"></i>
                    Read documentation
                </a>

            </div>
        </div>

        <!-- End Col -->

        <div class="col-lg-7 order-lg-1">
            <!-- Browser Device -->
            <figure class="device-browser">
                <div class="device-browser-header">
                    <div class="device-browser-header-btn-list">
                        <span class="device-browser-header-btn-list-btn"></span>
                        <span class="device-browser-header-btn-list-btn"></span>
                        <span class="device-browser-header-btn-list-btn"></span>
                    </div>
                    <div class="device-browser-header-browser-bar">www.creativeitem.com</div>
                </div>
                <div class="device-browser-frame">

                    <a class="media-viewer"
                        href="<?php echo base_url('uploads/frontend/checkout/screenshots/admin/checkout-payment-history.jpg') ?>"
                        data-fslightbox="jobOverviewGallery">
                        <img class="device-browser-img"
                            src="<?php echo base_url('uploads/frontend/checkout/screenshots/admin/checkout-payment-history.jpg') ?>"
                            alt="Checkout payment history" title="Checkout payment history">
                        <span class="media-viewer-container">
                            <span class="media-viewer-icon">
                                <i class="bi-plus media-viewer-icon-inner"></i>
                            </span>
                        </span>
                    </a>
                </div>
            </figure>
            <!-- End Browser Device -->
        </div>
        <!-- End Col -->
    </div>
    <!-- End Row -->

</div>
<div class="container content-space-1">

    <div class="row align-items-lg-center">
        <div class="col-lg-5 mb-5 mb-lg-0">

            <div class="pe-lg-6 w-xxl-65 w-xl-75 w-lg-75 w-md-75 w-sm-75 w-xs-100  mx-auto">

                <h1 class="text-center">Browse dashboard</h1>

                <p>The dashboard shows all the necessary data like monthly
                    sales reports, top products, recent
                    order information. You can overview the orders and sales </p>




            </div>
        </div>
        <!-- End Col -->

        <div class="col-lg-7">

            <figure class="device-browser">
                <div class="device-browser-header">
                    <div class="device-browser-header-btn-list">
                        <span class="device-browser-header-btn-list-btn"></span>
                        <span class="device-browser-header-btn-list-btn"></span>
                        <span class="device-browser-header-btn-list-btn"></span>
                    </div>
                    <div class="device-browser-header-browser-bar">www.creativeitem.com</div>
                </div>
                <div class="device-browser-frame">

                    <a class="media-viewer"
                        href="<?php echo base_url('uploads/frontend/checkout/screenshots/admin/checkout-dashboard.jpg') ?>"
                        data-fslightbox="jobOverviewGallery">
                        <img class="device-browser-img"
                            src="<?php echo base_url('uploads/frontend/checkout/screenshots/admin/checkout-dashboard.jpg') ?>"
                            alt="Checkout browse dashboard" title="Checkout browse dashboard">
                        <span class="media-viewer-container">
                            <span class="media-viewer-icon">
                                <i class="bi-plus media-viewer-icon-inner"></i>
                            </span>
                        </span>
                    </a>
                </div>
            </figure>
        </div>
        <!-- End Col -->
    </div>
    <!-- End Row -->

</div>

<section class="bg-dark"
    style="background-image: url(http://localhost:8888/creativeitem-latest/assets/frontend/front/svg/components/wave-pattern-light.svg)">

    <div class="container content-space-1">
        <div>
            <h1 class="text-center display-6 text-white">How customers order from the app</h1>
        </div>
        <div class="overflow-hidden">
            <div class="container content-space-t-lg-3">
                <div class="row justify-content-lg-between align-items-lg-center">
                    <div class="col-lg-5 order-lg-1 mb-9 mb-lg-0">

                        <!-- End Heading -->
                        <div class="pe-lg-6 w-xxl-100 w-xl-100 w-lg-100 w-md-75 w-sm-75 w-xs-100  mx-auto mt-md-8">

                            <h1 class="text-white">Sign up</h1>

                            <p class="text-white">Your customers can easily register from the
                                mobile app. If they have completed the registration process, just sign in the
                                application.
                            </p>

                        </div>
                        <div class="py-4 w-100 text-center ">
                            <a class="btn btn-sm  w-75 w-md-auto mt-2 mt-md-0 btn-warning" href="" target="_blank">
                                <i class="bi bi-display"></i>
                                Watch demo
                            </a>
                            <a class="btn btn-sm  w-75 w-md-auto mt-2 mt-md-0 btn-secondary"
                                href="<?php echo site_url('docs') ?>/checkout/account-creation-and-sign-in-with-the-mobile-app"
                                target="_blank">
                                <i class="bi bi-journal-code"></i>
                                Read documentation
                            </a>
                        </div>


                    </div>
                    <!-- End Col -->

                    <div class="col-lg-7 order-lg-2">
                        <div class="position-relative mx-auto" data-aos="fade-up">
                            <!-- Mobile Device -->
                            <figure class="device-mobile mx-auto">
                                <div class="device-mobile-frame">
                                    <img class="device-mobile-img"
                                        src="<?php echo base_url('uploads/frontend/checkout/screenshots/customer/checkout-sign-up.jpg') ?>"
                                        alt="Checkout sign up" title="Checkout sign up">
                                </div>
                            </figure>
                            <!-- End Mobile Device -->

                            <!-- SVG Shape -->
                            <div class="position-absolute top-50 start-50 translate-middle" style="width: 25rem;">
                                <img class="img-fluid"
                                    src="<?php echo base_url('uploads/frontend/checkout/screenshots/customer/shape-1.svg') ?>"
                                    alt="Checkout SVG" title="Checkout svg">
                            </div>
                            <!-- End SVG Shape -->
                        </div>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
        </div>
    </div>
    <div class="container content-space-1">
        <div class="overflow-hidden">

            <div class="row justify-content-lg-between align-items-lg-center">
                <div class="col-lg-5 mb-9 mb-lg-0 order-lg-2">
                    <!-- Heading -->
                    <div class="pe-lg-6 w-xxl-100 w-xl-100 w-lg-100 w-md-75 w-sm-75 w-xs-100  mx-auto">
                        <div class="mb-4">
                            <h1 class="text-white">Product View</h2>

                        </div>
                        <!-- End Heading -->

                        <!-- List Checked -->
                        <p class="text-white">Your customers can see the active product list and add products to the
                            cart and wishlist. They can add products to the cart or purchase them directly from the
                            product details page.</p>
                    </div>
                    <!-- End List Checked -->
                    <div class="py-4 w-100 text-center ">

                        <a class="btn btn-sm  w-75 w-md-auto mt-2 mt-md-0 btn-secondary"
                            href="<?php echo site_url('docs') ?>/checkout/customer-mobile-application" target="_blank">
                            <i class="bi bi-journal-code"></i>
                            Read documentation
                        </a>
                    </div>
                </div>
                <!-- End Col -->

                <div class="col-lg-7 order-lg-1">
                    <div class="position-absolute mx-auto " data-aos="fade-up">
                        <!-- Mobile Device -->
                        <figure class="device-mobile mx-auto">
                            <div class="device-mobile-frame">
                                <img class="device-mobile-img"
                                    src="<?php echo base_url('uploads/frontend/checkout/screenshots/customer/checkout-product-details.jpg') ?>"
                                    alt="Checkout product details" title="Checkout product details">
                            </div>
                        </figure>
                        <!-- End Mobile Device -->

                        <!-- SVG Shape -->
                        <div class="position-absolute top-50 start-50 translate-middle" style="width: 25rem;">
                            <img class="img-fluid"
                                src="<?php echo base_url('uploads/frontend/checkout/screenshots/customer/shape-1.svg') ?>"
                                alt="Checkout SVG" title="Checkout SVG">
                        </div>
                        <!-- End SVG Shape -->
                    </div>
                    <div class="position-relative mx-auto mt-6 ms-6" data-aos="fade-up">
                        <!-- Mobile Device -->
                        <figure class="device-mobile mx-auto">
                            <div class="device-mobile-frame">
                                <img class="device-mobile-img"
                                    src="<?php echo base_url('uploads/frontend/checkout/screenshots/customer/checkout-product.jpg') ?>"
                                    alt="Checkout prodct view" title="Checkout prodct view">
                            </div>
                        </figure>
                        <!-- End Mobile Device -->

                        <!-- SVG Shape -->
                        <div class="position-absolute top-50 start-50 translate-middle" style="width: 25rem;">
                            <img class="img-fluid"
                                src="<?php echo base_url('uploads/frontend/checkout/screenshots/customer/shape-1.svg') ?>"
                                alt="Checkout SVG" title="Checkout SVG">
                        </div>
                        <!-- End SVG Shape -->
                    </div>
                </div>
                <!-- End Col -->
            </div>

            <!-- End Row -->

        </div>
    </div>
    <div class="container content-space-1">
        <div class="overflow-hidden">

            <div class="row justify-content-lg-between align-items-lg-center">
                <div class="col-lg-5 order-lg-1 mb-9 mb-lg-0">
                    <!-- Heading -->
                    <div class="pe-lg-6 w-xxl-100 w-xl-100 w-lg-100 w-md-65 w-sm-65 w-xs-100  mx-auto">
                        <div class="mb-5">
                            <h1 class="text-white">Search & Filter</h1>
                            <p class="text-white">Your customers can search for products with keywords.
                                Customers can filter the products by category, offer, and price.
                            </p>
                        </div>
                        <!-- End Heading -->
                    </div>

                    <div class="py-4 w-100 text-center ">
                        <a class="btn btn-sm  w-75 w-md-auto mt-2 mt-md-0 btn-warning" href="" target="_blank">
                            <i class="bi bi-display"></i>
                            Watch video
                        </a>
                        <a class="btn btn-sm  w-75 w-md-auto mt-2 mt-md-0 btn-secondary"
                            href="<?php echo site_url('docs') ?>/checkout/customer-mobile-application" target="_blank">
                            <i class="bi bi-journal-code"></i>
                            Read documentation
                        </a>
                    </div>

                </div>
                <!-- End Col -->

                <div class="col-lg-6 order-lg-2 py-1">
                    <div class="position-relative mx-auto" data-aos="fade-up">
                        <!-- Mobile Device -->
                        <figure class="device-mobile mx-auto">
                            <div class="device-mobile-frame">
                                <img class="device-mobile-img"
                                    src="<?php echo base_url('uploads/frontend/checkout/screenshots/customer/checkout-filter.jpg') ?>"
                                    alt="Checkout filter" title="Checkout filter">
                            </div>
                        </figure>
                        <!-- End Mobile Device -->

                        <!-- SVG Shape -->
                        <div class="position-absolute top-50 start-50 translate-middle" style="width: 25rem;">
                            <img class="img-fluid"
                                src="<?php echo base_url('uploads/frontend/checkout/screenshots/customer/shape-1.svg') ?>"
                                alt="Checkout SVG" title="Checkout SVG">
                        </div>
                        <!-- End SVG Shape -->
                    </div>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->

        </div>
    </div>
    <div class="container content-space-1">
        <div class="overflow-hidden">

            <div class="row justify-content-lg-between align-items-lg-center">
                <div class="col-lg-5 mb-9 mb-lg-0 order-lg-2">
                    <!-- Heading -->

                    <div class="pe-lg-6 w-xxl-100 w-xl-100 w-lg-100 w-md-65 w-sm-65 w-xs-100  mx-auto">
                        <div class="mb-5">
                            <h1 class="text-white">Category List View</h1>
                            <p class="text-white">Customers can visit the category list page and see all products
                                belonging to the selected category.
                            </p>
                        </div>
                        <!-- End Heading -->
                    </div>
                </div>
                <!-- End Col -->

                <div class="col-lg-6 order-lg-1">
                    <div class="position-relative mx-auto" data-aos="fade-up">
                        <!-- Mobile Device -->
                        <figure class="device-mobile mx-auto">
                            <div class="device-mobile-frame">
                                <img class="device-mobile-img"
                                    src="<?php echo base_url('uploads/frontend/checkout/screenshots/customer/checkout-categories.jpg') ?>"
                                    alt="Checkout categories" title="Checkout categories">
                            </div>
                        </figure>
                        <!-- End Mobile Device -->

                        <!-- SVG Shape -->
                        <div class="position-absolute top-50 start-50 translate-middle" style="width: 25rem;">
                            <img class="img-fluid"
                                src="<?php echo base_url('uploads/frontend/checkout/screenshots/customer/shape-1.svg') ?>"
                                alt="Checkout SVG" title="Checkout SVG">
                        </div>
                        <!-- End SVG Shape -->
                    </div>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->

        </div>
    </div>

    <div class="container content-space-1">
        <div class="overflow-hidden">

            <div class="row justify-content-lg-between align-items-lg-center">
                <div class="col-lg-5 mb-9 mb-lg-0">
                    <!-- Heading -->

                    <div class="pe-lg-6 w-xxl-100 w-xl-100 w-lg-100 w-md-65 w-sm-65 w-xs-100  mx-auto">
                        <div class="mb-5">
                            <h1 class="text-white">Wishlist</h1>
                            <ul class="list-checked list-checked-soft-bg-light list-checked-lg">
                                <p class="text-white">Your customers can add any product to the wishlist and order from
                                    here. They can continue their shopping from the wishlist.</p>
                        </div>
                        <!-- End Heading -->
                    </div>
                    <div class="py-4 w-100 text-center ">
                        <a class="btn btn-sm  w-75 w-md-auto mt-2 mt-md-0 btn-warning" href="" target="_blank">
                            <i class="bi bi-display"></i>
                            Watch video
                        </a>
                        <a class="btn btn-sm  w-75 w-md-auto mt-2 mt-md-0 btn-secondary"
                            href="<?php echo site_url('docs') ?>/checkout/managing-wishlist-in-mobile-app"
                            target="_blank">
                            <i class="bi bi-journal-code"></i>
                            Read documentation
                        </a>
                    </div>
                </div>
                <!-- End Col -->

                <div class="col-lg-6">
                    <div class="position-relative mx-auto" data-aos="fade-up">
                        <!-- Mobile Device -->
                        <figure class="device-mobile mx-auto">
                            <div class="device-mobile-frame">
                                <img class="device-mobile-img"
                                    src="<?php echo base_url('uploads/frontend/checkout/screenshots/customer/checkout-wishlist.jpg') ?>"
                                    alt="Checkout wishlist" title="Checkout wishlist">
                            </div>
                        </figure>
                        <!-- End Mobile Device -->

                        <!-- SVG Shape -->
                        <div class="position-absolute top-50 start-50 translate-middle" style="width: 25rem;">
                            <img class="img-fluid"
                                src="<?php echo base_url('uploads/frontend/checkout/screenshots/customer/shape-1.svg') ?>"
                                alt="Checkout SVG" title="Checkout SVG">
                        </div>
                        <!-- End SVG Shape -->
                    </div>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->

        </div>
    </div>
    <div class="container content-space-1">
        <div class="overflow-hidden">

            <div class="row justify-content-lg-between align-items-lg-center">
                <div class="col-lg-5 order-lg-2 mb-9 mb-lg-0">
                    <!-- Heading -->

                    <!-- End Heading -->
                    <div class="pe-lg-6 w-xxl-100 w-xl-100 w-lg-100 w-md-65 w-sm-65 w-xs-100  mx-auto">
                        <div class="mb-5">
                            <h1 class="text-white">Add to cart and buy products</h1>
                            <p class="text-white">Your customers can update the quantity of an added product or remove a
                                product from the cart. The orders can be ready for delivery after confirming the order
                                with the selected payment method. Customers can complete the payment to the delivery boy
                                after receiving the product if the payment method is cash on delivery.</p>
                        </div>
                        <!-- End Heading -->
                    </div>
                    <div class="py-4 w-100 text-center ">
                        <a class="btn btn-sm  w-75 w-md-auto mt-2 mt-md-0 btn-warning" href="" target="_blank">
                            <i class="bi bi-display"></i>
                            Watch video
                        </a>
                        <a class="btn btn-sm  w-75 w-md-auto mt-2 mt-md-0 btn-secondary"
                            href="<?php echo site_url('docs') ?>/checkout/purchasing-product-with-mobile-app"
                            target="_blank">
                            <i class="bi bi-journal-code"></i>
                            Read documentation
                        </a>
                    </div>

                </div>
                <!-- End Col -->

                <div class="col-lg-6 order-lg-1 py-2">
                    <div class="position-relative mx-auto" data-aos="fade-up">
                        <!-- Mobile Device -->
                        <figure class="device-mobile mx-auto">
                            <div class="device-mobile-frame">
                                <img class="device-mobile-img"
                                    src="<?php echo base_url('uploads/frontend/checkout/screenshots/customer/checkout-cart.jpg') ?>"
                                    alt="Checkout cart" title="Checkout cart">
                            </div>
                        </figure>
                        <!-- End Mobile Device -->

                        <!-- SVG Shape -->
                        <div class="position-absolute top-50 start-50 translate-middle" style="width: 25rem;">
                            <img class="img-fluid"
                                src="<?php echo base_url('uploads/frontend/checkout/screenshots/customer/shape-1.svg') ?>"
                                alt="Checkout SVG" title="Checkout SVG">
                        </div>
                        <!-- End SVG Shape -->
                    </div>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->

        </div>
    </div>
    <div class="container content-space-1">
        <div class="overflow-hidden">

            <div class="row justify-content-lg-between align-items-lg-center">
                <div class="col-lg-7 mb-9 mb-lg-0">
                    <!-- Heading -->

                    <div class="pe-lg-6 w-xxl-100 w-xl-100 w-lg-100 w-md-65 w-sm-65 w-xs-100  mx-auto">
                        <div class="mb-5">
                            <h1 class="text-white">Order List & Status</h1>
                            <p class="text-white">Customers can see their order list along
                                with the status, and from each order, they can also see all the products they
                                ordered from the "My orders" page. There are four order status in Checkout. They
                                are:
                            <ul class="">
                                <li class=" text-white">Order pending

                                </li>
                                <li class=" text-white">Order processing

                                </li>
                                <li class=" text-white">Order delivered

                                </li>
                                <li class=" text-white">Order cancellation

                                </li>


                            </ul>
                            </p>
                        </div>
                        <!-- End Heading -->
                    </div>
                    <div class="py-4 w-100 text-center ">
                        <a class="btn btn-sm  w-75 w-md-auto mt-2 mt-md-0 btn-warning" href="" target="_blank">
                            <i class="bi bi-display"></i>
                            Watch video
                        </a>
                        <a class="btn btn-sm  w-75 w-md-auto mt-2 mt-md-0 btn-secondary"
                            href="<?php echo site_url('docs') ?>/checkout/tracking-my-orders-list-in-the-customer-app"
                            target="_blank">
                            <i class="bi bi-journal-code"></i>
                            Read documentation
                        </a>
                    </div>
                </div>
                <!-- End Col -->

                <div class="col-lg-5">
                    <div class="position-absolute mx-auto " data-aos="fade-up">
                        <!-- Mobile Device -->
                        <figure class="device-mobile mx-auto">
                            <div class="device-mobile-frame">
                                <img class="device-mobile-img"
                                    src="<?php echo base_url('uploads/frontend/checkout/screenshots/customer/checkout-my-orders.jpg') ?>"
                                    alt="Checkout order list and status" title="Checkout order list and status">
                            </div>
                        </figure>
                        <!-- End Mobile Device -->

                        <!-- SVG Shape -->
                        <div class="position-absolute top-50 start-50 translate-middle" style="width: 25rem;">
                            <img class="img-fluid"
                                src="<?php echo base_url('uploads/frontend/checkout/screenshots/customer/shape-1.svg') ?>"
                                alt="Checkout SVG" title="Checkout SVG">
                        </div>
                        <!-- End SVG Shape -->
                    </div>
                    <div class="position-relative mx-auto mt-6 ms-6" data-aos="fade-up">
                        <!-- Mobile Device -->
                        <figure class="device-mobile mx-auto">
                            <div class="device-mobile-frame">
                                <img class="device-mobile-img"
                                    src="<?php echo base_url('uploads/frontend/checkout/screenshots/customer/checkout-order-details.jpg') ?>"
                                    alt="Checkout order list and status" title="Checkout order list and status">
                            </div>
                        </figure>
                        <!-- End Mobile Device -->

                        <!-- SVG Shape -->
                        <div class="position-absolute top-50 start-50 translate-middle" style="width: 25rem;">
                            <img class="img-fluid"
                                src="<?php echo base_url('uploads/frontend/checkout/screenshots/customer/shape-1.svg') ?>"
                                alt="Checkout SVG" title="Checkout SVG">
                        </div>
                        <!-- End SVG Shape -->
                    </div>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->

        </div>
    </div>
    <div class="container content-space-1">
        <div class="overflow-hidden">

            <div class="row justify-content-lg-between align-items-lg-center">
                <div class="col-lg-5 order-lg-2 mb-9 mb-lg-0">

                    <!-- End Heading -->
                    <div class="pe-lg-6 w-xxl-100 w-xl-100 w-lg-100 w-md-65 w-sm-65 w-xs-100  mx-auto">
                        <div class="mb-5">
                            <h1 class="text-white">Order payment</h1>
                            <p class="text-white">Customers can make payments through four payment gateway. They can pay
                                with Paypal, Razorpay, Paytm, or cash on delivery. They can also complete the payment to
                                the delivery boy after receiving the product if the payment method is cash on delivery.
                            </p>


                        </div>
                        <!-- End Heading -->
                    </div>
                    <div class="py-4 w-100 text-center ">
                        <a class="btn btn-sm  w-75 w-md-auto mt-2 mt-md-0 btn-warning" href="" target="_blank">
                            <i class="bi bi-display"></i>
                            Watch video
                        </a>
                        <a class="btn btn-sm  w-75 w-md-auto mt-2 mt-md-0 btn-secondary"
                            href="<?php echo site_url('docs') ?>/purchasing-product-with-mobile-app" target="_blank">
                            <i class="bi bi-journal-code"></i>
                            Read documentation
                        </a>
                    </div>

                </div>
                <!-- End Col -->

                <div class="col-lg-6 order-lg-1">
                    <div class="position-relative mx-auto" data-aos="fade-up">
                        <!-- Mobile Device -->
                        <figure class="device-mobile mx-auto">
                            <div class="device-mobile-frame">
                                <img class="device-mobile-img"
                                    src="<?php echo base_url('uploads/frontend/checkout/screenshots/customer/payment-checkout.jpg') ?>"
                                    alt="Checkout payment" title="Checkout payment">
                            </div>
                        </figure>
                        <!-- End Mobile Device -->

                        <!-- SVG Shape -->
                        <div class="position-absolute top-50 start-50 translate-middle" style="width: 25rem;">
                            <img class="img-fluid"
                                src="<?php echo base_url('uploads/frontend/checkout/screenshots/customer/shape-1.svg') ?>"
                                alt="Checkout SVG" title="Checkout SVG">
                        </div>
                        <!-- End SVG Shape -->
                    </div>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->

        </div>
    </div>
    <div class="container content-space-1">
        <div class="overflow-hidden">
            <div class=" content-space-b-lg-2">
                <div class="row justify-content-lg-between align-items-lg-center">
                    <div class="col-lg-5 mb-9 mb-lg-0">
                        <!-- Heading -->

                        <!-- End List Checked -->
                        <div class="pe-lg-6 w-xxl-100 w-xl-100 w-lg-100 w-md-65 w-sm-65 w-xs-100  mx-auto">
                            <div class="mb-5">
                                <h1 class="text-white">Help & Support</h1>
                                <p class="text-white">The FAQ section can help your customers with some basic info. They
                                    can also contact the support center via email or phone number.

                                </p>
                            </div>
                            <!-- End Heading -->
                        </div>
                        <div class="py-4 w-100 text-center ">
                            <a class="btn btn-sm  w-75 w-md-auto mt-2 mt-md-0 btn-warning" href="" target="_blank">
                                <i class="bi bi-display"></i>
                                Watch video
                            </a>
                            <a class="btn btn-sm  w-75 w-md-auto mt-2 mt-md-0 btn-secondary"
                                href="<?php echo site_url('docs') ?>/checkout/help-and-support-with-mobile-app"
                                target="_blank">
                                <i class="bi bi-journal-code"></i>
                                Read documentation
                            </a>
                        </div>
                    </div>
                    <!-- End Col -->

                    <div class="col-lg-6">
                        <div class="position-relative mx-auto" data-aos="fade-up">
                            <!-- Mobile Device -->
                            <figure class="device-mobile mx-auto">
                                <div class="device-mobile-frame">
                                    <img class="device-mobile-img"
                                        src="<?php echo base_url('uploads/frontend/checkout/screenshots/customer/checkout-help-support.jpg') ?>"
                                        alt="Checkout help and support" title="Checkout help and support">
                                </div>
                            </figure>
                            <!-- End Mobile Device -->

                            <!-- SVG Shape -->
                            <div class="position-absolute top-50 start-50 translate-middle" style="width: 25rem;">
                                <img class="img-fluid"
                                    src="<?php echo base_url('uploads/frontend/checkout/screenshots/customer/shape-1.svg') ?>"
                                    alt="Checkout SVG" title="Checkout SVG">
                            </div>
                            <!-- End SVG Shape -->
                        </div>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
        </div>
    </div>
</section>

<section class="bg-light">
    <div class="container content-space-1">
        <div>
            <h1 class="text-center display-6">How delivery boy delivers product </h1>
        </div>
        <div class="overflow-hidden">
            <div class="content-space-t-lg-3 ">
                <div class="row justify-content-lg-between align-items-lg-center">
                    <div class="col-lg-5 order-lg-2 mb-9 mb-lg-0">
                        <!-- Heading -->

                        <!-- End Heading -->
                        <div class="pe-lg-6 w-xxl-100 w-xl-100 w-lg-100 w-md-65 w-sm-65 w-xs-100  mx-auto">
                            <div class="mb-5">
                                <h1>Sign in</h1>
                                <p>The Delivery boy has to sign in to overview and deliver their assigned pending orders
                                    to the customers.
                                </p>
                            </div>
                            <!-- End Heading -->
                        </div>
                        <div class="py-4 w-100 text-center ">
                            <a class="btn btn-outline-primary me-1 mb-1" href="" target="_blank">
                                <i class="bi bi-display"></i>
                                Watch video
                            </a>
                            <a class="btn btn-outline-secondary me-1 mb-1"
                                href="<?php echo site_url('docs') ?>/checkout/update-order-status-with-mobile-app"
                                target="_blank">
                                <i class="bi bi-journal-code"></i>
                                Read documentation
                            </a>

                        </div>

                    </div>
                    <!-- End Col -->

                    <div class="col-lg-7 order-lg-1">
                        <div class="position-relative mx-auto" data-aos="fade-up">
                            <!-- Mobile Device -->
                            <figure class="device-mobile mx-auto">
                                <div class="device-mobile-frame">
                                    <img class="device-mobile-img"
                                        src="<?php echo base_url('uploads/frontend/checkout/screenshots/delivery-boy/delivery-boy-sign-in.jpg') ?>"
                                        alt="Checkout delivery boy sign in" title="Checkout delivery boy sign in">
                                </div>
                            </figure>
                            <!-- End Mobile Device -->

                            <!-- SVG Shape -->
                            <div class="position-absolute top-50 start-50 translate-middle" style="width: 25rem;">
                                <img class="img-fluid"
                                    src="<?php echo base_url('uploads/frontend/checkout/screenshots/customer/shape-1.svg') ?>"
                                    alt="Checkout SVG" title="Checkout SVG">
                            </div>
                            <!-- End SVG Shape -->
                        </div>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
        </div>
    </div>
    <div class="container content-space-1">
        <div class="overflow-hidden">

            <div class="row justify-content-lg-between align-items-lg-center">
                <div class="col-lg-5 order-lg-1 mb-9 mb-lg-0">
                    <!-- Heading -->

                    <!-- End Heading -->
                    <div class="pe-lg-6 w-xxl-100 w-xl-100 w-lg-100 w-md-65 w-sm-65 w-xs-100  mx-auto">
                        <div class="mb-5">
                            <h1>Pending order</h1>
                            <p>Orders assigned to the delivery boy will be
                                available in the pending orders view.

                            </p>
                        </div>
                        <!-- End Heading -->
                    </div>

                </div>
                <!-- End Col -->

                <div class="col-lg-7 order-lg-2">
                    <div class="position-relative mx-auto" data-aos="fade-up">
                        <!-- Mobile Device -->
                        <figure class="device-mobile mx-auto">
                            <div class="device-mobile-frame">
                                <img class="device-mobile-img"
                                    src="<?php echo base_url('uploads/frontend/checkout/screenshots/delivery-boy/checkout-pending-order.jpg') ?>"
                                    alt="Checkout pending order" title="Checkout pending order">
                            </div>
                        </figure>
                        <!-- End Mobile Device -->

                        <!-- SVG Shape -->
                        <div class="position-absolute top-50 start-50 translate-middle" style="width: 25rem;">
                            <img class="img-fluid"
                                src="<?php echo base_url('uploads/frontend/checkout/screenshots/customer/shape-1.svg') ?>"
                                alt="Checkout SVG" title="Checkout SVG">
                        </div>
                        <!-- End SVG Shape -->
                    </div>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->

        </div>
    </div>
    <div class="container content-space-1">
        <div class="overflow-hidden">

            <div class="row justify-content-lg-between align-items-lg-center">
                <div class="col-lg-5 order-lg-2 mb-9 mb-lg-0">
                    <!-- Heading -->

                    <div class="pe-lg-6 w-xxl-100 w-xl-100 w-lg-100 w-md-65 w-sm-65 w-xs-100  mx-auto">
                        <div class="mb-5">
                            <h1>Order payment collection</h1>
                            <p>The delivery boy can see the order summary of each assigned order. They can update the
                                payment status after delivering the product if the order is placed with cash on
                                delivery(COD).</p>


                        </div>
                        <!-- End Heading -->
                    </div>
                    <!-- End Heading -->
                    <div class="py-4 w-100 text-center ">
                        <a class="btn btn-outline-primary me-1 mb-1" href="" target="_blank">
                            <i class="bi bi-display"></i>
                            Watch video
                        </a>
                        <a class="btn btn-outline-secondary me-1 mb-1"
                            href="<?php echo site_url('docs') ?>/checkout/update-order-status-with-mobile-app"
                            target="_blank">
                            <i class="bi bi-journal-code"></i>
                            Read documentation
                        </a>

                    </div>

                </div>
                <!-- End Col -->

                <div class="col-lg-7 order-lg-1">
                    <div class="position-relative mx-auto" data-aos="fade-up">
                        <!-- Mobile Device -->
                        <figure class="device-mobile mx-auto">
                            <div class="device-mobile-frame">
                                <img class="device-mobile-img"
                                    src="<?php echo base_url('uploads/frontend/checkout/screenshots/delivery-boy/checkout-delivery-summary.jpg') ?>"
                                    alt="Checkout delivery summary" title="Checkout delivery summary">
                            </div>
                        </figure>
                        <!-- End Mobile Device -->

                        <!-- SVG Shape -->
                        <div class="position-absolute top-50 start-50 translate-middle" style="width: 25rem;">
                            <img class="img-fluid"
                                src="<?php echo base_url('uploads/frontend/checkout/screenshots/customer/shape-1.svg') ?>"
                                alt="Checkout SVG" title="Checkout SVG">
                        </div>
                        <!-- End SVG Shape -->
                    </div>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->

        </div>
    </div>
    <div class="container content-space-1">
        <div class="overflow-hidden">

            <div class="row justify-content-lg-between align-items-lg-center">
                <div class="col-lg-5 order-lg-1 mb-9 mb-lg-0">
                    <!-- Heading -->

                    <div class="pe-lg-6 w-xxl-100 w-xl-100 w-lg-100 w-md-65 w-sm-65 w-xs-100  mx-auto">
                        <div class="mb-5">
                            <h1>Contacting with customers</h1>
                            <p>The delivery boy can contact the customer to discuss the order delivery. They can see the
                                ordered delivery location on the map or call the customers.</p>


                        </div>
                        <!-- End Heading -->
                    </div>
                    <!-- End Heading -->
                    <div class="py-4 w-100 text-center ">
                        <a class="btn btn-outline-primary me-1 mb-1" href="" target="_blank">
                            <i class="bi bi-display"></i>
                            Watch video
                        </a>
                        <a class="btn btn-outline-secondary me-1 mb-1"
                            href="<?php echo site_url('docs') ?>/checkout/update-order-status-with-mobile-app"
                            target="_blank">
                            <i class="bi bi-journal-code"></i>
                            Read documentation
                        </a>

                    </div>

                </div>
                <!-- End Col -->

                <div class="col-lg-7 order-lg-2">
                    <div class="position-relative mx-auto" data-aos="fade-up">
                        <!-- Mobile Device -->
                        <figure class="device-mobile mx-auto">
                            <div class="device-mobile-frame">
                                <img class="device-mobile-img"
                                    src="<?php echo base_url('uploads/frontend/checkout/screenshots/delivery-boy/checkout-delivery-call.jpg') ?>"
                                    alt="Checkout delivery call" title="Checkout delivery call">
                            </div>
                        </figure>
                        <!-- End Mobile Device -->

                        <!-- SVG Shape -->
                        <div class="position-absolute top-50 start-50 translate-middle" style="width: 25rem;">
                            <img class="img-fluid"
                                src="<?php echo base_url('uploads/frontend/checkout/screenshots/customer/shape-1.svg') ?>"
                                alt="Checkout SVG" title="Checkout SVG">
                        </div>
                        <!-- End SVG Shape -->
                    </div>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->

        </div>
    </div>
    <div class="container content-space-1">
        <div class="overflow-hidden">

            <div class="row justify-content-lg-between align-items-lg-center">
                <div class="col-lg-5 order-lg-2 mb-9 mb-lg-0">
                    <!-- Heading -->

                    <!-- End Heading -->
                    <div class="pe-lg-6 w-xxl-100 w-xl-100 w-lg-100 w-md-65 w-sm-65 w-xs-100  mx-auto">
                        <div class="mb-5">
                            <h1>Updating order status</h1>
                            <p>The Delivery boy can update the delivery status from their mobile application after
                                delivering the product to the customer.

                            </p>
                        </div>
                        <!-- End Heading -->
                        <div class="py-4 w-100 text-center ">
                            <a class="btn btn-outline-primary me-1 mb-1" href="" target="_blank">
                                <i class="bi bi-display"></i>
                                Watch video
                            </a>
                            <a class="btn btn-outline-secondary me-1 mb-1"
                                href="<?php echo site_url('docs') ?>/checkout/update-order-status-with-mobile-app"
                                target="_blank">
                                <i class="bi bi-journal-code"></i>
                                Read documentation
                            </a>

                        </div>
                    </div>

                </div>
                <!-- End Col -->

                <div class="col-lg-7 order-lg-1">
                    <div class="position-relative mx-auto" data-aos="fade-up">
                        <!-- Mobile Device -->
                        <figure class="device-mobile mx-auto">
                            <div class="device-mobile-frame">
                                <img class="device-mobile-img"
                                    src="<?php echo base_url('uploads/frontend/checkout/screenshots/delivery-boy/checkout-status-update.jpg') ?>"
                                    alt="Checkout status update" title="Checkout status update">
                            </div>
                        </figure>
                        <!-- End Mobile Device -->

                        <!-- SVG Shape -->
                        <div class="position-absolute top-50 start-50 translate-middle" style="width: 25rem;">
                            <img class="img-fluid"
                                src="<?php echo base_url('uploads/frontend/checkout/screenshots/customer/shape-1.svg') ?>"
                                alt="Checkout SVG" title="Checkout SVG">
                        </div>
                        <!-- End SVG Shape -->
                    </div>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->

        </div>
    </div>
    <div class="container content-space-1">
        <div class="overflow-hidden">
            <div class="content-space-b-lg-2">
                <div class="row justify-content-lg-between align-items-lg-center">
                    <div class="col-lg-5 order-lg-1 mb-9 mb-lg-0">
                        <!-- Heading -->

                        <!-- End Heading -->
                        <div class="pe-lg-6 w-xxl-100 w-xl-100 w-lg-100 w-md-65 w-sm-65 w-xs-100  mx-auto">
                            <div class="mb-5">
                                <h1>Completed order list</h1>
                                <p>The delivery boy can overview the completed order history and search the list with a
                                    customized date filtering option.

                                </p>
                            </div>
                            <!-- End Heading -->
                        </div>
                        <div class="py-4 w-100 text-center ">
                            <a class="btn btn-outline-primary me-1 mb-1" href="" target="_blank">
                                <i class="bi bi-display"></i>
                                Watch video
                            </a>
                            <a class="btn btn-outline-secondary me-1 mb-1"
                                href="<?php echo site_url('docs') ?>delivered-order-list-in-mobile-app" target="_blank">
                                <i class="bi bi-journal-code"></i>
                                Read documentation
                            </a>

                        </div>

                    </div>
                    <!-- End Col -->

                    <div class="col-lg-5 order-lg-2">
                        <div class="position-absolute mx-auto " data-aos="fade-up">
                            <!-- Mobile Device -->
                            <figure class="device-mobile mx-auto">
                                <div class="device-mobile-frame">
                                    <img class="device-mobile-img"
                                        src="<?php echo base_url('uploads/frontend/checkout/screenshots/delivery-boy/checkout-completed-order.jpg') ?>"
                                        alt="Checkout completed order" title="Checkout completed order">
                                </div>
                            </figure>
                            <!-- End Mobile Device -->

                            <!-- SVG Shape -->
                            <div class="position-absolute top-50 start-50 translate-middle" style="width: 25rem;">
                                <img class="img-fluid"
                                    src="<?php echo base_url('uploads/frontend/checkout/screenshots/customer/shape-1.svg') ?>"
                                    alt="Checkout SVG" title="Checkout SVG">
                            </div>
                            <!-- End SVG Shape -->
                        </div>
                        <div class="position-relative mx-auto mt-6 ms-6" data-aos="fade-up">
                            <!-- Mobile Device -->
                            <figure class="device-mobile mx-auto">
                                <div class="device-mobile-frame">
                                    <img class="device-mobile-img"
                                        src="<?php echo base_url('uploads/frontend/checkout/screenshots/delivery-boy/checkout-delivered-order-details.jpg') ?>"
                                        alt="Checkout delivered order details" title="Checkout delivered order details">
                                </div>
                            </figure>
                            <!-- End Mobile Device -->

                            <!-- SVG Shape -->
                            <div class="position-absolute top-50 start-50 translate-middle" style="width: 25rem;">
                                <img class="img-fluid"
                                    src="<?php echo base_url('uploads/frontend/checkout/screenshots/customer/shape-1.svg') ?>"
                                    alt="Checkout SVG" title="Checkout SVG">
                            </div>
                            <!-- End SVG Shape -->
                        </div>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
        </div>
    </div>
</section>

<div class="container content-space-1">
    <!-- Heading -->
    <div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5 mb-md-9">
        <h1 class="display-6">Choose a plan that's right for you.</h1>
        <p>Everything you need. From front to back.</p>
    </div>
    <!-- End Heading -->

    <!-- Table -->
    <div class="table-responsive-lg w-lg-75 mx-lg-auto">
        <table class="table table-lg table-striped table-borderless table-nowrap table-vertical-border-striped">
            <thead class="table-text-center">
                <tr>
                    <th scope="col" style="width: 40%;"></th>

                    <th scope="col" style="width: 20%;">
                        <span class="d-block">Regular License </span>
                        <span class="d-block text-muted small">$24</span>
                    </th>

                    <th scope="col" style="width: 20%;">
                        <span class="d-block">Extended License</span>
                        <span class="d-block text-muted small">$350</span>
                    </th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <th scope="row" class="text-dark">Complete source code</th>

                    <td class="table-text-center"><i class="bi-check-circle text-success me-2"></i></td>
                    <td class="table-text-center"><i class="bi-check-circle text-success me-2"></i></td>
                </tr>

                <tr>
                    <th scope="row" class="text-dark">Technical & user documentation</th>

                    <td class="table-text-center"><i class="bi-check-circle text-success me-2"></i></td>
                    <td class="table-text-center"><i class="bi-check-circle text-success me-2"></i></td>
                </tr>

                <tr>
                    <th scope="row" class="text-dark">Zendesk ticket support</th>

                    <td class="table-text-center"><i class="bi-check-circle text-success me-2"></i></td>
                    <td class="table-text-center"><i class="bi-check-circle text-success me-2"></i></td>
                </tr>

                <tr>
                    <th scope="row" class="text-dark">6 months customer support</th>
                    <td class="table-text-center"><i class="bi-check-circle text-success me-2"></i></td>

                    <td class="table-text-center"><i class="bi-check-circle text-success me-2"></i></td>
                </tr>

                <tr>
                    <th scope="row" class="text-dark">Lifetime free update</th>

                    <td class="table-text-center"><i class="bi-check-circle text-success me-2"></i></td>
                    <td class="table-text-center"><i class="bi-check-circle text-success me-2"></i></td>
                </tr>

                <tr>
                    <th scope="row" class="text-dark">1 license for 1 domain</th>

                    <td class="table-text-center"><i class="bi-check-circle text-success me-2"></i></td>
                    <td class="table-text-center"><i class="bi-check-circle text-success me-2"></i></td>
                </tr>

                <tr>
                    <th scope="row" class="text-dark">For own course business</th>

                    <td class="table-text-center"><i class="bi-check-circle text-success me-2"></i></td>
                    <td class="table-text-center"><i class="bi-check-circle text-success me-2"></i></td>
                </tr>

                <tr>
                    <th scope="row" class="text-dark">For developers</th>

                    <td class="table-text-center"><i class="bi bi-x-circle text-danger me-2"></i></td>
                    <td class="table-text-center"><i class="bi-check-circle text-success me-2"></i></td>
                </tr>

                <tr>
                    <th scope="row" class="text-dark">For client/commercial project</th>

                    <td class="table-text-center"><i class="bi bi-x-circle text-danger me-2"></i></td>
                    <td class="table-text-center"><i class="bi-check-circle text-success me-2"></i></td>
                </tr>

                <tr>
                    <th scope="row" class="text-dark">Customization permission</th>

                    <td class="table-text-center"><i class="bi bi-x-circle text-danger me-2"></i></td>
                    <td class="table-text-center"><i class="bi-check-circle text-success me-2"></i></td>
                </tr>
                <tr>
                    <th scope="row" class="text-dark">Priority customer support</th>

                    <td class="table-text-center"><i class="bi bi-x-circle text-danger me-2"></i></td>
                    <td class="table-text-center"><i class="bi-check-circle text-success me-2"></i></td>
                </tr>
                <tr>
                    <th scope="row" class="text-dark"></th>

                    <td><a href="https://codecanyon.net/item/checkout-online-grocery-store/31085856" target="_blank"
                            type="button" class="btn btn-soft-dark btn-sm btn-transition">Buy regular license</a>
                    </td>
                    <td><a href="https://codecanyon.net/item/checkout-online-grocery-store/31085856" target="_blank"
                            type="button" class="btn btn-primary btn-sm btn-transition">Buy extended license</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- End Table -->
</div>
<div class="container content-space-1 content-space-lg-1">
    <!-- Heading -->
    <div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5 mb-md-9">
        <h1 class="display-6">Frequently asked questions?</h1>
    </div>
    <!-- End Heading -->
    <div class="w-lg-65 mx-lg-auto">
        <!-- Accordion -->
        <div class="accordion accordion-flush accordion-lg" id="accordionFAQ">
            <!-- Accordion Item -->
            <div class="accordion-item">
                <div class="accordion-header" id="headingBasicsOne">
                    <a class="accordion-button collapsed" role="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        How can I purchase Checkout online grocery store?
                    </a>
                </div>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingBasicsOne"
                    data-bs-parent="#accordionFAQ" style="">
                    <div class="accordion-body">
                        Checkout online grocery store can be purchased through envato market. You need to create an
                        account in
                        codecanyon.net and login. Then you can purchase Checkout from this link : <a
                            href="https://codecanyon.net/item/checkout-online-grocery-store/31085856"
                            target="_blank">https://codecanyon.net/item/checkout-online-grocery-store/31085856</a>
                        <br>
                        <br>
                        Learn more <a href="https://help.market.envato.com/hc/en-us/articles/203269700"
                            target="_blank">here</a>.
                    </div>
                </div>
            </div>
            <!-- End Accordion Item -->
            <!-- Accordion Item -->
            <div class="accordion-item">
                <div class="accordion-header" id="headingBasicsTwo">
                    <a class="accordion-button collapsed" role="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        What payment gateways are accepted?
                    </a>
                </div>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingBasicsTwo"
                    data-bs-parent="#accordionFAQ">
                    <div class="accordion-body">
                        You can pay by your mastercard, paypal balance or skrill to purchase Checkout
                    </div>
                </div>
            </div>
            <!-- End Accordion Item -->
            <!-- Accordion Item -->
            <div class="accordion-item">
                <div class="accordion-header" id="headingBasicsThree">
                    <a class="accordion-button collapsed" role="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Is there any monthly or annual recurring fee?
                    </a>
                </div>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingBasicsThree"
                    data-bs-parent="#accordionFAQ">
                    <div class="accordion-body">
                        There is no recurring fee for monthly or annually. License price is one time.
                    </div>
                </div>
            </div>
            <!-- End Accordion Item -->
            <!-- Accordion Item -->
            <div class="accordion-item">
                <div class="accordion-header" id="headingBasicsFour">
                    <a class="accordion-button collapsed" role="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        How much time will I get developer support?
                    </a>
                </div>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingBasicsFour"
                    data-bs-parent="#accordionFAQ">
                    <div class="accordion-body">
                        By default, you are entitled to developer support for 6 months from the date of your
                        purchase.
                        Later on anytime you can renew the support pack if you need developer support. If you don’t
                        need
                        any developer support, you don’t need to buy it.
                        <br>
                        <br>
                        Learn more <a href="https://codecanyon.net/item_support/what_is_item_support/22703468"
                            target="_blank">here</a>.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <div class="accordion-header" id="headingBasicsFive">
                    <a class="accordion-button collapsed" role="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        Can I get discounted price?
                    </a>
                </div>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingBasicsFive"
                    data-bs-parent="#accordionFAQ">
                    <div class="accordion-body">
                        Discount is given over time but there is no confirmed schedule for it. We will publish it in
                        the
                        product page when any discount is available.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <div class="accordion-header" id="headingBasicsSix">
                    <a class="accordion-button collapsed" role="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        If I run in multiple domains or projects, what shoud I do?
                    </a>
                </div>
                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingBasicsSix"
                    data-bs-parent="#accordionFAQ">
                    <div class="accordion-body">
                        For multiple domains or projects, you will be required separate license as well as purchase
                        code
                        for each of them.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <div class="accordion-header" id="headingBasicsSeven">
                    <a class="accordion-button collapsed" role="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                        Which license to chose for my own project?
                    </a>
                </div>
                <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingBasicsSeven"
                    data-bs-parent="#accordionFAQ">
                    <div class="accordion-body">
                        If you use Checkout for your own project, you will be required regular license.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <div class="accordion-header" id="headingBasicsEight">
                    <a class="accordion-button collapsed" role="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                        Which license to chose for my clents project?
                    </a>
                </div>
                <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingBasicsEight"
                    data-bs-parent="#accordionFAQ">
                    <div class="accordion-body">
                        If you use Checkout for a commercial project of a client, you will be required extended
                        license.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <div class="accordion-header" id="headingBasicsnine">
                    <a class="accordion-button collapsed" role="button" data-bs-toggle="collapse"
                        data-bs-target="#collapsenine" aria-expanded="false" aria-controls="collapsenine">
                        How can I get developed my customer features?
                    </a>
                </div>
                <div id="collapsenine" class="accordion-collapse collapse" aria-labelledby="headingBasicsnine"
                    data-bs-parent="#accordionFAQ">
                    <div class="accordion-body">
                        Custom features does not coming with product support. You contact our support center and
                        send us
                        details about your requirement. If our schedule is open, we can give you a quotation and
                        take
                        your project according to the contract.
                    </div>
                </div>
            </div>
            <!-- End Accordion Item -->
        </div>
        <!-- End Accordion -->
    </div>
</div>
<div class="container content-space-1">
    <div class="w-lg-85 mx-lg-auto">
        <!-- Card -->
        <div class="card">
            <div class="card-body">
                <div class="row col-md-divider align-items-md-center">
                    <div class="col-md-9">
                        <h1 class="display-6">What is included</h1>
                        <p>With your every single license purchase comes standard: </p>
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- List Checked -->
                                <ul class="list-checked list-checked-bg-success list-checked-sm mb-0">

                                    <li class="list-checked-item">1 web app & 2 mobile app</li>
                                    <li class="list-checked-item">Complete open source code </li>
                                    <li class="list-checked-item">Database structure</li>
                                    <li class="list-checked-item">Documentation</li>
                                </ul>
                                <!-- End List Checked -->
                            </div>
                            <!-- End Col -->
                            <div class="col-sm-6">
                                <!-- List Checked -->
                                <ul class="list-checked list-checked-bg-success list-checked-sm mb-0">
                                    <li class="list-checked-item">Video tutorial</li>
                                    <li class="list-checked-item">Purchase code</li>
                                    <li class="list-checked-item">6 months support <span
                                            class="badge bg-soft-secondary text-dark rounded-pill ms-1">extendable</span>
                                    </li>
                                </ul>
                                <!-- End List Checked -->
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->
                    </div>
                    <!-- End Col -->
                    <div class="col-md-3">
                        <div class="ps-md-2">
                            <a class="btn btn-primary"
                                href="https://codecanyon.net/cart/configure_before_adding/31085856" target="_blank">Buy
                                now <i class="bi-chevron-right small ms-1"></i></a>
                        </div>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
        </div>
        <!-- End Card -->
    </div>
</div>

<div class="container content-space-1">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <span class="h1">Technical details - Web admin app </span>
                </div>
                <!-- End Col -->
                <div class="col-md-6">
                    <dl class="row">
                        <dt class="col-6">
                            <i class="bi-bank2 me-2"></i> Built with :
                        </dt>
                        <dd class="col-6 text-end">PHP</dd>
                        <dt class="col-6">
                            <i class="bi-lightning-charge-fill me-2"></i> Framework
                        </dt>
                        <dd class="col-6 text-end">Codeigniter</dd>
                        <dt class="col-6">
                            <i class="bi-droplet-half me-2"></i>Minimum Php version :
                        </dt>
                        <dd class="col-6 text-end">
                            &gt; 7.0
                        </dd>
                        <dt class="col-6 text-dark">
                            <i class="bi-shield-shaded me-2"></i> Codeigniter version:
                        </dt>
                        <dd class="col-6 text-end">3.1.11</dd>
                        <dt class="col-6 text-dark">
                            <i class="bi-archive me-2"></i> Database:
                        </dt>
                        <dd class="col-6 text-end">Mysql</dd>
                        <dt class="col-6 text-dark">
                            <i class="bi-justify me-2"></i> MySQL Version :
                        </dt>
                        <dd class="col-6 text-end"> &gt; 5.7.0</dd>
                        <dt class="col-6">
                            <i class="bi-bank2 me-2"></i> Required server:
                        </dt>
                        <dd class="col-6 text-end">Apache</dd>
                        <dt class="col-6">
                            <i class="bi-lightning-charge-fill me-2"></i> cURL status :
                        </dt>
                        <dd class="col-6 text-end">Required</dd>
                        <dt class="col-6">
                            <i class="bi-droplet-half me-2"></i> Mod rewrite module status :
                        </dt>
                        <dd class="col-6 text-end">
                            Required
                        </dd>
                        <dt class="col-6 text-dark">
                            <i class="bi-layers me-2"></i> Project Size :
                        </dt>
                        <dd class="col-6 text-end"> 9.37MB</dd>
                        <dt class="col-6 text-dark">
                            <i class="bi-wallet-fill me-2"></i> Required Physical Memory :
                        </dt>
                        <dd class="col-6 text-end"> 1GB</dd>
                    </dl>
                    <!-- End Row -->
                </div>
                <!-- End Col -->
            </div>
        </div>
    </div>
</div>

<div class="container content-space-1">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <span class="h1">Technical details - Customer and mobile app </span>
                </div>
                <!-- End Col -->
                <div class="col-md-6">
                    <dl class="row">
                        <dt class="col-6">
                            <i class="bi-bank2 me-2"></i> Built with :
                        </dt>
                        <dd class="col-6 text-end">Dart</dd>
                        <dt class="col-6">
                            <i class="bi-lightning-charge-fill me-2"></i> Framework
                        </dt>
                        <dd class="col-6 text-end">Flutter</dd>
                        <dt class="col-6">
                            <i class="bi-droplet-half me-2"></i>Minimum dart version :
                        </dt>
                        <dd class="col-6 text-end">
                            &gt; 2.12
                        </dd>
                        <dt class="col-6 text-dark">
                            <i class="bi-shield-shaded me-2"></i> Minimum flutter version:
                        </dt>
                        <dd class="col-6 text-end"> &gt; 2.0.0</dd>
                        <dt class="col-6 text-dark">
                            <i class="bi-archive me-2"></i> Null safety:
                        </dt>
                        <dd class="col-6 text-end">Enabled</dd>
                        <dt class="col-6 text-dark">
                            <i class="bi-justify me-2"></i> Database :
                        </dt>
                        <dd class="col-6 text-end"> Sqflite</dd>
                        <dt class="col-6">
                            <i class="bi-bank2 me-2"></i> Sqflite version:
                        </dt>
                        <dd class="col-6 text-end"> &gt; 2.0.0</dd>
                        <dt class="col-6">
                            <i class="bi-lightning-charge-fill me-2"></i> Project Size - customer mobile app:
                        </dt>
                        <dd class="col-6 text-end">1.54 MB</dd>
                        <dt class="col-6 text-dark">
                            <i class="bi-justify me-2"></i> Project Size - delivery boy mobile app:
                        </dt>
                        <dd class="col-6 text-end"> 1.56 MB</dd>

                    </dl>
                    <!-- End Row -->
                </div>
                <!-- End Col -->
            </div>
        </div>
    </div>
</div>



<div class="container content-space-2">
    <div class="w-lg-100 mx-lg-auto">
        <div class="row">
            <div class="col-md-4 mb-3 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                <!-- Icon Block -->
                <a class="card card-transition h-100"
                    href="<?php echo base_url('docs') ?>/checkout/what-is-checkout-online-grocery-store"
                    target="_blank">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <span class="svg-icon text-primary">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M4.85714 1H11.7364C12.0911 1 12.4343 1.12568 12.7051 1.35474L17.4687 5.38394C17.8057 5.66895 18 6.08788 18 6.5292V19.0833C18 20.8739 17.9796 21 16.1429 21H4.85714C3.02045 21 3 20.8739 3 19.0833V2.91667C3 1.12612 3.02045 1 4.85714 1ZM7 13C7 12.4477 7.44772 12 8 12H15C15.5523 12 16 12.4477 16 13C16 13.5523 15.5523 14 15 14H8C7.44772 14 7 13.5523 7 13ZM8 16C7.44772 16 7 16.4477 7 17C7 17.5523 7.44772 18 8 18H11C11.5523 18 12 17.5523 12 17C12 16.4477 11.5523 16 11 16H8Z"
                                            fill="#035A4B"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M6.85714 3H14.7364C15.0911 3 15.4343 3.12568 15.7051 3.35474L20.4687 7.38394C20.8057 7.66895 21 8.08788 21 8.5292V21.0833C21 22.8739 20.9796 23 19.1429 23H6.85714C5.02045 23 5 22.8739 5 21.0833V4.91667C5 3.12612 5.02045 3 6.85714 3ZM7 13C7 12.4477 7.44772 12 8 12H15C15.5523 12 16 12.4477 16 13C16 13.5523 15.5523 14 15 14H8C7.44772 14 7 13.5523 7 13ZM8 16C7.44772 16 7 16.4477 7 17C7 17.5523 7.44772 18 8 18H11C11.5523 18 12 17.5523 12 17C12 16.4477 11.5523 16 11 16H8Z"
                                            fill="#035A4B"></path>
                                    </svg>
                                </span>
                            </div>
                            <div class="flex-grow-1 ms-4">
                                <h2 class="card-title">Read documentation</h2>
                                <p class="card-text text-body">To get the detailed guidelines read our comprehensive
                                    documentation.</p>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- End Icon Block -->
            </div>
            <!-- End Col -->
            <div class="col-md-4 mb-3 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                <!-- Icon Block -->
                <a class="card card-transition h-100" href="https://www.youtube.com/watch?v=ZIBbVzIrzyg"
                    target="_blank">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <span class="svg-icon text-primary">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.9 10.7L7 5V19L16.9 13.3C17.9 12.7 17.9 11.3 16.9 10.7Z"
                                            fill="#035A4B"></path>
                                    </svg>
                                </span>
                            </div>
                            <div class="flex-grow-1 ms-4">
                                <h2 class="card-title">Watch video tutorial</h2>
                                <p class="card-text text-body">Checkout online grocery store has a large collection
                                    of
                                    tutorial videos to
                                    help guide you through various aspects</p>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- End Icon Block -->
            </div>
            <!-- End Col -->
            <div class="col-md-4 mb-3 mb-lg-0" data-aos="fade-up">
                <!-- Icon Block -->
                <a class="card card-transition h-100" href="https://creativeitem.zendesk.com/hc/en-us/requests/new"
                    target="_blank">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <span class="svg-icon text-primary">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M22.1671 18.1421C22.4827 18.4577 23.0222 18.2331 23.0206 17.7868L23.0039 13.1053V5.52632C23.0039 4.13107 21.8729 3 20.4776 3H8.68815C7.2929 3 6.16183 4.13107 6.16183 5.52632V9H13C14.6568 9 16 10.3431 16 12V15.6316H19.6565L22.1671 18.1421Z"
                                            fill="#035A4B"></path>
                                        <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M1.98508 18V13C1.98508 11.8954 2.88051 11 3.98508 11H11.9851C13.0896 11 13.9851 11.8954 13.9851 13V18C13.9851 19.1046 13.0896 20 11.9851 20H4.10081L2.85695 21.1905C2.53895 21.4949 2.01123 21.2695 2.01123 20.8293V18.3243C1.99402 18.2187 1.98508 18.1104 1.98508 18ZM5.99999 14.5C5.99999 14.2239 6.22385 14 6.49999 14H11.5C11.7761 14 12 14.2239 12 14.5C12 14.7761 11.7761 15 11.5 15H6.49999C6.22385 15 5.99999 14.7761 5.99999 14.5ZM9.49999 16C9.22385 16 8.99999 16.2239 8.99999 16.5C8.99999 16.7761 9.22385 17 9.49999 17H11.5C11.7761 17 12 16.7761 12 16.5C12 16.2239 11.7761 16 11.5 16H9.49999Z"
                                            fill="#035A4B"></path>
                                    </svg>
                                </span>
                            </div>
                            <div class="flex-grow-1 ms-4">
                                <h2 class="card-title">Ask a question</h2>
                                <p class="card-text text-body">Contact us directly. Send us a ticket and get reply
                                    via
                                    zendesk.</p>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- End Icon Block -->
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>
</div>