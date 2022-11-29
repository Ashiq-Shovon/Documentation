<?php
$documentation = $this->documentation_model->get_all_documentation($article_details['id'])->row_array();
$topic_details = $this->topic_model->get_topics_by_id($article_details['topic_id'])->row_array();
$product_details = $this->product_model->get_product_by_id($topic_details['product_id'])->row_array();
if ($documentation['visibility'] == 1 || $documentation['visibility'] == '') {
  $visibility = 1;
} else {
  $visibility = 0;
}
$articles = $this->article_model->get_articles($article_details['topic_id'])->result_array();
?>
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('documentation_for') . ' ' . $article_details['article']; ?>
          <a href="<?php echo site_url('admin/topics/' . $product_details['slug']); ?>" class="btn btn-outline-secondary btn-rounded alignToTitle"><?php echo get_phrase('back_to_topics'); ?></a>
          <a href="<?php echo site_url('docs/' . $product_details['slug'].'/'.$article_details['slug']); ?>" target="_blank" class="btn btn-outline-primary btn-rounded alignToTitle mr-1"><?php echo get_phrase('preview'); ?></a>
        </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>
<div class="row justify-content-center">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <!-- Articles list Start-->
        <div class="mb-3">
          <?php foreach ($articles as $key => $article) : ?>
            <a href="<?php echo site_url('admin/documentation_details/' . $article['slug'] . '-' . $article['id']); ?>" class="btn <?php if ($article['id'] == $article_details['id']) : ?> btn-primary <?php else : ?> btn-outline-primary <?php endif; ?> btn-rounded">
              <?php echo $article['article']; ?>
            </a>
          <?php endforeach; ?>
        </div>
        <!-- Articles list ends-->
        <form class="" action="<?php echo site_url('admin/update_documentation'); ?>" method="post" enctype="multipart/form-data">
          <input type="hidden" name="article_id" value="<?php echo $article_details['id']; ?>">
          <div class="form-group">
            <label for="article"><?php echo get_phrase('article'); ?></label>
            <input type="text" class="form-control" id="article" name="article" required value="<?php echo $article_details['article']; ?>">
          </div>
          <div class="form-group">
            <label for="documentation"> <?php echo get_phrase('documentation'); ?> </label>
            <textarea name="documentation" id="documentation" class="form-control" rows="15"><?php echo reformat_image_path($documentation['documentation']); ?></textarea>
          </div>
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="visibility" name="visibility" value="1" <?php if ($visibility == 1) : ?>checked<?php endif; ?>>
            <label class="custom-control-label" for="visibility"><?php echo get_phrase('make_this_documentation_public'); ?></label>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-2">
              <button type="submit" class="btn btn-primary btn-block"><?php echo get_phrase('update_documentation'); ?></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    initSummerNote(['#documentation']);
  });
</script>