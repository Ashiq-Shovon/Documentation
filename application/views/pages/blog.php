


<!-- Hero -->
    <div class="container content-space-b-1 content-space-b-md-1 ">
      <div class="w-md-75 w-lg-50 text-center mx-md-auto  content-space-t-lg-4">
        <h1 class="display-4">Blog</h1>
        <p class="lead">Latest updates and Hand-picked resources.</p>
      </div>
    </div>
    <!-- End Hero -->

    <!-- Card -->
    <div class="container content-space-b-2 content-space-b-md-2">
      <div class="text-center mb-4 mb-md-4">
        <?php foreach($this->blog_model->get_all_categories()->result_array() as $blog_category): ?>
            <a class="btn btn-soft-secondary btn-xs rounded-pill m-1 <?php if(isset($_GET['category']) && $_GET['category'] == $blog_category['blog_category_slug'])echo 'active'; ?>" href="<?php echo site_url('blog?category=').$blog_category['blog_category_slug']; ?>"><?php echo $blog_category['blog_category_name']; ?></a>
        <?php endforeach; ?>
      </div>
      <div class="card card-flush">
        <?php foreach ($blogs as $blog) : ?>
            <div class="row align-items-md-center mb-3">
              <div class="col-md-8">
                <img class="card-img rounded-2" src="<?php echo base_url('uploads/thumbnails/blog_thumbnails/' . $blog['blog_thumbnail']); ?>" alt="Image Description">
              </div>
              <!-- End Col -->

              <div class="col-md-4">
                <div class="card-body">
                  <span class="card-subtitle"><?php echo $blog['blog_category_name']; ?></span>
                  <h2 class="card-title"><a class="text-dark" href="<?php echo site_url('blog/' . $blog['blog_slug']); ?>"><?php echo ellipsis($blog['blog_title'], 50); ?></a></h2>
                  <p class="card-text"><?php echo ellipsis($blog['blog_excerpt'], 130); ?></p>
                  <a href="<?php echo site_url('blog/' . $blog['blog_slug']); ?>" title="<?php echo $blog['blog_title']; ?>" class="card-link" href="#">Read more <i class="bi-chevron-right small ms-1"></i></a>
                </div>
              </div>
              <!-- End Col -->
            </div>
            <!-- End Row -->
        <?php endforeach; ?>

        <div class="row">
            <!-- start pagination -->
            <div class="col-12 d-flex justify-content-center">
                <?php echo $this->pagination->create_links(); ?>
            </div>
            <!-- end pagination -->
        </div>
      </div>
      <div class="row justify-content-center">
            <?php if (count($blogs) == 0) : ?>
                <div class="img-fluid w-100 text-center">
                    <img style="opacity: 1; width: 100px;" src="<?php echo base_url('assets/backend/images/file-search.svg'); ?>"><br>
                    <?php echo site_phrase('no_data_found'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <!-- End Card -->