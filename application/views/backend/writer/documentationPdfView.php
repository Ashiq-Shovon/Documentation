<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
<style>
    *{
        font-family: 'Poppins', sans-serif;
    }
</style>
<?php
    
    ini_set('max_execution_time', 300);
    ini_set('set_time_limit', 300);

    foreach($topics as $topic){
        echo '<h1><b>'.$topic['topic'].'</b></h1>';
        
        $this->db->where_in('topic_id', $topic['id']);
        $this->db->where('visibility', 1);
        $this->db->order_by('order', 'asc');
        $articles = $this->db->get('articles')->result_array();
        
        foreach($articles as $article){

            echo '<h2>'.$article['article'].' - </h2>';
            $this->db->where('article_id', $article['id']);
            $this->db->where('visibility', 1);
            echo reformat_image_path($this->db->get('documentation')->row('documentation'), false, true);
            
            echo '<br>';
        }
        
        echo '<br><br><br>';
    }
    
?>