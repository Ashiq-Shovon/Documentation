<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <?php echo get_phrase('topics_and_aricles_of_product'); ?> : <?php echo $product_details['name']; ?>
                    <a href="<?php echo site_url('writer/documentation'); ?>" class="btn btn-outline-secondary btn-rounded alignToTitle ml-1"><i class="mdi mdi-arrow-left"></i><?php echo get_phrase('back_to_products'); ?></a>
                    <a href="javascript:void(0)" onclick="showLargeModal('<?php echo site_url('modal/popup/sort_topics/' . $product_details['id']); ?>', '<?php echo get_phrase('sort_topics'); ?>')" class="btn btn-outline-primary btn-rounded alignToTitle ml-1"><i class="mdi mdi-format-list-numbered-rtl"></i><?php echo get_phrase('sort_topics'); ?></a>
                    <a href="javascript:void(0)" onclick="showAjaxModal('<?php echo site_url('modal/popup/article_add/' . $product_details['id']); ?>', '<?php echo get_phrase('add_article'); ?>')" class="btn btn-outline-primary btn-rounded alignToTitle ml-1"><i class="mdi mdi-plus"></i><?php echo get_phrase('add_new_article'); ?></a>
                    <a href="javascript:void(0)" onclick="showAjaxModal('<?php echo site_url('modal/popup/topic_add/' . $product_details['id']); ?>', '<?php echo get_phrase('add_topic'); ?>')" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i><?php echo get_phrase('add_new_topic'); ?></a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row">
    <?php foreach ($topics->result_array() as $topic) :
        $articles = $this->article_model->get_articles($topic['id'])->result_array(); ?>
        <div class="col-xl-3 col-md-6 on-hover-action" id="topic-<?php echo $topic['id']; ?>">
            <div class="card d-block <?php if ($topic['visibility'] == 1) : ?> published <?php else : ?> unpublished <?php endif; ?>">
                <!-- <div class="topic-image">
                    <img class="card-img-top" src="<?php echo base_url('uploads/thumbnails/topic_thumbnails/' . $topic['thumbnail']); ?>">
                </div> -->
                <div class="card-body">
                    <h4 class="card-title mb-0"><?php echo $topic['topic']; ?></h4>
                    <small style="font-style: italic;">
                        <p class="card-text"><?php echo count($articles) . ' ' . get_phrase('articles'); ?></p>
                    </small>
                </div>

                <ul class="list-group list-group-flush">
                    <?php foreach ($articles as $article) : ?>
                        <li class="list-group-item on-hover-action" id="article-<?php echo $article['id']; ?>">
                            <span><?php echo $article['article']; ?></span>
                            <span class="category-action" id='delete-article-<?php echo $article['id']; ?>' style="float: right; margin-left: 5px; display: none; height: 20px;">
                                <a href="javascript:void(0)" class="action-icon" onclick="confirm_modal('<?php echo site_url('writer/article/delete/' . $article['id']); ?>');"> <i class="mdi mdi-delete" style="font-size: 18px;"></i></a>
                            </span>
                            <span class="category-action" id='edit-article-<?php echo $article['id']; ?>' style="float: right; display: none; height: 20px;">
                                <a href="javascript:void(0)" onclick="showAjaxModal('<?php echo site_url('modal/popup/article_edit/' . $article['id'] . '/' . $article['product_id']); ?>', '<?php echo get_phrase('edit_article'); ?>')" class="action-icon"> <i class="mdi mdi-pencil" style="font-size: 18px;"></i></a>
                            </span>
                            <span class="category-action" id='documentation-for-article-<?php echo $article['id']; ?>' style="float: right; display: none; height: 20px;">
                                <a href="<?php echo site_url('writer/documentation_details/' . $article['slug'] . '-' . $article['id']); ?>" class="action-icon"> <i class="mdi mdi-file-document-box-multiple-outline" style="font-size: 18px;"></i></a>
                            </span>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <a href="javascript:void(0)" onclick="showLargeModal('<?php echo site_url('modal/popup/sort_articles/') . $topic['id']; ?>', '<?php echo get_phrase('sort_articles'); ?>')" class="btn btn-icon btn-outline-primary btn-sm btn-block" id="sort-article-topic-<?php echo $topic['id']; ?>" style="display: none;" style="margin-right:5px;">
                                <?php echo get_phrase('sort'); ?>
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="javascript:void(0)" onclick="showAjaxModal('<?php echo site_url('modal/popup/topic_edit/') . $topic['id']; ?>', '<?php echo get_phrase('edit_topic'); ?>')" class="btn btn-icon btn-outline-info btn-sm btn-block" id="edit-topic-<?php echo $topic['id']; ?>" style="display: none;" style="margin-right:5px;">
                                <?php echo get_phrase('edit'); ?>
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="#" class="btn btn-icon btn-outline-danger btn-sm btn-block" id="delete-topic-<?php echo $topic['id']; ?>" style="float: right; display: none;" onclick="confirm_modal('<?php echo site_url('writer/topic_action/delete/' . $topic['id']); ?>');" style="margin-right:5px;">
                                <?php echo get_phrase('delete'); ?>
                            </a>
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
    <?php endforeach; ?>

    <?php if ($topics->num_rows() == 0) : ?>
        <div class="img-fluid w-100 text-center">
            <img style="opacity: 1; width: 100px;" src="<?php echo base_url('assets/backend/images/file-search.svg'); ?>"><br>
            <?php echo get_phrase('no_data_found'); ?>
        </div>
    <?php endif; ?>
</div>

<script type="text/javascript">
    $('.on-hover-action').mouseenter(function() {
        var id = this.id;
        $('#edit-' + id).show();
        $('#delete-' + id).show();
        $("#documentation-for-" + id).show();
        $("#sort-article-" + id).show();
    });
    $('.on-hover-action').mouseleave(function() {
        var id = this.id;
        $('#edit-' + id).hide();
        $('#delete-' + id).hide();
        $("#documentation-for-" + id).hide();
        $("#sort-article-" + id).hide();
    });
</script>
</div>