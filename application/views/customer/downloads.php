<?php if ($my_downloads->num_rows() > 0) : ?>
    <div class="row justify-content-center">
        <div class="col-12 col-xl-12 col-lg-12 col-md-12">
            <ul class="list-style-08">
                <?php foreach ($my_downloads->result_array() as $key => $my_download) : ?>
                    <li class="border-bottom border-color-black-transparent">
                        <div class="w-75 lg-w-85 xs-w-100 last-paragraph-no-margin">
                            <span class="text-extra-medium text-extra-dark-gray">
                                <strong><?php echo site_phrase('package_name'); ?>: </strong> <?php echo $my_download['pricing_package_name']; ?>
                                <span class="label-<?php echo ($my_download['pricing_package_duration'] ==  "yearly") ? 'new' : 'hot'; ?>"><?php echo $my_download['pricing_package_duration'] . ' ' . site_phrase('package'); ?></span>
                            </span>
                            <p>
                                <span class="d-block">
                                    <strong><?php echo site_phrase('license_code'); ?> : </strong><?php echo $my_download['license_code']; ?>
                                </span>
                                <span class="d-block">
                                    <strong><?php echo site_phrase('maximum_installable_site'); ?> : </strong><?php echo $my_download['pricing_package_max_site']; ?>
                                </span>
                                <span class="d-block">
                                    <strong><?php echo site_phrase('purchase_date'); ?> : </strong><?php echo date('D, d-M-Y', $my_download['date_added']); ?>
                                </span>
                                <span class="d-block">
                                    <strong><?php echo site_phrase('invoice'); ?> : </strong> <a href="<?php echo site_url('customer/invoice/' . $my_download['license_code']); ?>"><i class="fas fa-download"></i> <?php echo site_phrase('download_invoice'); ?></a>
                                </span>
                            </p>
                        </div>
                        <div class="font-weight-500 text-extra-medium text-extra-dark-gray">
                            <a href="<?php echo site_url('customer/download/' . $my_download['license_code']); ?>" class="btn btn-large btn-transparent-dark-gray d-table d-lg-inline-block lg-margin-15px-bottom md-margin-auto-lr"><i class="feather icon-feather-download icon-extra-small left-icon"></i><?php echo site_phrase('download'); ?></a>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
<?php endif; ?>

<?php if ($my_downloads->num_rows() == 0) : ?>
    <div class="text-center">
        <img src="<?php echo base_url('assets/images/empty.png'); ?>" alt="empty" class="empty-graphics">
        <div class="empty-text"><?php echo site_phrase('sorry'); ?>, <?php echo site_phrase('you_have_nothing_to_download'); ?></div>
    </div>
<?php endif; ?>