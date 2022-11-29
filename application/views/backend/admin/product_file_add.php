<form action="<?php echo site_url('admin/product_file/add'); ?>" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="product_id" id="" value="<?php echo $param2; ?>">
    <div class="form-group">
        <label for="product_file_title"><?php echo get_phrase('product_file_title'); ?></label>
        <input type="text" class="form-control" name="product_file_title" id="product_file_title" placeholder="<?php echo get_phrase('product_file_title'); ?>" required>
    </div>
    <div class="form-group" id="product-file-picker-area">
        <label> <?php echo get_phrase('product_file'); ?></label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="product_file" name="product_file" accept=".zip,.rar,.7zip" onchange="changeTitleOfImageUploader(this)">
                <label class="custom-file-label" for="product_file"><?php echo get_phrase('choose_product_file'); ?></label>
            </div>
        </div>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary" name="button"><?php echo get_phrase('submit'); ?></button>
    </div>
</form>