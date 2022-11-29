<?php
$product_id = $param3;
$selected_pricing_package_identifier = $param2;

$yearly_packages = $this->pricing_package_model->get_all_pricing_packages('id', $product_id, true, 'yearly')->result_array();
$lifetime_packages = $this->pricing_package_model->get_all_pricing_packages('id', $product_id, true, 'lifetime')->result_array();
$selected_pricing_package = $this->pricing_package_model->get_pricing_package_by_identifier($selected_pricing_package_identifier, true)->row_array();
if ($selected_pricing_package['pricing_package_duration'] == "yearly") {
    $active_tab = "yearly-package";
} else {
    $active_tab = "lifetime-package";
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 p-0 tab-style-04">
            <!-- start tab navigation -->
            <ul class="nav nav-tabs text-uppercase justify-content-center text-center alt-font margin-2-rem-bottom lg-margin-8-rem-bottom sm-margin-20px-bottom">
                <li class="nav-item bg-white border-color-extra-light-gray">
                    <a class="nav-link <?php if ($active_tab == 'yearly-package') echo 'active'; ?>" data-toggle="tab" href="#yearly-package">
                        <?php echo get_phrase('yearly_package'); ?>
                    </a>
                    <span class="tab-bg-active bg-fast-blue"></span>
                </li>
                <li class="nav-item bg-white border-color-extra-light-gray">
                    <a class="nav-link <?php if ($active_tab == 'lifetime-package') echo 'active'; ?>" data-toggle="tab" href="#lifetime-package">
                        <?php echo get_phrase('lifetime_package'); ?>
                    </a>
                    <span class="tab-bg-active bg-fast-blue"></span>
                </li>
            </ul>
            <!-- end tab navigation -->
        </div>
    </div>
    <div class="container">
        <div class="tab-content">
            <!-- start tab item -->
            <div id="yearly-package" class="tab-pane fade <?php if ($active_tab == 'yearly-package') echo 'in active show'; ?>">
                <div class="row align-items-center">
                    <table class="table table-striped pricing-packges-table">
                        <thead>
                            <tr>
                                <th class="font-weight-500 border-top-none"><?php echo site_phrase('Package'); ?></th>
                                <th class="font-weight-500 border-top-none"><?php echo site_phrase('maximum_number_of_site'); ?></th>
                                <th class="font-weight-500 border-top-none"><?php echo site_phrase('Price'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($yearly_packages as $key => $yearly_package) : ?>
                                <tr>
                                    <td>
                                        <input type="radio" id="<?php echo $yearly_package['pricing_package_identifier']; ?>" name="confirmed-package" onclick="togglePricingPackage('<?php echo $yearly_package['pricing_package_identifier']; ?>', '<?php echo $yearly_package['pricing_package_name']; ?>')" <?php if ($selected_pricing_package['pricing_package_identifier'] == $yearly_package['pricing_package_identifier']) echo 'checked'; ?> value="<?php echo $yearly_package['pricing_package_identifier']; ?>"> &nbsp;
                                        <label class="" for="<?php echo $yearly_package['pricing_package_identifier']; ?>"><?php echo $yearly_package['pricing_package_name']; ?></label>
                                    </td>
                                    <td><?php echo $yearly_package['pricing_package_max_site']; ?></td>
                                    <td>
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
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end tab item -->
            <!-- start tab item -->
            <div id="lifetime-package" class="tab-pane fade <?php if ($active_tab == 'lifetime-package') echo 'in active show'; ?>">
                <div class="row align-items-center">
                    <table class="table table-striped pricing-packges-table">
                        <thead>
                            <tr>
                                <th class="font-weight-500 border-top-none"><?php echo site_phrase('Package'); ?></th>
                                <th class="font-weight-500 border-top-none"><?php echo site_phrase('maximum_number_of_site'); ?></th>
                                <th class="font-weight-500 border-top-none"><?php echo site_phrase('Price'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($lifetime_packages as $key => $lifetime_package) : ?>
                                <tr>
                                    <td>
                                        <input type="radio" id="<?php echo $lifetime_package['pricing_package_identifier']; ?>" name="confirmed-package" onclick="togglePricingPackage('<?php echo $lifetime_package['pricing_package_identifier']; ?>', '<?php echo $lifetime_package['pricing_package_name']; ?>')" <?php if ($selected_pricing_package['pricing_package_identifier'] == $lifetime_package['pricing_package_identifier']) echo 'checked'; ?> value="<?php echo $lifetime_package['pricing_package_identifier']; ?>"> &nbsp;
                                        <label class="" for="<?php echo $lifetime_package['pricing_package_identifier']; ?>">
                                            <?php echo $lifetime_package['pricing_package_name']; ?>
                                        </label>
                                    </td>
                                    <td><?php echo $lifetime_package['pricing_package_max_site']; ?></td>
                                    <td>
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
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end tab item -->
        </div>
    </div>
</div>

<!-- USER EMAIL AS INPUT -->
<div class="container">
    <div class="row border-top border-width-1px border-color-medium-gray">
        <div class="col-12">
            <label class="margin-5px-bottom margin-10px-top"><?php echo site_phrase('user_email'); ?><span class="required-error text-radical-red">*</span></label>
            <input class="small-input bg-white margin-20px-bottom" type="text" name="user-email" id="user-email" placeholder="<?php echo site_phrase('provide_an_email_address_that_you_would_want_to_use_in_the_future'); ?>">
        </div>
    </div>
</div>

<!-- PAYMENT GATEWAYS -->
<div class="container-fluid">
    <div class="row border-top border-width-1px border-color-medium-gray">
        <div class="col-12 p-0 tab-style-07">
            <!-- start tab navigation -->
            <ul class="nav nav-tabs justify-content-center text-center text-uppercase font-weight-500 alt-font margin-2-rem-bottom lg-margin-8-rem-bottom border-bottom border-color-medium-gray md-margin-6-rem-bottom">
                <li class="nav-item">
                    <a data-toggle="tab" href="#stripe-payment-gateway" class="nav-link active">
                        <img src="<?php echo base_url('assets/images/stripe.png'); ?>" class="payment-gateways" alt="">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#paypal-payment-gateway">
                        <img src="<?php echo base_url('assets/images/paypal.png'); ?>" class="payment-gateways" alt="">
                    </a>
                </li>
            </ul>
            <!-- end tab navigation -->
        </div>
    </div>
    <div class="container">
        <div class="tab-content">
            <!-- start tab item -->
            <div id="stripe-payment-gateway" class="tab-pane fade in active show">
                <div class="row align-items-center">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="font-weight-500 border-top-none"><?php echo get_phrase('payment_details'); ?></th>
                                <th class="font-weight-500 border-top-none text-center"><?php echo get_phrase('pay_now'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="selected-pricing-package"><?php echo $selected_pricing_package['pricing_package_name']; ?></td>
                                <td class=" text-center">
                                    <a href="javascript:void(0)" class="btn btn-large btn-transparent-fast-blue d-table d-lg-inline-block lg-margin-15px-bottom md-margin-auto-lr proceed-to-payment" id="payButton" gateway="stripe"> <i class="fas fa-spinner fa-spin pay-btn-spinner d-none"></i> <?php echo get_phrase('pay_with_stripe', true); ?></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end tab item -->
            <!-- start tab item -->
            <div id="paypal-payment-gateway" class="tab-pane fade">
                <div class="row align-items-center">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="font-weight-500 border-top-none"><?php echo get_phrase('payment_details'); ?></th>
                                <th class="font-weight-500 border-top-none text-center"><?php echo get_phrase('pay_now'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="selected-pricing-package"><?php echo $selected_pricing_package['pricing_package_name']; ?></td>
                                <td class=" text-center">
                                    <a href="javascript:void(0)" class="btn btn-large btn-transparent-fast-blue d-table d-lg-inline-block lg-margin-15px-bottom md-margin-auto-lr proceed-to-payment" gateway="paypal"> <i class="fas fa-spinner fa-spin pay-btn-spinner d-none"></i> <?php echo get_phrase('pay_with_paypal', true); ?></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end tab item -->
        </div>
    </div>
</div>


<script>
    // THIS GLOBAL VARIABLE IS AVAILABLE IN STRIPE PAYMENT AND PAYPAL PAYMENT
    var selectedPricingPackage = $('input[name="confirmed-package"]:checked').val();

    function togglePricingPackage(packageId, packageTitle) {
        $(".selected-pricing-package").text(packageTitle);
        selectedPricingPackage = packageId;
    }

    function payWithPaypal() {
        window.location.replace('<?php echo site_url('checkout/paypal_checkout/'); ?>' + selectedPricingPackage);
    }

    $('.proceed-to-payment').on('click', function() {
        var gateway = $(this).attr('gateway');
        var userEmail = $('#user-email').val();
        if (!userEmail.trim() || !isEmail(userEmail)) {
            toastr.error('<?php echo site_phrase('that_is_an_invalid_email'); ?>');
        } else {
            $('.pay-btn-spinner').removeClass('d-none');
            $.ajax({
                url: '<?php echo site_url('site/create_a_session/') ?>',
                type: "POST",
                data: {
                    userEmail: userEmail
                },
                success: function(response) {
                    if (!response) {
                        toastr.error('<?php echo site_phrase('an_error_occurred'); ?>');
                    } else {
                        if (gateway == "paypal") {
                            payWithPaypal();
                        } else {
                            payWithStripe();
                        }
                    }
                    $('.pay-btn-spinner').addClass('d-none');
                }
            });
        }
    });

    // EMAIL VALIDATOR
    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }
</script>
<?php include "payment-gateways/stripe-payment-gateway-script.php"; ?>