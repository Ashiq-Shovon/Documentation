<?php
$topics = $this->topic_model->get_topics('id', $param2)->result_array();
?>
<form class="" action="<?php echo site_url('admin/article/add'); ?>" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="article"><?php echo get_phrase('article'); ?></label>
    <input type="text" class="form-control" name="article" id="article" placeholder="<?php echo get_phrase('article'); ?>" required>
  </div>
  <div class="form-group">
    <label for="topic"><?php echo get_phrase('topic'); ?></label>
    <select class="form-control select2" data-toggle="select2" name="topic_id" id="topic">
      <?php foreach ($topics as $topic) : ?>
        <option value="<?php echo $topic['id']; ?>"><?php echo $topic['topic']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="visibility" name="visibility" value="1" checked>
    <label class="custom-control-label" for="visibility"><?php echo get_phrase('make_this_article_public'); ?></label>
  </div>
  <div class="text-center">
    <button type="submit" class="btn btn-primary" name="button"><?php echo get_phrase('submit'); ?></button>
  </div>
</form>

<script type="text/javascript">
  $(document).ready(function() {
    initSelect2(['#topic']);
  });
</script>