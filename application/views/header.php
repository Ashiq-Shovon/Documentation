<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo htmlspecialchars($page_title); ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="Creativeitem">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="Creativeitem - We provide smart solutions for your business.">

    <!--Site Meta description-->
    <?php if (isset($meta_description) && !empty($meta_description)): ?>
    <meta name="description" content="<?php echo htmlspecialchars($meta_description); ?>">
    <?php endif;?>

    <!--Site keywords-->
    <?php if (isset($meta_keyword) && !empty($meta_keyword)): ?>
    <meta name="keywords" content="<?php echo htmlspecialchars($meta_keyword); ?>">
    <?php endif;?>

    <!--Robots text-->
    <?php if (isset($robots) && !empty($robots)): ?>
    <meta name="robots" content="<?php echo htmlspecialchars($robots); ?>">
    <?php endif;?>

    <meta name="author" content="Creativeitem">
    <meta name="Publisher" content="Creativeitem">
    <meta property="fb:app_id" content="442993480298702">
   

    <?php include 'facebook_open_graph.php'; ?>
    <?php include 'twitter_open_graph.php'; ?>
    <?php include 'facebook_pixel.php'; ?>
    <?php include 'creartiveitem_google_analytics.php'; ?>
    <?php include 'google_ads.php'; ?>
    <?php include 'traffic_conversion.php'; ?>
    <?php include 'google_tag_manager.php'; ?>
    
    



    <!-- favicon icon -->
    <link rel="shortcut icon" href="<?php echo base_url('assets/pages/common/favicon.png'); ?>">
    <link rel="apple-touch-icon" href="<?php echo base_url('assets/pages/common/apple-touch-icon-57x57.png'); ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url('assets/pages/common/apple-touch-icon-72x72.png'); ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url('assets/pages/common/apple-touch-icon-114x114.png'); ?>">
    <!-- style sheets and font icons  -->


    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/front/vendor/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/front/vendor/hs-mega-menu/dist/hs-mega-menu.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/front/vendor/swiper/swiper-bundle.min.css">
    <!-- CSS Front Template -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/front/css/theme.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/frontend/front/toaster/toastr.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/front/css/docs.min.css">




    <link rel="canonical" href="<?php echo isset($canonical) ? $canonical : site_url();?>">

    <!-- JQUERY -->
    <script type="text/javascript" src="<?php echo base_url('assets/frontend/front/jquery/jquery.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/frontend/front/jquery/jquery.cookie.js') ?>"></script>



</head>

<body class="navbar-sidebar-aside-lg">
    <!-- start header -->
        <?php include 'menu.php';?>
        <main id="content" role="main">
    <!-- end header -->