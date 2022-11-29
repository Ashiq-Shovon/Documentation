<?php $blog_category_details = $this->blog_model->get_blog_category_by_id($param2)->row_array(); ?>
<form class="" action="<?php echo site_url('writer/blog_categories/edit/' . $param2); ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name"><?php echo get_phrase('blog_category'); ?></label>
        <input type="text" class="form-control" name="name" id="name" placeholder="<?php echo get_phrase('blog_category'); ?>" value="<?php echo htmlspecialchars($blog_category_details['blog_category_name']); ?>" required>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary" name="button"><?php echo get_phrase('submit'); ?></button>
    </div>
</form>