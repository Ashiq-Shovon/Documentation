<?php
            $doc = reformat_image_path($documentation['documentation']);
            // $start_img_tag = '<figure class="device-browser">
            // <div class="device-browser-header">
            //     <div class="device-browser-header-btn-list">
            //         <span class="device-browser-header-btn-list-btn"></span>
            //         <span class="device-browser-header-btn-list-btn"></span>
            //         <span class="device-browser-header-btn-list-btn"></span>
            //     </div>
            //     <div class="device-browser-header-browser-bar">www.creativeitem.com</div>
            // </div>
            // <div class="device-browser-frame">';
            // $end_img_tag = '</div>
            // </figure>';
            
            // preg_match_all('/<img[^>]+>/i',$doc, $result);
            // // print_r($result);
            // foreach($result as  $key => $image_tag){
            // $mokUp_images = $start_img_tag. $image_tag[$key].$end_img_tag;
            // $doc = str_replace($image_tag, $mokUp_images, $doc);
            // }
         echo htmlspecialchars_decode($doc); 
     ?>
   