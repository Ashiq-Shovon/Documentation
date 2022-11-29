<?php
// HERE YOU WILL GET THE PRODUCT DETAILS USING THIS VARIABLE "$product_details"
$active_tab = "yearly-tab";
if ($pricing_packages_yearly->num_rows() == 0 && $pricing_packages_lifetime->num_rows() > 0) {
    $active_tab = "lifetime-tab";
} elseif ($pricing_packages_yearly->num_rows() == 0 && $pricing_packages_lifetime->num_rows() == 0) {
    $active_tab = "null";
}
?>
<section class="sticky-buy-area">
    <div class="row justify-content-center tab-style-04 pt-2">
        <div class="col-lg-4">
            <!-- start tab navigation -->
            <ul class="nav nav-tabs text-uppercase justify-content-center alt-font sm-margin-20px-bottom">
                <li class="nav-item bg-white border-color-extra-light-gray"><a href="#yearly-tab" class="nav-link <?php if ($active_tab == "yearly-tab") echo 'active'; ?>" data-toggle="tab"><?php echo site_phrase('yearly'); ?></a><span class="tab-bg-active bg-fast-blue"></span></li>
                <li class="nav-item bg-white border-color-extra-light-gray"><a href="#lifetime-tab" class="nav-link <?php if ($active_tab == "lifetime-tab") echo 'active'; ?>" data-toggle="tab"><?php echo site_phrase('Lifetime'); ?></a><span class="tab-bg-active bg-fast-blue"></span></li>
            </ul>
        </div>
        <div class="col-lg-8 tab-content">
            <div id="yearly-tab" class="tab-pane fade in <?php if ($active_tab == "yearly-tab") echo 'active show'; ?>">
                <div class="row">
                    <div class="col-lg-9 col-md-8 col-xs-12">
                        <div class="row">
                            <?php foreach ($pricing_packages_yearly->result_array() as $yearly_key => $yearly_package) : ?>
                                <div class="col-lg-4 col-md-4 col-xs-6">
                                    <div class="custom-radios">
                                        <input type="radio" id="<?php echo $yearly_package['pricing_package_identifier']; ?>" name="plan" value="<?php echo $yearly_package['pricing_package_identifier']; ?>" <?php if ($active_tab == "yearly-tab" && $yearly_key == 0) echo "checked"; ?>>
                                        <label for="<?php echo $yearly_package['pricing_package_identifier']; ?>" class="w-100">
                                            <span style="background-color: <?php echo $yearly_package['pricing_package_color']; ?>;">
                                                <img src="<?php echo base_url('assets/images/check.svg'); ?>" height="22px" alt="Checked Icon" />
                                            </span>
                                            <?php if ($yearly_package['pricing_package_is_recommended']) : ?>
                                                <div class="popular-badge"><?php echo site_phrase('popular'); ?></div>
                                            <?php endif; ?>
                                            <div class="package-name"><?php echo $yearly_package['pricing_package_max_site'] . ' ' . strtoupper(site_phrase('sites')); ?></div>
                                            <div class="price">
                                                <?php
                                                if ($yearly_package['pricing_package_is_free']) {
                                                    echo site_phrase('free');
                                                } else {
                                                    if ($yearly_package['pricing_package_has_discount']) {
                                                        echo currency($yearly_package['pricing_package_discounted_price']);
                                                    } else {
                                                        echo currency($yearly_package['pricing_package_regular_price']);
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-xs-6 id=" buynow">
                        <a href="javascript:void(0)" class="btn btn-large btn-transparent-black btn-rounded" onclick="popupPlanConfirmModal()">Buy Now</a>
                    </div>
                </div>
            </div>
            <div id="lifetime-tab" class="tab-pane fade <?php if ($active_tab == "lifetime-tab") echo 'active show'; ?>">
                <div class="row">
                    <div class="col-lg-9 col-md-8 col-xs-12">
                        <div class="row">
                            <?php foreach ($pricing_packages_lifetime->result_array() as $lifetime_key => $lifetime_package) : ?>
                                <div class="col-lg-4 col-md-4 col-xs-6">
                                    <div class="custom-radios">
                                        <input type="radio" id="<?php echo $lifetime_package['pricing_package_identifier']; ?>" name="plan" value="<?php echo $lifetime_package['pricing_package_identifier']; ?>" <?php if ($active_tab == "lifetime-tab" && $lifetime_key == 0) echo "checked"; ?>>
                                        <label for="<?php echo $lifetime_package['pricing_package_identifier']; ?>" class="w-100">
                                            <span style="background-color: <?php echo $lifetime_package['pricing_package_color']; ?>;">
                                                <img src="<?php echo base_url('assets/images/check.svg'); ?>" height="22px" alt="Checked Icon" />
                                            </span>
                                            <?php if ($lifetime_package['pricing_package_is_recommended']) : ?>
                                                <div class="popular-badge"><?php echo site_phrase('popular'); ?></div>
                                            <?php endif; ?>
                                            <div class="package-name">
                                                <?php echo $lifetime_package['pricing_package_max_site'] . ' ' . strtoupper(site_phrase('sites')); ?>
                                            </div>
                                            <div class="price">
                                                <?php
                                                if ($lifetime_package['pricing_package_is_free']) {
                                                    echo site_phrase('free');
                                                } else {
                                                    if ($lifetime_package['pricing_package_has_discount']) {
                                                        echo currency($lifetime_package['pricing_package_discounted_price']);
                                                    } else {
                                                        echo currency($lifetime_package['pricing_package_regular_price']);
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-xs-6 id=" buynow">
                        <a href="javascript:void(0)" class="btn btn-large btn-transparent-black btn-rounded" onclick="popupPlanConfirmModal()">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stripe JavaScript library -->
<script src="https://js.stripe.com/v3/"></script>
<script>
    function popupPlanConfirmModal(selectedPlan) {
        selectedPlan = !selectedPlan ? $('input[name=plan]:checked').val() : selectedPlan;
        showLargeModal('<?php echo site_url('modal/showup/confirm-plan/'); ?>' + selectedPlan + '/<?php echo $product_details['id']; ?>');
    }
</script>