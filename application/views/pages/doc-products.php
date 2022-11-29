<?php //$product_types = $this->product_model->get_product_types()->result_array(); ?>
<?php $products = $this->product_model->get_products()->result_array(); ?>
<!-- Hero -->
<div class="gradient-x-overlay-sm-primary position-relative overflow-hidden">
  <div class="container content-space-t-3 content-space-t-lg-4">
        <!-- Heading -->
        <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-5 mb-md-9">
          <h1 class="display-4 mb-3"><?php echo site_phrase('documentation'); ?></h1>
          <p class="lead mb-0">In depth description and tutorial <br>of our superb products, for users and developers.</p>
        </div>
        <!-- End Title & Description -->
  </div>

  <!-- Mockup -->
  <div class="container content-space-b-2 content-space-b-lg-3">
    <div class="position-relative text-center mx-lg-auto">
      <!-- Card Grid -->
      <div class="container">

        <div class="row">
          <!-- Product -->
          <?php
            foreach ($products as $key => $product) :
            ?>
              <div class="col-md-3 mb-3 mb-md-0 zi-2 mt-8">
                <a class="card card-transition h-80" href="<?php echo site_url('docs/' . $product['slug']); ?>" data-aos="fade-up">
                  <img class="card-img-top" src="<?php echo base_url('uploads/thumbnails/products/' . $product['thumbnail']); ?>" alt="<?php echo $product['slug']; ?> " title="<?php echo $product['slug'] ?>">

                  <div class="card-body">
                    <h4 class="card-title text-inherit"><?php echo htmlspecialchars($product['name']); ?></h4>
                  </div>
                </a>
              </div>
              <!-- End Product -->
          <?php endforeach; ?>
        </div>
        <!-- End Row -->
      </div>
      <!-- End Card Grid -->

      <!-- End products -->

      <!-- SVG Shape -->
      <figure class="position-absolute top-0 end-0 mt-n10 me-n10" style="width: 12rem; " data-aos="fade-up" data-aos-delay="100" data-aos-offset="-50">
        <img class="img-fluid" src="<?php echo site_url('assets/frontend/front'); ?>/svg/components/dots-lg.svg" alt="Image Description">
      </figure>
      <!-- End SVG Shape -->

      <!-- SVG Shape -->
      <figure class="position-absolute bottom-0 start-0 mb-n7 ms-n7" style="width: 10rem;" data-aos="fade-up">
        <img class="img-fluid" src="<?php echo site_url('assets/frontend/front'); ?>/svg/components/dots.svg" alt="Image Description">
      </figure>
      <!-- End SVG Shape -->
    </div>
  </div>
  <!-- End Mockup -->

  <!-- SVG Background Shape -->
  <figure class="position-absolute top-0 end-0 zi-n1 mt-n10 me-n10" style="width: 32rem;">
    <svg viewBox="0 0 451 902" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M451 820C247.2 820 82 654.8 82 451C82 247.2 247.2 82 451 82" stroke="white" stroke-width="164" stroke-miterlimit="10"/>
    </svg>
  </figure>
  <!-- End SVG Background Shape -->

  <!-- SVG Background Shape -->
  <figure class="position-absolute bottom-0 start-0 zi-n1 mb-n10 me-n10" style="width: 21rem;">
    <svg viewBox="0 0 451 902" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path opacity="0.125" d="M0 82C203.8 82 369 247.2 369 451C369 654.8 203.8 820 0 820" stroke="url(#paint1_linear)" stroke-width="164" stroke-miterlimit="10"/>
      <defs>
        <linearGradient id="paint1_linear" x1="323.205" y1="785.242" x2="-97.6164" y2="56.3589" gradientUnits="userSpaceOnUse">
          <stop offset="0" stop-color="white" stop-opacity="0"/>
          <stop offset="1" stop-color="#377dff"/>
        </linearGradient>
      </defs>
    </svg>
  </figure>
  <!-- End SVG Background Shape -->
</div>
<!-- End Hero -->

<!-- CTA -->
<div class="container content-space-b-2">
  <div class="text-center bg-img-start py-6" style="background: url(./assets/svg/components/shape-6.svg) center no-repeat;">
    <div class="mb-5">
      <h2>Still need any help?</h2>
      <p>If you didn't find any solution, no need to worry!</p>
    </div>

    <a class="btn btn-primary btn-transition" target="_blank" href="https://support.creativeitem.com/">Contact us</a>
  </div>
</div>
<!-- End CTA -->