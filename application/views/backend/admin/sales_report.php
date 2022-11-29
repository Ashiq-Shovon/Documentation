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
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('sales_report'); ?></h4>
                <div class="table-responsive-sm mt-4">
                    <table id="basic-datatable" class="table table-striped table-centered mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo get_phrase('pricing_package'); ?></th>
                                <th><?php echo get_phrase('purchase_details'); ?></th>
                                <th><?php echo get_phrase('user'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($sales_data->result_array() as $key => $data) :
                                $product_details = $this->product_model->get_product_by_id($data['pricing_package_product_id'])->row_array();
                            ?>
                                <tr>
                                    <td><?php echo $key + 1; ?>.</td>
                                    <td>
                                        <?php echo $data['pricing_package_name']; ?><br>
                                        <small><strong><?php echo get_phrase('product'); ?> : </strong><?php echo $product_details['name']; ?></small><br>
                                        <small><strong><?php echo get_phrase('license_code'); ?> : </strong><?php echo $data['license_code']; ?></small><br>
                                    </td>
                                    <td>
                                        <small><strong><?php echo get_phrase('amount_paid'); ?> : </strong><?php echo currency($data['amount_paid']); ?></small><br>
                                        <small> <strong><?php echo get_phrase('date'); ?>: </strong> <?php echo date('D, d-M-Y', $data['date_added']); ?> </small><br>
                                        <small> <strong><?php echo get_phrase('package_duration'); ?>: </strong> <?php echo ucfirst($data['pricing_package_duration']); ?> </small><br>
                                        <small> <strong><?php echo get_phrase('installable_site'); ?>: </strong> <?php echo $data['pricing_package_max_site']; ?> </small><br>
                                        <small> <strong><?php echo get_phrase('payment_gateway'); ?>: </strong> <?php echo ucfirst($data['payment_method']); ?> </small><br>
                                    </td>
                                    <td>
                                        <?php echo $data['name']; ?><br>
                                        <small> <strong><?php echo get_phrase('email'); ?> : </strong> <?php echo $data['email']; ?> </small>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php if ($sales_data->num_rows() == 0) : ?>
                    <div class="img-fluid w-100 text-center">
                        <img style="opacity: 1; width: 100px;" src="<?php echo base_url('assets/backend/images/file-search.svg'); ?>"><br>
                        <?php echo get_phrase('no_data_found'); ?>
                    </div>
                <?php endif; ?>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>