<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, user-scalable=no" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!--<div class="modal-wrapper">
    <div class="modal">
        <i class="close material-icons">close</i>
        <div class="entry-title"></div>
        <div class="modal-content"></div>
    </div>
</div>-->
<div id="wrapper" class="hfeed">
    <header id="header">
        <div id="logo">
            <a href="/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/pdlogo.png" alt=""></a>
        </div>
        <div class="material-icons mobile menu-opener">menu</div>
        <nav id="menu" class="closed">
            <?php wp_nav_menu(array('theme_location' => 'main-menu')); ?>
        </nav>

    </header>
    <div id="container">