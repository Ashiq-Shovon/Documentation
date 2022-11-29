<?php

$current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if (!isset($meta_description) && $meta_description == '')
	$meta_description = $page_title;

if (!isset($twitter_image) || $twitter_image == '')
	$twitter_image = base_url() . 'assets/pages/socialmedia/open-graph-img.png';

?>

   <meta name="twitter:card" content="summary"/>
   <meta name="twitter:title" content="<?php echo $page_title;?>" />
   <meta name="twitter:description" content="<?php echo $meta_description;?>" />
   <meta name="twitter:image" content="<?php echo $twitter_image;?>" />
   <meta name="twitter:site" content="@creativeitem">
   <meta name="twitter:creator" content="@creativeitem">