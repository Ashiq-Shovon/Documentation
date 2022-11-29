
<style type="text/css">
    .sticky-nav{
      position: sticky !important;
    }
    @media only screen and (max-width: 991px) {
      .nav-sm-device-top{
        display: none !important;
      }
      .nav-sm-device{
        top: 50px !important;
      }
    }
    .navbar-moved-up{
      transform: translate3d(0,0%,0) !important;
    }
    .navbar-sidebar-aside-content *{
        max-width: 100%;
    }
    
</style>

<!-- Navbar -->
<nav id="header-nav" class="sticky-nav js-nav-scroller navbar navbar-expand-lg navbar-sidebar navbar-vertical navbar-light bg-white border-end nav-sm-device-top pt-4" style="overflow: hidden; top: 72px; height: 140px !important;">
    <div class="navbar-brand-wrapper border-end tet-center" style="height: auto; position: unset; padding-top: 20px;">
      
      <div class="d-flex align-items-center mb-2">
        <a class="navbar-brand" href="../documentation/index.html" aria-label="Space">
          <img class="" src="<?php echo base_url('uploads/favicons/products/'.$product_details['favicon']); ?>" width="40px" alt="Logo">
        </a>
        <a class="navbar-brand-badge" href="../documentation/changelog.html">
          <span class="badge bg-soft-primary text-primary ms-2"><?php echo $product_details['name']; ?></span>
        </a>
      </div>
      <small class="text-muted">Documentation</small>
    </div>
</nav>

<nav id="doc-list-nav" class="sticky-nav js-nav-scroller navbar navbar-expand-lg navbar-sidebar navbar-vertical navbar-light bg-white border-end nav-sm-device mt-0"
      data-hs-nav-scroller-options='{
        "type": "vertical",
        "target": ".navbar-nav .active",
        "offset": 80
       }' style="overflow-x: hidden; top: 212px;">

  <!-- Navbar Toggle -->
  <div class="d-grid flex-grow-1 px-2">
    <button type="button" class="navbar-toggler btn btn-white" data-bs-toggle="collapse" data-bs-target="#navbarVerticalNavMenu" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navbarVerticalNavMenu">
      <span class="d-flex justify-content-between align-items-center">
        <span class="h3 mb-0">Documentation</span>

        <span class="navbar-toggler-default">
          <i class="bi-list"></i>
        </span>

        <span class="navbar-toggler-toggled">
          <i class="bi-x"></i>
        </span>
      </span>
    </button>
  </div>
  <!-- End Navbar Toggle -->

  <!-- Navbar Collapse -->

  <div id="navbarVerticalNavMenu" class="collapse navbar-collapse">

    <div class="docs-navbar-sidebar-aside-body navbar-sidebar-aside-body" style="padding-top: 0px !important;">
      <ul id="navbarSettings" class="navbar-nav nav nav-vertical nav-tabs nav-tabs-borderless nav-sm">
        <?php foreach ($topics as $key => $topic) : ?>
            <li class="nav-item">
              <span class="nav-subtitle"><?php echo $topic['topic']; ?></span>
            </li>
        
            <?php $articles = $this->article_model->get_articles($topic['id'], true)->result_array(); ?>
            <?php foreach ($articles as $key => $article) : ?>
                <li class="nav-item" style="padding: 1px 0px;">
                    <a class="nav-link text-wrap <?php if ($article['id'] == $selected_article['id']) echo "active"; ?>" href="<?php echo site_url('docs/') . $product_details['slug'] . '/' . $article['slug']; ?>" onclick="load_documentation(this, event, '<?php echo $article['slug']; ?>', '<?php echo $article['article']; ?>', '<?php echo $topic['topic']; ?>')">
                        <?php echo $article['article']; ?>
                    </a>
                </li>
            <?php endforeach; ?>

            <li class="nav-item my-2 my-lg-5"></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
  <!-- End Navbar Collapse -->
</nav>
<!-- End Navbar -->


<!-- Content -->
<div class="navbar-sidebar-aside-content content-space-1 content-space-md-2 px-lg-5 px-xl-10">

<div class="row" id="documentation-body-area">
  
  <div class="col-sm pt-5">
    <h1 class="docs-page-header-title mb-4 mt-5" id="topic-title"><?php echo htmlspecialchars($selected_article['article']); ?></h1>
    <div id="documentation-area">
        <?php include "documentation-body.php"; ?>
        <!-- start page title -->
    </div>
  </div>
  <div class="col-12 text-center" id="ads">
  </div>
  <script type="text/javascript">
    $.ajax({
      type : 'GET',
      url  : 'http://localhost/creativeitem/site/show_ad/728/90',
      success : function(response) {
          $('#ads').html(response);
      }
    });
  </script>
</div>

</div>
<!-- End Content -->



<script type="text/javascript">
  var header_nav_height = document.getElementById('header-nav').offsetHeight;
  var doc_list_nav_height = document.getElementById('doc-list-nav').offsetHeight;
  var margin_top = Number(doc_list_nav_height) + Number(header_nav_height);
  document.getElementById("documentation-body-area").style.marginTop = "-"+margin_top+"px";

  var doc_nav = document.querySelector('#doc-list-nav');
  var active_list = document.querySelector('#navbarSettings li a.active');
  doc_nav.scrollTop = active_list.offsetTop;
</script>