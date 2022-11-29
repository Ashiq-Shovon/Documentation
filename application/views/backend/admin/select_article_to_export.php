




<form action="<?php echo site_url('admin/export_documentation'); ?>" method="post" class="select_article_form">
    
    <div class="form-group float-left w-100">
        <button type="button" class="btn btn-success float-left" onclick="$('.select_article_form input').prop('checked', true)">Checke All</button>
        <button type="button" class="btn btn-warning float-right" onclick="$('.select_article_form input').prop('checked', false)">Unchecke All</button>
    </div>
    
    <?php foreach($all_topics->result_array() as $all_topic): ?>
        <div class="form-group">
            <input type="checkbox" name="selected_topic_id[]" value="<?php echo $all_topic['id']; ?>" id="<?php echo $all_topic['id']; ?>">
            <label for="<?php echo $all_topic['id']; ?>"><?php echo $all_topic['topic']; ?></label>
        </div>
    <?php endforeach; ?>
    
    <div class="form-group">
        <button type="submit" class="btn btn-success"><i class="mdi mdi-download"></i> Export</button>
    </div>
</form>