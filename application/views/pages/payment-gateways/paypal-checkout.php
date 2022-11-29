<!DOCTYPE html>
<html lang="en">

<head>
    <title>Paypal | <?php echo get_settings('system_name'); ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/payment/css/paypal.css'); ?>" />
    <title><?php echo htmlspecialchars($page_title); ?> | <?php echo get_settings('system_title'); ?></title>
    <!-- favicon icon -->
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png'); ?>">
</head>

<body>
    <?php
    $paypal_keys = get_settings('paypal_keys');
    $paypal = json_decode($paypal_keys);
    ?>
    <!--required for getting the stripe token-->

    <div class="package-details">
        <strong><?php echo site_phrase('pricing_package'); ?> | <?php echo $selected_pricing_package_details['pricing_package_name']; ?></strong> <br>
        <strong><?php echo site_phrase('amount_to_pay'); ?> | <?php echo $amount_to_pay; ?> <?php echo get_settings('paypal_currency'); ?></strong> <br>
        <div id="paypal-button" class="margin-top-20"></div><br>
    </div>

    <?php include "paypal-payment-gateway-script.php"; ?>

</body>

</html>