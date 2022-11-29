<?php
$packag_price = 0;
if ($package_details['pricing_package_is_free']) {
    $packag_price = 0;
} else {
    if ($package_details['pricing_package_has_discount']) {
        $packag_price = $package_details['pricing_package_discounted_price'];
    } else {
        $packag_price = $package_details['pricing_package_regular_price'];
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png'); ?>">
    <style>
        .top_rw {
            background-color: #f4f4f4;
        }

        button {
            padding: 5px 10px;
            font-size: 14px;
        }

        .invoice-box {
            max-width: 890px;
            margin: auto;
            padding: 10px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 14px;
            line-height: 24px;
            font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-bottom: solid 1px #ccc;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: middle;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
            font-size: 12px;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, "Helvetica Neue", "Helvetica", Helvetica, Arial,
                sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top_rw">
                <td colspan="2">
                    <h2 style="margin-bottom: 0px; font-size : 20px;"> INVOICE </h2>
                    <span style=""> LICENSE CODE : <?php echo $payment_details['license_code']; ?> </span>
                </td>
                <td style="width:40%; margin-right: 10px;">
                    Purchase Date : <?php echo date('D, d-M-Y', $payment_details['date_added']); ?>
                </td>
            </tr>
            <tr class="information">
                <td colspan="3">
                    <table>
                        <tr>
                            <td colspan="2">
                                <b> Customer Details </b> <br>
                                <?php echo $user_details['name']; ?><br>
                                <?php echo $user_details['email']; ?>
                            </td>
                            <td> <b> Company Details </b><br>
                                <?php echo get_settings('system_name') ?>.<br>
                                <?php echo get_settings('system_email') ?>.<br>
                                <?php echo get_settings('address') ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <td colspan="3">
                <table cellspacing="0px" cellpadding="2px">
                    <tr class="heading">
                        <td style="width:25%;">
                            Product
                        </td>
                        <td style="width:45%; text-align: left;">
                            Package
                        </td>
                        <td style="width:15%; text-align:right;">
                            Sub Total
                        </td>
                        <td style="width:15%; text-align:right;">
                            Total
                        </td>
                    </tr>
                    <tr class="item">
                        <td style="width:25%;">
                            <?php echo $product_details['name']; ?>
                        </td>

                        <td style="width:45%; text-align:left;">
                            <small><?php echo $package_details['pricing_package_name']; ?></small><br>
                            <small> Package Type : <?php echo ucfirst($package_details['pricing_package_duration']); ?> </small><br>
                            <small> Installable Site : <?php echo sprintf('%02d', $package_details['pricing_package_max_site']); ?> </small>
                        </td>
                        <td style="width:15%; text-align:right;">
                            <?php echo currency($packag_price); ?>
                        </td>
                        <td style="width:15%; text-align:right;">
                            <?php echo currency($packag_price); ?>
                        </td>
                    </tr>
                    <tr class="item">
                        <td colspan="2" style="width:70%;"> <b> Grand Total </b> </td>
                        <td style="width:15%; text-align:right;">
                            <?php echo currency($packag_price); ?>
                        </td>
                        <td style="width:15%; text-align:right;">
                            <?php echo currency($packag_price); ?>
                        </td>
                    </tr>
                </table>
            </td>
        </table>
        <table>
            <tr class="total">
                <?php
                $f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
                ?>
                <td colspan="3" align="right"> Total Amount in Words : <b> <?php echo strtoupper($f->format($packag_price)) . ' ' . get_settings('system_currency'); ?> ONLY </b> </td>
            </tr>
            <tr>
                <td colspan="3">
                    <table cellspacing="0px" cellpadding="2px">
                        <tr>
                            <td width="50%">
                                <b> Declaration: </b> <br>
                                We declare that this invoice shows the actual price of the goods
                                described above and that all particulars are true and correct. The
                                goods sold are intended for end user consumption and not for resale.
                            </td>
                            <td>
                                * This is a computer generated invoice and does not
                                require a physical signature
                            </td>
                        </tr>
                        <tr>
                            <td width="50%">
                            </td>
                            <td>
                                <b> Authorized Signature </b>
                                <br>
                                <br>
                                ...................................
                                <br>
                                <br>
                                <br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>