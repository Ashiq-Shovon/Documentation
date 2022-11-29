<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title . ': ' . $product_details['name']; ?>
                    <a href="<?php echo site_url('admin'); ?>" class="ml-1 btn btn-secondary btn-rounded alignToTitle"><i class="mdi mdi-arrow-left"></i><?php echo get_phrase('back_to_product_list'); ?></a>
                    <a href="javascript:void(0)" onclick="showAjaxModal('<?php echo site_url('modal/popup/add_package/' . $product_details['id']); ?>', '<?php echo get_phrase('add_new_package'); ?>')" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i><?php echo get_phrase('add_new_package'); ?></a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row justify-content-center mt-5">
    <!-- Plans -->
    <?php foreach ($pricing_packages->result_array() as $key => $pricing_package) : ?>
        <div class="col-md-4">
            <div class="card card-pricing <?php if ($pricing_package['pricing_package_is_recommended']) : ?> card-pricing-recommended <?php endif; ?>">
                <div class="card-body text-center">
                    <?php if ($pricing_package['pricing_package_is_recommended']) : ?>
                        <div class="card-pricing-plan-tag"><?php echo get_phrase('recommended'); ?></div>
                    <?php endif; ?>
                    <p class="card-pricing-plan-name font-weight-bold text-uppercase"><?php echo $pricing_package['pricing_package_name']; ?></p>
                    <i class="card-pricing-icon dripicons-briefcase text-primary"></i>
                    <h2 class="card-pricing-price">
                        <?php if ($pricing_package['pricing_package_is_free']) : ?>
                            <?php echo get_phrase('free'); ?>
                        <?php else : ?>
                            <?php
                            if ($pricing_package['pricing_package_has_discount']) {
                                echo currency($pricing_package['pricing_package_discounted_price']);
                            } else {
                                echo currency($pricing_package['pricing_package_regular_price']);
                            }
                            ?>
                            <span><?php if ($pricing_package['pricing_package_duration'] == "yearly") echo "/ yearly"; ?></span>
                        <?php endif; ?>
                    </h2>
                    <ul class="card-pricing-features">
                        <?php foreach (explode(',', $pricing_package['pricing_package_features']) as $key => $feature) : ?>
                            <li><?php echo $feature; ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <button class="btn btn-outline-secondary btn-sm mt-4 mb-2" onclick="showAjaxModal('<?php echo site_url('modal/popup/edit_package/' . $pricing_package['pricing_package_id'] . '/' . $product_details['id']); ?>', '<?php echo get_phrase('update_package'); ?>')""><?php echo get_phrase('edit'); ?></button>
                    <button class=" btn btn-outline-danger btn-sm mt-4 mb-2" onclick="confirm_modal('<?php echo site_url('admin/packages/' . $product_details['slug'] . '/delete/' . $pricing_package['pricing_package_id']); ?>');"><?php echo get_phrase('delete'); ?></button>
                </div>
            </div> <!-- end Pricing_card -->
        </div>
    <?php endforeach; ?>
    <!-- End plans -->
    <?php if ($pricing_packages->num_rows() == 0) : ?>
        <div class="img-fluid w-100 text-center">
            <img style="opacity: 1; width: 100px;" src="<?php echo base_url('assets/backend/images/file-search.svg'); ?>"><br>
            <?php echo get_phrase('no_data_found'); ?>
        </div>
    <?php endif; ?>
</div>