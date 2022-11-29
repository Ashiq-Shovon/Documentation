<form class="" action="<?php echo site_url('writer/topic_action/add'); ?>" method="post" enctype="multipart/form-data">
  <input type="hidden" name="product_id" id="" value="<?php echo $param2; ?>">
  <div class="form-group">
    <label for="topic"><?php echo get_phrase('topic'); ?></label>
    <input type="text" class="form-control" name="topic" id="topic" placeholder="<?php echo get_phrase('enter_doc_topic'); ?>" required>
  </div>
  <div class="form-group">
    <label for="summary"><?php echo get_phrase('summary'); ?></label>
    <textarea name="summary" class="form-control" rows="3"></textarea>
  </div>
  <div class="form-group" id="thumbnail-picker-area">
    <label> <?php echo get_phrase('topic_thumbnail'); ?> <small>(<?php echo get_phrase('the_image_size_should_be'); ?>: 400 X 255)</small> </label>
    <div class="input-group">
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="topic_thumbnail" name="topic_thumbnail" accept="image/*" onchange="changeTitleOfImageUploader(this)">
        <label class="custom-file-label" for="topic_thumbnail"><?php echo get_phrase('choose_thumbnail'); ?></label>
      </div>
    </div>
  </div>
  <div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="visibility" name="visibility" value="1" checked>
    <label class="custom-control-label" for="visibility"><?php echo get_phrase('make_this_topic_public'); ?></label>
  </div>
  <div class="text-center">
    <button type="submit" class="btn btn-primary" name="button"><?php echo get_phrase('submit'); ?></button>
  </div>
</form>