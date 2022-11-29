<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?>
                    <a href="javascript:void(0)" onclick="showAjaxModal('<?php echo site_url('modal/popup/product_add'); ?>', '<?php echo get_phrase('add_product'); ?>')" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i><?php echo get_phrase('add_new_product'); ?></a>
                </h4>
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
                        <a href="<?php echo site_url('writer/topics/' . $product['slug']) ?>" class="text-title"><?php echo $product['name']; ?></a>
                        <div class="dropdown float-right">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(20px, 21px, 0px);">
                                <!-- item-->
                                <a href="javascript:void(0)" onclick="showAjaxModal('<?php echo site_url('modal/popup/product_edit/' . $product['id']); ?>', '<?php echo get_phrase('edit_product'); ?>')" class="dropdown-item">
                                    <?php echo get_phrase('edit'); ?>
                                </a>
                                <!-- item-->
                                <a href="javascript:void(0)" class="dropdown-item" onclick="confirm_modal('<?php echo site_url('writer/products/delete/' . $product['id']); ?>');">
                                    <?php echo get_phrase('delete'); ?>
                                </a>
                                <!-- item-->
                                <a href="<?php echo site_url('writer/packages/' . $product['slug']) ?>" class="dropdown-item">
                                    <?php echo get_phrase('pricing_packages'); ?>
                                </a>
                            </div>
                        </div>
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
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    <?php endforeach; ?>
</div>
