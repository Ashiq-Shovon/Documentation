<?php
    foreach($articles as $article){
        echo '<br><br>';
        echo '<h2>'.$article['article'].'</h2>';
        $this->db->where('article_id', $article['id']);
        $this->db->where('visibility', 1);
        // echo $this->db->get('documentation')->row('documentation');
        echo reformat_image_path($this->db->get('documentation')->row('documentation'), false, true);
    }
    
?>