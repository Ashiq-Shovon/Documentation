<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <?php foreach ($products as $product) :
        $number_of_topics = $this->topic_model->get_topics('id', $product['id'])->num_rows();
        $number_of_articles = $this->article_model->get_article_by_product_id($product['id'])->num_rows();
    ?>
        <div class="col-md-6 col-xl-3 on-hover-action" id="<?php echo $product['id']; ?>">
            <!-- project card -->
            <div class="card d-block">
                <!-- project-thumbnail -->
                <img class="card-img-top" src="<?php echo base_url('uploads/thumbnails/products/' . $product['thumbnail']); ?>" alt="product thumbnail">
                <div class="card-img-overlay">
                    <div class="badge badge-secondary p-1"><?php echo ucfirst($product['type']); ?></div>
                </div>

                <div class="card-body position-relative min-height-155">
                    <!-- project title-->
                    <h4 class="mt-0">
                        <a href="<?php echo site_url('admin/topics/' . $product['slug']) ?>" class="text-title"><?php echo $product['name']; ?></a>
                    </h4>
                    <!-- project detail-->
                    <p class="mb-3">
                        <span class="pr-2 text-nowrap">
                            <i class="mdi mdi-format-list-bulleted-type"></i>
                            <b><?php echo $number_of_topics; ?></b> Topics
                        </span>
                        <span class="text-nowrap">
                            <i class="mdi mdi-comment-multiple-outline"></i>
                            <b><?php echo $number_of_articles; ?></b> Articles
                        </span>
                    </p>
                    <a href="<?php echo site_url('admin/topics/' . $product['slug']) ?>" class="btn btn-primary btn-block"><?php echo get_phrase('go_to_documentations'); ?></a>
                    <a href="javascript:;" class="btn btn-success mt-2 text-center w-100" onclick="showAjaxModal('<?php echo site_url('admin/select_article_to_export/'.$product['slug']) ?>', '<?php echo $product['name']; ?>')">Export Documentation</a>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    <?php endforeach; ?>
</div>