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
        $number_of_product_files = $this->product_model->product_files($product['id'])->num_rows();
    ?>
        <div class="col-md-6 col-xl-3 on-hover-action" id="<?php echo $product['id']; ?>">
            <!-- project card -->
            <div class="card d-block">
                <!-- project-thumbnail -->
                <a href="<?php echo site_url('admin/packages/' . $product['slug']) ?>">
                    <img class="card-img-top" src="<?php echo base_url('uploads/thumbnails/products/' . $product['thumbnail']); ?>" alt="product thumbnail">
                </a>
                <div class="card-img-overlay">
                    <div class="badge badge-secondary p-1"><?php echo ucfirst($product['type']); ?></div>
                </div>

                <div class="card-body position-relative min-height-155">
                    <!-- project title-->
                    <h4 class="mt-0">
                        <a href="<?php echo site_url('admin/packages/' . $product['slug']) ?>" class="text-title"><?php echo $product['name']; ?></a>
                        <div class="dropdown float-right">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(20px, 21px, 0px);">
                                <!-- item-->
                                <a href="javascript:void(0)" onclick="showAjaxModal('<?php echo site_url('modal/popup/product_file/' . $product['id']); ?>', '<?php echo get_phrase('product_files'); ?>')" class="dropdown-item">
                                    <?php echo get_phrase('product_file'); ?>
                                </a>
                                <!-- item-->
                                <a href="javascript:void(0)" onclick="showAjaxModal('<?php echo site_url('modal/popup/product_edit/' . $product['id']); ?>', '<?php echo get_phrase('edit_product'); ?>')" class="dropdown-item">
                                    <?php echo get_phrase('edit'); ?>
                                </a>
                                <!-- item-->
                                <a href="javascript:void(0)" class="dropdown-item" onclick="confirm_modal('<?php echo site_url('admin/products/delete/' . $product['id']); ?>');">
                                    <?php echo get_phrase('delete'); ?>
                                </a>
                                <!-- item-->
                                <a href="<?php echo site_url('admin/packages/' . $product['slug']) ?>" class="dropdown-item">
                                    <?php echo get_phrase('pricing_packages'); ?>
                                </a>
                                <!-- item-->
                                <a href="<?php echo site_url('site/download_doc/' . $product['slug']) ?>" class="dropdown-item">
                                    <?php echo get_phrase('download_doc'); ?>
                                </a>
                            </div>
                        </div>
                    </h4>

                    <!-- project detail-->
                    <p class="mb-3">
                        <span class="pr-2 text-nowrap">
                            <i class="mdi mdi-format-list-bulleted-type"></i>
                            <b><?php echo $number_of_product_files; ?></b> <?php echo get_phrase('product_files'); ?>
                        </span>
                    </p>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    <?php endforeach; ?>

    <?php if (count($products) == 0) : ?>
        <div class="img-fluid w-100 text-center">
            <img style="opacity: 1; width: 100px;" src="<?php echo base_url('assets/backend/images/file-search.svg'); ?>"><br>
            <?php echo get_phrase('no_data_found'); ?>
        </div>
    <?php endif; ?>
</div>