<?php
$product_details = $this->product_model->get_product_by_id($param2)->row_array();
?>
<form class="" action="<?php echo site_url('writer/products/edit/' . $param2); ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name"><?php echo get_phrase('product_title'); ?></label>
        <input type="text" class="form-control" name="name" id="name" placeholder="<?php echo get_phrase('product_name'); ?>" value="<?php echo $product_details['name']; ?>" required>
    </div>
    <div class="form-group">
        <label for="sub_title"><?php echo get_phrase('product_sub_title'); ?></label>
        <input type="text" class="form-control" name="sub_title" id="sub_title" placeholder="<?php echo get_phrase('product_sub_title'); ?>" value="<?php echo $product_details['sub_title']; ?>" required>
    </div>
    <div class="form-group">
        <label for="type"><?php echo get_phrase('product_type'); ?></label>
        <select class="form-control select2" data-toggle="select2" name="type" id="type">
            <?php $product_types = $this->product_model->get_product_types()->result_array(); ?>
            <?php foreach ($product_types as $key => $product_type) : ?>
                <option value="<?php echo $product_type['identifier']; ?>" <?php if ($product_details['type'] == $product_type['identifier']) echo 'selected'; ?>><?php echo site_phrase($product_type['name']); ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group mb-0">
        <label>Custom file input</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="product-thumbnail" name="thumbnail" onchange="changeTitleOfImageUploader(this)" accept="image/*">
                <label class="custom-file-label" for="product-thumbnail"><?php echo get_phrase('product_thumbnail'); ?></label>
            </div>
        </div>
    </div>
    <div class="text-center mt-3">
        <button type="submit" class="btn btn-primary" name="button"><?php echo get_phrase('submit'); ?></button>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        initSelect2(['#topic']);
    });
</script>