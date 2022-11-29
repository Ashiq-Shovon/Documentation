<!-- jQuery -->
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/payment/js/paypal-objects-api.js') ?>"></script>
<script>
    paypal.Button.render({
        env: '<?php echo $paypal[0]->mode; ?>', // 'sandbox' or 'production'
        style: {
            label: 'paypal',
            size: 'medium', // small | medium | large | responsive
            shape: 'pill', // pill | rect
            color: 'gold', // gold | blue | silver | black
            tagline: false
        },
        client: {
            sandbox: '<?php echo $paypal[0]->sandbox_client_id; ?>',
            production: '<?php echo $paypal[0]->production_client_id; ?>'
        },

        commit: true, // Show a 'Pay Now' button

        payment: function(data, actions) {
            return actions.payment.create({
                payment: {
                    transactions: [{
                        amount: {
                            total: '<?php echo $amount_to_pay; ?>',
                            currency: '<?php echo get_settings('paypal_currency'); ?>'
                        }
                    }]
                }
            });
        },

        onAuthorize: function(data, actions) {
            // executes the payment
            return actions.payment.execute().then(function() {
                // PASSING TO CONTROLLER FOR CHECKING
                var redirectUrl = '<?php echo site_url('payment/paypal/' . $selectedPricingPackageIdentifier); ?>' + '/' + data.paymentID + '/' + data.paymentToken + '/' + data.payerID;
                $('#loader_modal').fadeIn(50);
                window.location = redirectUrl;
            });
        }

    }, '#paypal-button');


    // CHECK IF PAYPAL IS ACTIVE OR NOT.
    $(document).ready(function() {
        let paypalActivity = '<?php echo $paypal[0]->active; ?>';
        if (parseInt(paypalActivity) != 1) {
            var redirectUrl = '<?php echo site_url(); ?>';
            window.location = redirectUrl;
        }
    });
</script>