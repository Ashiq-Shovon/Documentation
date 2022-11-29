<?php $product_files = $this->product_model->product_files($param2); ?>
<div class="table-responsive">
    <table class="table table-centered table-hover mb-0 product-list-modal-table">
        <tbody>
            <?php foreach ($product_files->result_array() as $key => $product_file) : ?>
                <tr>
                    <td>
                        <h5 class="font-14 my-1"><?php echo ++$key . '. ' . $product_file['product_file_title']; ?></h5>
                    </td>
                    <td class="table-action" style="width: 90px;">
                        <a href="javascript: void(0);" class="btn btn-sm btn-outline-danger btn-rounded" onclick="confirm_modal('<?php echo site_url('admin/product_file/delete/' . $product_file['product_file_id']); ?>');"> <i class="mdi mdi-delete"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php if ($product_files->num_rows() == 0) : ?>
    <div class="img-fluid w-100 text-center">
        <img style="opacity: 1; width: 100px;" src="<?php echo base_url('assets/backend/images/file-search.svg'); ?>"><br>
        <?php echo get_phrase('no_data_found'); ?>
    </div>
<?php endif; ?>

<div class="text-center">
    <a href="javascript:void(0)" onclick="showAjaxModal('<?php echo site_url('modal/popup/product_file_add/' . $param2); ?>', '<?php echo get_phrase('add_new_product_file'); ?>')" class="btn btn-outline-primary btn-rounded mt-3"><i class="mdi mdi-plus"></i><?php echo get_phrase('add_new_product_file'); ?></a>
</div>