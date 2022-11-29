<?php
$documentation = $this->documentation_model->get_all_documentation($selected_article['id'], true);
// print_r($selected_article);
// echo "<br/>";
// echo $selected_article['id'].'--';
// echo $documentation->num_rows();

?>
<div class="container">


    <?php if ($documentation->num_rows()) :
    $documentation = $documentation->row_array();
?>
    <?php
            $doc = reformat_image_path($documentation['documentation']);
            $start_img_tag_web = '<figure class="device-browser">
            <div class="device-browser-header">
                <div class="device-browser-header-btn-list">
                    <span class="device-browser-header-btn-list-btn"></span>
                    <span class="device-browser-header-btn-list-btn"></span>
                    <span class="device-browser-header-btn-list-btn"></span>
                </div>
                <div class="device-browser-header-browser-bar">www.creativeitem.com</div>
            </div>
            <div class="device-browser-frame">';
            $end_img_tag_web = '</div>
            </figure>';
            $start_img_tag_mobile ='<figure class="device-mobile mx-auto">
            <div class="device-mobile-frame">';
            $end_img_tag_mobile = '</div>
            </figure>';
            
            preg_match_all('/<img[^>]+>/i',$doc, $result);
            preg_match_all('/src="([^"]*)"/', $doc, $src_result);
            $duplicate = array();
            $duplicate = array_count_values($result[0]);
           
            $array_web = array();
            $array_mob = array();
            // print_r($src_result[0]);
            foreach($result[0] as  $key => $image_tag){
                //htmlspecialchars(print_r($image_tag));
                $only_src = str_replace('"', '', str_replace('src="', '', $src_result[0][$key]));
                $view = strpos($only_src, "mobile");
                
                if(!empty($image_tag)){
                                  
                    if(strpos($only_src, "mobile") ){
                        
                        if($duplicate[$image_tag] <= 1 ){
                        $mokUp_images = $start_img_tag_mobile. $image_tag.$end_img_tag_mobile;
                        $doc = str_replace($image_tag, $mokUp_images, $doc);
                        }elseif($duplicate[$image_tag] > 1){
                               array_push($array_mob, $image_tag);
                        }
                    }else{
                        if($duplicate[$image_tag] <= 1 ){
                        $mokUp_images = $start_img_tag_web. $image_tag.$end_img_tag_web;
                        $doc = str_replace($image_tag, $mokUp_images, $doc);
                        }elseif($duplicate[$image_tag] > 1){
                            array_push($array_web, $image_tag);
                        }
                    }
                    
                                    // $doc = str_replace($image_tag, $mokUp_images, $doc);

                }
            }
            // print_r($array[0]);
            if(count($array_mob) > 1){
            $arr_mob = array_count_values($array_mob);
            $keys_mob = array_keys($arr_mob);
            $values_mob = array_values($keys_mob);
            foreach($values_mob as $value){
                $mokUp_images_mob = $start_img_tag_mobile. $value.$end_img_tag_mobile;
                $doc = str_replace($value, $mokUp_images_mob, $doc);

                }
            }
            if(count($array_web) > 1){
            $arr_web = array_count_values($array_web);
            $keys_web = array_keys($arr_web);
            $values_web = array_values($keys_web);
            foreach($values_web as $value){
                $mokUp_images_web = $start_img_tag_web. $value.$end_img_tag_web;
                $doc = str_replace($value, $mokUp_images_web, $doc);

                }
            }

         echo htmlspecialchars_decode($doc); 
     ?>
    <?php else : ?>
    <div class="text-left">
        <span style="font-size:18px; font-weight:400;">Coming Soon...</span>
    </div>
    <?php endif; ?>
</div>
<script>
$(document).ready(function() {
    var x = document.getElementsByTagName("img");
    var i;

    for (i = 0; i < x.length; i++) {
        const match = x[i].getAttribute('src');

        match.toString();


        if (match.indexOf("mobile") > 4) {
            x[i].setAttribute('class', 'device-mobile-img');

        }
    }
})
</script>