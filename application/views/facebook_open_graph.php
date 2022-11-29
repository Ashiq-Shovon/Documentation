<?php

$current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if (!isset($meta_description) && $meta_description == '')
	$meta_description = $page_title;

if (!isset($og_image) || $og_image == '')
	$og_image = base_url() . 'assets/pages/socialmedia/open-graph-img.png';

?>


    <meta property="og:locale"             content="en_US" />
    <meta property="og:type"               content="website" />
    <meta property="og:url"                content="<?php echo $current_url;?>" />
    <meta property="og:title"              content="<?php echo $page_title;?>" />
    <meta property="og:description"        content="<?php echo $meta_description;?>" />
    <meta property="og:image"              content="<?php echo $og_image;?>" />
    <meta property="og:image:width"        content="1200">