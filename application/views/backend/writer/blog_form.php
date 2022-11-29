<?php $blog_details = $this->blog_model->get_blog_by_id($blog_id)->row_array(); ?>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?>
                    <a href="<?php echo site_url('writer/blogs/'); ?>" class="btn btn-outline-secondary btn-rounded alignToTitle"><?php echo get_phrase('back_to_blog_list'); ?></a>
                    <?php if (count($blog_details) > 0) : ?>
                        <a href="<?php echo site_url('blog/' . $blog_details['blog_slug']); ?>" target="_blank" class="btn btn-outline-primary btn-rounded alignToTitle mr-1"><?php echo get_phrase('view_on_frontend'); ?></a>
                    <?php endif; ?>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <!-- Articles list ends-->
                <form class="" action="<?php echo site_url('writer/blog_action/store'); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="blog_id" value="<?php echo isset($blog_details['blog_id']) ? $blog_details['blog_id'] : ""; ?>">
                    <div class="form-group">
                        <label for="blog_category_id"><?php echo get_phrase('blog_category'); ?></label>
                        <select class="form-control select2" data-toggle="select2" name="blog_category_id" id="blog_category_id">
                            <option value="0"><?php echo get_phrase('select_a_category'); ?></option>
                            <?php foreach ($blog_categories as $blog_category) : ?>
                                <option value="<?php echo $blog_category['blog_category_id']; ?>" <?php if (isset($blog_details['blog_category_id']) && $blog_details['blog_category_id'] == $blog_category['blog_category_id']) echo 'selected'; ?>><?php echo $blog_category['blog_category_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title"><?php echo get_phrase('title'); ?></label>
                        <input type="text" class="form-control" id="title" name="title" required placeholder="<?php echo get_phrase('blog_title'); ?>" value="<?php echo isset($blog_details['blog_title']) ? $blog_details['blog_title'] : ""; ?>">
                    </div>
                    <div class="form-group">
                        <label for="tags"><?php echo get_phrase('tags'); ?></label>
                        <input type="text" class="form-control bootstrap-tag-input" id="tags" name="tags" data-role="tagsinput" style="width: 100%;" value="<?php echo isset($blog_details['blog_tags']) ? $blog_details['blog_tags'] : ""; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="excerpt"><?php echo get_phrase('excerpt'); ?></label>
                        <input type="text" class="form-control" id="excerpt" name="excerpt" required placeholder="<?php echo get_phrase('blog_excerpt'); ?>" value="<?php echo isset($blog_details['blog_excerpt']) ? $blog_details['blog_excerpt'] : ""; ?>">
                    </div>
                    <div class="form-group">
                        <label for="blog"> <?php echo get_phrase('blog'); ?> </label>
                        <textarea name="blog" id="blog" class="form-control" rows="15">
                        <?php echo isset($blog_details['blog_details']) ? reformat_image_path($blog_details['blog_details'], true) : ""; ?>
                        </textarea>
                    </div>
                    <div class="form-group" id="thumbnail-picker-area">
                        <label> <?php echo get_phrase('blog_thumbnail'); ?> <small>(<?php echo get_phrase('the_image_size_should_be'); ?>: 400 X 255)</small> </label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="blog_thumbnail" name="blog_thumbnail" accept="image/*" onchange="changeTitleOfImageUploader(this)">
                                <label class="custom-file-label" for="blog_thumbnail"><?php echo get_phrase('choose_thumbnail'); ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="visibility" name="visibility" value="1" <?php if (isset($blog_details['blog_visibility']) && $blog_details['blog_visibility']) echo "checked"; ?>>
                        <label class="custom-control-label" for="visibility"><?php echo get_phrase('make_this_blog_public'); ?></label>
                    </div>

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="ability_to_comment" name="ability_to_comment" value="1" <?php if (isset($blog_details['ability_to_comment']) && $blog_details['ability_to_comment']) echo "checked"; ?>>
                        <label class="custom-control-label text-danger" for="ability_to_comment"><?php echo get_phrase('people_can_leave_their_comment'); ?></label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="is_featured" name="is_featured" value="1" <?php if (isset($blog_details['blog_is_featured']) && $blog_details['blog_is_featured']) echo "checked"; ?>>
                        <label class="custom-control-label text-danger" for="is_featured"><?php echo get_phrase('make_this_blog_featured'); ?></label>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary btn-block"><?php echo get_phrase('update_blog'); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        initSummerNote(['#blog']);
    });
</script>