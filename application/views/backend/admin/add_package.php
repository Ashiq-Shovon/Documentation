<?php
$product_details = $this->product_model->get_product_by_id($param2)->row_array();
$product_files = $this->product_model->product_files($param2)->result_array();
?>
<form class="" action="<?php echo site_url('admin/packages/' . $product_details['slug'] . '/add'); ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="product_id" value="<?php echo $param2; ?>">
    <div class="form-group">
        <label for="package_name"><?php echo get_phrase('package_name'); ?></label>
        <input type="text" class="form-control" name="package_name" id="package_name" placeholder="<?php echo get_phrase('package_name'); ?>" required>
    </div>
    <div class="form-group">
        <label for="maximum_number_of_site"><?php echo get_phrase('maximum_number_of_site'); ?></label>
        <input type="number" class="form-control" name="maximum_number_of_site" id="maximum_number_of_site" placeholder="<?php echo get_phrase('maximum_number_of_site'); ?>" min='0' required>
    </div>
    <div class="form-group">
        <label for="regular_price"><?php echo get_phrase('regular_price'); ?></label>
        <input type="number" class="form-control" name="regular_price" id="regular_price" onkeyup="calculateDiscountPercentage()" onchange="calculateDiscountPercentage()" placeholder="<?php echo get_phrase('regular_price'); ?>" step="0.01" min="0" value="0" required>
    </div>
    <div class="custom-control custom-checkbox mb-2">
        <input type="checkbox" class="custom-control-input" id="has_discount" name="has_discount" value="1">
        <label class="custom-control-label" for="has_discount"><?php echo get_phrase('check_if_the_package_has_discount'); ?></label>
    </div>
    <div class="form-group">
        <label for="discounted_price"><?php echo get_phrase('discounted_price'); ?></label>
        <input type="number" class="form-control" name="discounted_price" id="discounted_price" onkeyup="calculateDiscountPercentage()" onchange="calculateDiscountPercentage()" placeholder="<?php echo get_phrase('discounted_price'); ?>" step="0.01" min="0">
        <small class="text-muted"><?php echo get_phrase('this_course_has'); ?> <span id="discounted_percentage" class="text-danger">0%</span> <?php echo get_phrase('discount'); ?></small>
    </div>

    <div class="form-group">
        <label for="features"><?php echo get_phrase('features'); ?></label>
        <textarea name="features" class="form-control" id="features" rows="4" placeholder="<?php echo get_phrase('write_down_the_features_as_comma_separated_value'); ?>"></textarea>
    </div>
    <div class="form-group">
        <label for="package_duration"><?php echo get_phrase('package_duration'); ?></label>
        <select class="form-control select2" data-toggle="select2" name="package_duration" id="package_duration">
            <option value="yearly"><?php echo get_phrase('yearly'); ?></option>
            <option value="lifetime"><?php echo get_phrase('lifetime'); ?></option>
        </select>
    </div>

    <div class="form-group">
        <label for="product_file"><?php echo get_phrase('product_file'); ?></label>
        <select class="form-control select2" data-toggle="select2" name="product_file" id="product_file">
            <option value=""><?php echo get_phrase('choose_one'); ?></option>
            <?php foreach ($product_files as $key => $product_file) : ?>
                <option value="<?php echo $product_file['product_file'] ?>"><?php echo $product_file['product_file_title']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group mb-3">
        <label for="package-color"><?php echo get_phrase('pacakge_color'); ?></label>
        <input class="form-control" id="package-color" type="color" name="package_color" value="#727cf5">
    </div>

    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="is_recommended" name="is_recommended" value="1">
        <label class="custom-control-label" for="is_recommended"><?php echo get_phrase('mark_this_package_as_recommended'); ?></label>
    </div>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="is_free" name="is_free" value="1">
        <label class="custom-control-label" for="is_free"><?php echo get_phrase('mark_this_package_as_free'); ?></label>
    </div>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="is_public" name="is_public" value="1">
        <label class="custom-control-label" for="is_public"><?php echo get_phrase('mark_this_package_as_public'); ?></label>
    </div>
    <div class="text-center mt-3">
        <button type="submit" class="btn btn-primary" name="button"><?php echo get_phrase('submit'); ?></button>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        initSelect2(['#package_duration', '#product_file']);
    });

    function calculateDiscountPercentage() {
        let discounted_price = $('#discounted_price').val();
        if (discounted_price > 0) {
            let regular_price = $('#regular_price').val();
            if (regular_price > 0) {
                var reducedPrice = regular_price - discounted_price;
                var discountedPercentage = (reducedPrice / regular_price) * 100;
                if (discountedPercentage > 0) {
                    jQuery('#discounted_percentage').text(discountedPercentage.toFixed(2) + '%');

                } else {
                    jQuery('#discounted_percentage').text('<?php echo '0%'; ?>');
                }
            }
        }
    }
</script>