<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>

    <meta charset="<?php bloginfo('charset'); ?>">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">

    <link href="//www.google-analytics.com" rel="dns-prefetch">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/assets/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/assets/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/assets/icons/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/assets/icons/site.webmanifest">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/assets/icons/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/icons/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="<?php echo get_template_directory_uri(); ?>/assets/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <link href="https://fonts.googleapis.com/css?family=Average+Sans" rel="stylesheet">

    <?php wp_head(); ?>

    <!-- Google Analytics -->
    <script>
      window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
      ga('create', 'UA-xxxxx-xxxx', 'auto');
      ga('send', 'pageview');
    </script>
    <script async src='https://www.google-analytics.com/analytics.js'></script>
    <!-- End Google Analytics -->

  </head>
  <body id="body" <?php body_class('body'); ?>>

    <header id="header" class="header">
    	<a class="brand" href="<?php bloginfo( 'url' ); ?>">
        <?php bloginfo( 'name' ); ?>
      </a>

      <nav id="primary-navigation" class="menu" role="navigation">
      	<!-- <?php wp_nav_menu(array('container' => 'false', 'menu_class' => 'menu__list', 'walker' => new Custom_Walker())); ?> -->
        <?php wp_nav_menu(array('container' => 'false', 'menu_class' => 'menu__list')); ?>
      </nav>

    	<button type="button" class="trigger" id="trigger">
    		<span class="sr-only">Toggle navigation</span>
    		<span class="trigger__line trigger__line--1"></span>
        <span class="trigger__line trigger__line--2"></span>
        <span class="trigger__line trigger__line--3"></span>
    	</button>
    </header>

    <main id="main" class="main" role="main">
